<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuestionService; 

class InterviewController extends Controller
{
    protected $questionService;

    /**
     * Inject the QuestionService into the controller.
     */
    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * Get questions based on the user's skills and experience level.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getQuestions(Request $request)
{
    $validatedData = $request->validate([
        'skills' => 'required|string', 
        'role' => 'required|string', 
        'experienceLevel' => 'required|integer', 
    ]);

    $skills = json_decode($validatedData['skills'], true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return response()->json(['message' => 'Invalid skills data.'], 400);
    }

    try {
        $questions = $this->questionService->getQuestions($skills, $validatedData['experienceLevel']);

        return response()->json([
            'questions' => $questions,
        ]);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error fetching questions.'], 500);
    }
}

}
