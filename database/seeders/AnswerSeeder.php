<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        // Dummy data for Beginner (level 1) answers
        $beginnerAnswers = [
            ['id' => 1, 'question_id' => 1, 'answer_text' => 'PHP is a popular general-purpose scripting language that is especially suited to web development.'],
            ['id' => 2, 'question_id' => 2, 'answer_text' => 'The syntax for a variable in PHP is $variableName.'],
            ['id' => 3, 'question_id' => 3, 'answer_text' => '`echo` is used to output one or more strings in PHP.'],
            ['id' => 4, 'question_id' => 4, 'answer_text' => 'A function in PHP is declared using the `function` keyword followed by the function name.'],
            ['id' => 5, 'question_id' => 5, 'answer_text' => '`$_GET` is used to collect form data after submitting an HTML form with method="get".'],
            ['id' => 6, 'question_id' => 6, 'answer_text' => '`==` is a comparison operator used to check equality of two values.'],
            ['id' => 7, 'question_id' => 7, 'answer_text' => 'You can include a file in PHP using the `include` or `require` function.'],
            ['id' => 8, 'question_id' => 8, 'answer_text' => '`include` generates a warning if the file is not found, while `require` generates a fatal error.'],
            ['id' => 9, 'question_id' => 9, 'answer_text' => 'An associative array in PHP is an array where each element is identified by a key instead of a numeric index.'],
            ['id' => 10, 'question_id' => 10, 'answer_text' => 'To connect to a MySQL database in PHP, you can use the `mysqli_connect()` function.'],
        ];

        // Dummy data for Intermediate (level 2) answers
        $intermediateAnswers = [
            ['id' => 11, 'question_id' => 11, 'answer_text' => 'The different types of loops in PHP are `for`, `while`, `do-while`, and `foreach`.'],
            ['id' => 12, 'question_id' => 12, 'answer_text' => 'OOP (Object-Oriented Programming) in PHP uses classes and objects to structure code.'],
            ['id' => 13, 'question_id' => 13, 'answer_text' => '`PDO` (PHP Data Objects) is a database access library that provides a consistent interface for database access.'],
            ['id' => 14, 'question_id' => 14, 'answer_text' => 'A `session` stores data on the server, while a `cookie` stores data on the client side.'],
            ['id' => 15, 'question_id' => 15, 'answer_text' => 'Exceptions can be handled in PHP using the `try-catch` block.'],
            ['id' => 16, 'question_id' => 16, 'answer_text' => '`array_map()` is a function that applies a callback to each element of an array.'],
            ['id' => 17, 'question_id' => 17, 'answer_text' => '`mysqli` is a database extension used for accessing MySQL databases, while `mysql` is deprecated.'],
            ['id' => 18, 'question_id' => 18, 'answer_text' => '`__construct()` is a special function that gets called when a new instance of a class is created.'],
            ['id' => 19, 'question_id' => 19, 'answer_text' => '`public`, `private`, and `protected` are access modifiers that define the visibility of properties and methods.'],
            ['id' => 20, 'question_id' => 20, 'answer_text' => 'To send emails using PHP, you can use the `mail()` function or a library like PHPMailer.'],
        ];

        // Dummy data for Expert (level 3) answers
        $expertAnswers = [
            ['id' => 21, 'question_id' => 21, 'answer_text' => '`traits` are a mechanism for code reuse in PHP, allowing methods to be shared across multiple classes.'],
            ['id' => 22, 'question_id' => 22, 'answer_text' => 'A custom autoloader in PHP can be implemented by defining a function that includes class files automatically when they are needed.'],
            ['id' => 23, 'question_id' => 23, 'answer_text' => '`final` classes cannot be extended, while `abstract` classes cannot be instantiated.'],
            ['id' => 24, 'question_id' => 24, 'answer_text' => 'Namespaces in PHP allow the organization of code into groups to avoid name conflicts.'],
            ['id' => 25, 'question_id' => 25, 'answer_text' => 'Dependency injection is a design pattern where an object receives its dependencies from an external source.'],
            ['id' => 26, 'question_id' => 26, 'answer_text' => 'PHP does not support multi-threading natively, but it can be achieved using extensions like `pthreads`.'],
            ['id' => 27, 'question_id' => 27, 'answer_text' => 'Security best practices in PHP include using prepared statements, validating input, and using HTTPS.'],
            ['id' => 28, 'question_id' => 28, 'answer_text' => 'Caching in PHP can be implemented using libraries like `APC`, `Memcached`, or `Redis`.'],
            ['id' => 29, 'question_id' => 29, 'answer_text' => '`composer` is a dependency manager for PHP that handles project dependencies and autoloading.'],
            ['id' => 30, 'question_id' => 30, 'answer_text' => 'A RESTful API in PHP can be implemented using frameworks like Laravel or Slim, by following REST principles.'],
        ];

        // Insert Beginner answers
        foreach ($beginnerAnswers as $answer) {
            DB::table('answers')->insert([
                'id' => $answer['id'],
                'question_id' => $answer['question_id'],
                'answer_text' => $answer['answer_text'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert Intermediate answers
        foreach ($intermediateAnswers as $answer) {
            DB::table('answers')->insert([
                'id' => $answer['id'],
                'question_id' => $answer['question_id'],
                'answer_text' => $answer['answer_text'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert Expert answers
        foreach ($expertAnswers as $answer) {
            DB::table('answers')->insert([
                'id' => $answer['id'],
                'question_id' => $answer['question_id'],
                'answer_text' => $answer['answer_text'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
