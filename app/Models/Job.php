<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'jobs_listing';

    public static array $experience = ['All', 'entry', 'intermediate', 'senior'];

    public static array $categories = [
        'All',
        'IT',
        'Finance',
        'Marketing',
        'Sales',
        'HR',
        'Operations',
        'Customer Service',
        'Engineering',
        'Design',
        'Healthcare',
    ];

    protected $fillable = [
        'title',
        'description',
        'salary',
        'location',
        'category',
        'experience',
    ];


    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilters(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['search'] ?? null, function ($query, $searchTerm) {
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'like', "%{$searchTerm}%")
                        ->orWhere('description', 'like', "%{$searchTerm}%")
                        ->orWhereHas('employer', function ($query) use ($searchTerm) {
                            $query->where('company_name', 'like', "%{$searchTerm}%");
                        });
                });
            })
            ->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
                $query->where('salary', '>=', $minSalary);
            })
            ->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
                $query->where('salary', '<=', $maxSalary);
            })
            ->when(
                ($filters['experience'] ?? null) && $filters['experience'] !== 'All',
                function ($query, $value) use ($filters) {
                    $query->where('experience', $filters['experience']);
                }
            )
            ->when(
                ($filters['category'] ?? null) && $filters['category'] !== 'All',
                function ($query, $value) use ($filters) {
                    $query->where('category', $filters['category']);
                }
            );
    }
}
