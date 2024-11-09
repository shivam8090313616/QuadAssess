<?php
namespace App\Services;

use App\Models\Answer;
use App\Models\Question;  // Assuming you have a Question model
use App\Models\Skill;

class QuestionService
{
    /**
     * Get questions based on the skills and experience level.
     *
     * @param array $skills
     * @param int $experienceLevel
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getQuestions(array $skills, int $experienceLevel)
    {
        // Get skill IDs for the given skill names
        $skillIds = Skill::whereIn('name', $skills)->pluck('id');
        
        // Fetch questions filtered by skill IDs and experience level
        $questions = Question::select('id','question_text')
            ->whereIn('skill_id', $skillIds)
            ->where('level_id', $experienceLevel)
            ->inRandomOrder()
            ->get();

        // Attach answers to each question
        foreach ($questions as $question) {
            $question->answer = Answer::select('answer_text')
                ->where('question_id', $question->id)
                ->first();  // Assuming one answer per question
        }

        return $questions;
    }

    /**
     * Get all questions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllQuestions()
    {
        return Question::all();
    }
}
