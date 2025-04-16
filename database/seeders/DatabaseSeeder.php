<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1000 users
        User::factory(1000)->create();
    
        // Get all users and shuffle them
        $users = User::all()->shuffle();
    
        // Create 200 employers and assign them to a user
        for ($i = 0; $i < 200; $i++) {
            // Create an employer for each user
            Employer::factory()->create([
                'user_id' => $users->pop()->id // Assign each employer a user
            ]);
        }
    
        // Get all created employers
        $employers = Employer::all();
    
        // Create 200 jobs and associate each job with a random employer
        for ($i = 0; $i < 200; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id // Assign a random employer to each job
            ]);
        }
    
        // Optionally, create additional jobs if needed
        // Job::factory(100)->create();
    }
    
}
