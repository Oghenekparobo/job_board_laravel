<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
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

        User::factory(1000)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 200; $i++) {

            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }


        $employers = Employer::all();


        for ($i = 0; $i < 200; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }



        User::factory()->create(
            [
                'name' => 'test user',
                'email' => 'test@gmail.com'
            ]
        );


        foreach ($users as $user) {
            $jobs = Job::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create(
                    [
                        'user_id' => $user->id,
                        'job_listing_id' => $job->id
                    ]
                );
            }
        }
    }
}
