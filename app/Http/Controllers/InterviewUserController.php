<?php

namespace App\Http\Controllers;

use App\Models\InterviewResult;
use App\Models\User;
use App\Models\UserAnswer;
use App\Services\InterviewUserService;  // Import the service
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class InterviewUserController extends Controller
{
    protected $interviewUserService;

    /**
     * Inject the InterviewUserService into the controller.
     *
     * @param InterviewUserService $interviewUserService
     */
    public function __construct(InterviewUserService $interviewUserService)
    {
        $this->interviewUserService = $interviewUserService;
    }

    /**
     * Handle the form submission and store data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function submitInterviewUser(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'email' => 'required|email|unique:interviewusers,email',
            'experienceLevel' => 'required',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'skills' => 'required|array',
            'skills.*' => 'string|max:255',
        ]);

        // Call the service to submit the data
        $user = $this->interviewUserService->submitData($validatedData);

        // Return a JSON response or view with the user data
        return response()->json([
            'message' => 'Data submitted successfully!',
            'user' => $user
        ], 200);
    }

    public function submitAnswer(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'data' => 'required|array',  // Ensure 'data' is an array
                'data.*.questionId' => 'required|integer',  // Each 'questionId' should be an integer
                'data.*.answer' => 'nullable|string',  // 'answer' should be a string, but can be empty
                'uid' => 'required|string',  // Ensure 'uid' is provided (user ID)
            ]);

            // Generate a unique interview ID
            $interviewId = 'ITVW' . rand(100000, 999999);  // Random 6-digit interview ID

            // Prepare the answers data as JSON
            $answersData = [];

            // Loop through the data and build the answers JSON
            foreach ($validatedData['data'] as $entry) {
                if (!empty($entry['answer'])) {
                    $answersData[$entry['questionId']] = $entry['answer'];
                }
            }

            // Store the answers as a JSON in the 'answer_text' column
            UserAnswer::create([
                'interview_id' => $interviewId,
                'question_id' => json_encode(array_keys($answersData)),  // Store all question IDs in JSON format
                'answer_text' => json_encode($answersData),  // Store all answers in JSON format
                'user_id' => $validatedData['uid'],  // Storing user ID
            ]);

            // Return success response with interview ID
            return response()->json([
                'message' => 'Answers submitted successfully!',
                'interview_id' => $interviewId,
            ], 201);
        } catch (\Exception $e) {
            // Handle errors
            return response()->json([
                'message' => 'An error occurred while submitting answers.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function InterviewUserList(Request $request)
    {
        $name = $request->query('name');
        $email = $request->query('email');

        $users = $this->interviewUserService->fetchInterviewUsers($name, $email);

        return response()->json([
            'message' => 'Interview users retrieved successfully!',
            'users' => $users
        ], 200);
    }

    public function InterviewUserAnswerList(Request $request){
        $email = $request->email;
        // return response()->json([$email]);
        $answersheet = $this->interviewUserService->fetchInterviewUsersAnswer($email);
        return response()->json([
            'message' => "User's answer sheet retrieved successfully!",
            'users' => $answersheet
        ], 200);
    }

    public function CheckedAnswerSubmit(Request $request)
    {
        // Step 1: Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'score' => 'required|integer',
            'correct_answers' => 'required|integer',
            'incorrect_answers' => 'required|integer',
        ]);
    
        // Step 2: Find the user based on the provided email
        $user = User::where('email', $validatedData['email'])->first();
    
        // Check if user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // Step 3: Find the interview ID associated with this user
        $userAnswer = UserAnswer::where('user_id', $user->uid)->first();
    
        // Check if interview ID exists
        if (!$userAnswer) {
            return response()->json(['message' => 'Interview not found for this user'], 404);
        }
    
        // Step 4: Create the interview result with validated data
        $result = InterviewResult::create([
            'interview_id' => $userAnswer->interview_id, // Assuming `id` is the correct interview ID
            'score' => $validatedData['score'],
            'correct_answers' => $validatedData['correct_answers'],
            'incorrect_answers' => $validatedData['incorrect_answers'],
        ]);
    
        // Step 5: Return a success response
        return response()->json([
            'message' => 'Interview result saved successfully!',
            'data' => $result
        ], 201);
    }
    
}
