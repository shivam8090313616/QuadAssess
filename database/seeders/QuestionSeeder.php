<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Dummy data for Beginner (level 1)
        $beginnerQuestions = [
            ['id' => 1, 'question_text' => 'What is PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 2, 'question_text' => 'What is the syntax for a variable in PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 3, 'question_text' => 'Explain the use of `echo` in PHP.', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 4, 'question_text' => 'How do you declare a function in PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 5, 'question_text' => 'What is the purpose of `$_GET` in PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 6, 'question_text' => 'What does `==` do in PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 7, 'question_text' => 'How can you include a file in PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 8, 'question_text' => 'What is the difference between `include` and `require`?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 9, 'question_text' => 'What is an associative array in PHP?', 'skill_id' => 1, 'level_id' => 1],
            ['id' => 10, 'question_text' => 'How do you connect to a MySQL database using PHP?', 'skill_id' => 1, 'level_id' => 1],
        ];

        // Dummy data for Intermediate (level 2)
        $intermediateQuestions = [
            ['id' => 11, 'question_text' => 'What are the different types of loops in PHP?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 12, 'question_text' => 'Explain the concept of object-oriented programming in PHP.', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 13, 'question_text' => 'What is the purpose of `PDO` in PHP?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 14, 'question_text' => 'What is the difference between `session` and `cookie` in PHP?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 15, 'question_text' => 'How can you handle exceptions in PHP?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 16, 'question_text' => 'What is the purpose of the `array_map()` function in PHP?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 17, 'question_text' => 'What is `mysqli` in PHP and how does it differ from `mysql`?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 18, 'question_text' => 'What is the purpose of the `__construct()` function in PHP?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 19, 'question_text' => 'What is the difference between `public`, `private`, and `protected` properties in PHP classes?', 'skill_id' => 1, 'level_id' => 2],
            ['id' => 20, 'question_text' => 'How do you send emails using PHP?', 'skill_id' => 1, 'level_id' => 2],
        ];

        // Dummy data for Expert (level 3)
        $expertQuestions = [
            ['id' => 21, 'question_text' => 'Explain the use of `traits` in PHP.', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 22, 'question_text' => 'How would you implement a custom autoloader in PHP?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 23, 'question_text' => 'What is the difference between `final` and `abstract` classes in PHP?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 24, 'question_text' => 'What are namespaces in PHP and how do they work?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 25, 'question_text' => 'Explain the concept of dependency injection in PHP.', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 26, 'question_text' => 'How do you handle multi-threading in PHP?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 27, 'question_text' => 'What are the security best practices in PHP?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 28, 'question_text' => 'How would you implement caching in PHP?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 29, 'question_text' => 'What is the use of `composer` in PHP?', 'skill_id' => 1, 'level_id' => 3],
            ['id' => 30, 'question_text' => 'How do you implement RESTful API in PHP?', 'skill_id' => 1, 'level_id' => 3],
        ];

        // Insert Beginner questions
        foreach ($beginnerQuestions as $question) {
            DB::table('questions')->insert([
                'id' => $question['id'],
                'question_text' => $question['question_text'],
                'skill_id' => $question['skill_id'],
                'level_id' => $question['level_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert Intermediate questions
        foreach ($intermediateQuestions as $question) {
            DB::table('questions')->insert([
                'id' => $question['id'],
                'question_text' => $question['question_text'],
                'skill_id' => $question['skill_id'],
                'level_id' => $question['level_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert Expert questions
        foreach ($expertQuestions as $question) {
            DB::table('questions')->insert([
                'id' => $question['id'],
                'question_text' => $question['question_text'],
                'skill_id' => $question['skill_id'],
                'level_id' => $question['level_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
