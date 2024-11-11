<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InterviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\InterviewUserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/admin/interview/create', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);


Route::post('/generate-text', [OpenAIController::class, 'generateText']);

Route::post('/submit-interview-user', [InterviewUserController::class, 'submit']);
Route::post('/interview-question', [InterviewController::class, 'getQuestions']);
Route::post('/interview-Answer', [InterviewUserController::class, 'SubmitAnswer']);
