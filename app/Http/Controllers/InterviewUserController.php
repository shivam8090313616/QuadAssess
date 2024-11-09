<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InterviewUserService; // Import the service

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
    public function submit(Request $request)
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
}
