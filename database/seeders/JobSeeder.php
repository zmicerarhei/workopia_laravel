<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load job listings from array
        $jobListings = include database_path('seeders/data/job_listings.php');

        // Get test user id

        $testUserId = User::where('email', 'test@test.com')->value('id');

        // Get user ids from user model
        $userIds = User::where('email', '!=', 'test@test.com')->pluck('id')->toArray();

        foreach ($jobListings as $index => &$listing) {
            if ($index < 2) {
                // Assign the first thwo job listings to the test user
                $listing['user_id'] = $testUserId;
            } else {
                // Assign the rest of the job listings to random users}
                $listing['user_id'] = $userIds[array_rand($userIds)];
            }

            // Add timestamps
            $listing['created_at'] = now();
            $listing['updated_at'] = now();

            DB::table('job_listings')->insert($listing);
            echo "Jobs created successfully";
        }
    }
}
