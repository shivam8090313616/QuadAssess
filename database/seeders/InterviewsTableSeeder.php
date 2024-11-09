<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InterviewsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 3 interview records with user_id = "ARDkad960519"
        DB::table('interviews')->insert([
            [
                'user_id' => 'ARDkad960519',
                'role_id' => 1, // Replace with actual role_id from your roles table
                'selected_skills' => 'PHP, Laravel, MySQL', // Skills selected by the user
                'level_id' => 1, // Replace with actual level_id from your levels table (Beginner, Intermediate, Expert)
                'status' => 'Pending', // Default status
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 'ARDkad960519',
                'role_id' => 2, // Replace with actual role_id from your roles table
                'selected_skills' => 'JavaScript, React, Node.js', // Skills selected by the user
                'level_id' => 2, // Replace with actual level_id from your levels table
                'status' => 'Pending', // Default status
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 'ARDkad960519',
                'role_id' => 3, // Replace with actual role_id from your roles table
                'selected_skills' => 'HTML, CSS, Bootstrap', // Skills selected by the user
                'level_id' => 3, // Replace with actual level_id from your levels table
                'status' => 'Pending', // Default status
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
