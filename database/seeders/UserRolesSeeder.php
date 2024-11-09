<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserRolesSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['user_id' => 1, 'role' => 'Admin', 'level' => 'Expert', 'score' => 100, 'status' => 'active'],
            ['user_id' => 2, 'role' => 'Developer', 'level' => 'Intermediate', 'score' => 85, 'status' => 'active'],
            ['user_id' => 3, 'role' => 'Tester', 'level' => 'Beginner', 'score' => 75, 'status' => 'inactive'],
            ['user_id' => 4, 'role' => 'DevOps', 'level' => 'Expert', 'score' => 90, 'status' => 'active'],
            ['user_id' => 5, 'role' => 'Designer', 'level' => 'Intermediate', 'score' => 80, 'status' => 'pending'],
            ['user_id' => 6, 'role' => 'Project Manager', 'level' => 'Expert', 'score' => 95, 'status' => 'active'],
            ['user_id' => 7, 'role' => 'System Admin', 'level' => 'Expert', 'score' => 100, 'status' => 'active'],
            ['user_id' => 8, 'role' => 'Security Analyst', 'level' => 'Intermediate', 'score' => 85, 'status' => 'active'],
            ['user_id' => 9, 'role' => 'Frontend Developer', 'level' => 'Intermediate', 'score' => 78, 'status' => 'inactive'],
            ['user_id' => 10, 'role' => 'Backend Developer', 'level' => 'Advanced', 'score' => 92, 'status' => 'active'],
            ['user_id' => 11, 'role' => 'Data Analyst', 'level' => 'Intermediate', 'score' => 82, 'status' => 'active'],
            ['user_id' => 12, 'role' => 'Machine Learning Engineer', 'level' => 'Expert', 'score' => 98, 'status' => 'active'],
            ['user_id' => 13, 'role' => 'Business Analyst', 'level' => 'Intermediate', 'score' => 79, 'status' => 'pending'],
            ['user_id' => 14, 'role' => 'Full Stack Developer', 'level' => 'Expert', 'score' => 88, 'status' => 'active'],
            ['user_id' => 15, 'role' => 'Cloud Architect', 'level' => 'Advanced', 'score' => 94, 'status' => 'active'],
            ['user_id' => 16, 'role' => 'Database Administrator', 'level' => 'Advanced', 'score' => 90, 'status' => 'active'],
            ['user_id' => 17, 'role' => 'Network Engineer', 'level' => 'Intermediate', 'score' => 81, 'status' => 'active'],
            ['user_id' => 18, 'role' => 'Data Scientist', 'level' => 'Expert', 'score' => 99, 'status' => 'active'],
            ['user_id' => 19, 'role' => 'QA Engineer', 'level' => 'Intermediate', 'score' => 76, 'status' => 'inactive'],
            ['user_id' => 20, 'role' => 'UX/UI Designer', 'level' => 'Beginner', 'score' => 70, 'status' => 'pending'],
        ];

        DB::table('user_roles')->insert($roles);
    }
}

