<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'job_listing_id', 'cv_path'];


    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_listing_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithJobDetails(Builder $query): Builder
    {
        return $query->with([
            'job.employer',
            'job' => function ($query) {
                $query->withCount('jobApplications')
                    ->withAvg('jobApplications', 'expected_salary');
            }
        ]);
    }
}
