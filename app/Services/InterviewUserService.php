<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\InterviewUser;  // Assuming InterviewUser is your model
use App\Models\InterviewUserData;
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
                throw new \InvalidArgumentException('Invalid experience level');
        }
        $interview_id = strtoupper('INTV-' . uniqid() . '-' . mt_rand(10, 99)); // e.g., INTV-5F2C1E9A7B-5678

        $user = new InterviewUserData();
        $user->email = $data['email'];
        $user->interview_id = $interview_id;
        $user->experienceLevel = $experienceLevel; 
        $user->name = $data['name'];
        $user->role = $data['role'];
        $user->skills = json_encode($data['skills']);  // Store skills as JSON

        // Save the user data to the database
        $user->save();

        return $user;  // Return the saved user
    }

   

    public function fetchInterviewUsers(?string $name = null, ?string $email = null)
    {
        $query = InterviewUserData::query();

        // Apply filters if provided
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($email) {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    public function fetchInterviewUsersAnswer(?string $email = null)
    {
        
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $answerSheet = UserAnswer::select('answer_text')
            ->where('user_id', $email)
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
