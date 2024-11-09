<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            ['name' => 'PHP', 'description' => 'Server-side scripting language', 'category' => 'Backend'],
            ['name' => 'JavaScript', 'description' => 'Programming language for web development', 'category' => 'Frontend'],
            ['name' => 'HTML', 'description' => 'Markup language for creating webpages', 'category' => 'Frontend'],
            ['name' => 'CSS', 'description' => 'Stylesheet language for styling webpages', 'category' => 'Frontend'],
            ['name' => 'React', 'description' => 'JavaScript library for building user interfaces', 'category' => 'Frontend'],
            ['name' => 'Node.js', 'description' => 'JavaScript runtime environment for server-side scripting', 'category' => 'Backend'],
            ['name' => 'Python', 'description' => 'General-purpose programming language', 'category' => 'Backend'],
            ['name' => 'Machine Learning', 'description' => 'Artificial intelligence technology that allows machines to learn from data', 'category' => 'Data Science'],
            ['name' => 'Data Analysis', 'description' => 'The process of inspecting and analyzing data for trends', 'category' => 'Data Science'],
            ['name' => 'UI/UX Design', 'description' => 'Designing user interfaces and improving user experience', 'category' => 'Design'],
            ['name' => 'SQL', 'description' => 'Structured Query Language for managing relational databases', 'category' => 'Backend'],
            ['name' => 'Git', 'description' => 'Version control system for tracking changes in code', 'category' => 'Tools'],
            ['name' => 'Docker', 'description' => 'Platform for developing, shipping, and running applications', 'category' => 'Tools'],
            ['name' => 'Kubernetes', 'description' => 'Open-source system for automating deployment, scaling, and management of containerized applications', 'category' => 'Tools'],
            ['name' => 'AWS', 'description' => 'Amazon Web Services - Cloud computing platform', 'category' => 'Cloud'],
            ['name' => 'Azure', 'description' => 'Cloud computing service created by Microsoft', 'category' => 'Cloud'],
            ['name' => 'Google Cloud', 'description' => 'Cloud computing platform provided by Google', 'category' => 'Cloud'],
            ['name' => 'Agile Methodology', 'description' => 'Project management methodology based on iterative development', 'category' => 'Project Management'],
            ['name' => 'DevOps', 'description' => 'Set of practices for combining software development and IT operations', 'category' => 'Operations'],
            ['name' => 'Scrum', 'description' => 'Agile framework for managing projects', 'category' => 'Project Management'],
        ];

        DB::table('skills')->insert($skills);
    }
}
