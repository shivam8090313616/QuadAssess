<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['role_name' => 'Admin'],
            ['role_name' => 'Interviewer'],
            ['role_name' => 'Student'],
            ['role_name' => 'Candidate'],
            ['role_name' => 'HR'],
            ['role_name' => 'Manager'],
            ['role_name' => 'Developer'],
            ['role_name' => 'Designer'],
            ['role_name' => 'Tester'],
            ['role_name' => 'Team Lead'],
            ['role_name' => 'Project Manager'],
            ['role_name' => 'Marketing'],
            ['role_name' => 'Sales'],
            ['role_name' => 'Operations'],
            ['role_name' => 'Support'],
            ['role_name' => 'Quality Assurance'],
            ['role_name' => 'Business Analyst'],
            ['role_name' => 'Product Owner'],
            ['role_name' => 'Content Writer'],
        ]);
    }
}
