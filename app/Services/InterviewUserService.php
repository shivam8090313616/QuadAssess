<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\InterviewUser;  // Assuming InterviewUser is your model
use App\Models\Question;
use App\Models\User;
use App\Models\UserAnswer;

class InterviewUserService
{
    /**
     * Submit data to the InterviewUser model.
     *
     * @param array $data
     * @return \App\Models\InterviewUser
     */
    public function submitData(array $data)
    {
        // Mapping the experience level from string to integer
        switch ($data['experienceLevel']) {
            case 'Beginner':
                $experienceLevel = 1;
                break;
            case 'Intermediate':
                $experienceLevel = 2;
                break;
            case 'Expert':
                $experienceLevel = 3;
                break;
            default:
                // If invalid value is provided, you can either throw an exception or set a default value
                throw new \InvalidArgumentException('Invalid experience level');
        }

        // Create a new instance of InterviewUser and save the data
        $user = new InterviewUser();
        $user->email = $data['email'];
        $user->experienceLevel = $experienceLevel;  // Set mapped integer value
        $user->name = $data['name'];
        $user->role = $data['role'];
        $user->skills = json_encode($data['skills']);  // Store skills as JSON

        // Save the user data to the database
        $user->save();

        return $user;  // Return the saved user
    }

    public function fetchInterviewUsers(?string $name = null, ?string $email = null)
    {
        $query = InterviewUser::query();

        // Apply filters if provided
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }

        // Order by creation date in descending order
        // If no filters are applied, this will fetch all users
        return $query->orderBy('created_at', 'desc')->get();
    }

    public function fetchInterviewUsersAnswer(?string $email = null)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $answerSheet = UserAnswer::select('answer_text')
            ->where('user_id', $user->uid)
            ->first();

        if (!$answerSheet) {
            return response()->json(['message' => 'Answer sheet not found.'], 404);
        }
        $answers = json_decode($answerSheet->answer_text, true);
        $questionIds = array_keys($answers);
        $questions = Question::whereIn('id', $questionIds)->get();
        $response = [];
        foreach ($questions as $question) {
            $answer = $answers[$question->id] ?? 'No answer provided';
            $corrected_answer = Answer::where('question_id', $question->id)->first()->answer_text ?? 'No corrected answer available';

            $response[] = [
                'question' => $question->question_text,
                'User_answer' => $answer,
                'corrected_answer' => $corrected_answer
            ];
        }
        return $response;
    }
}
