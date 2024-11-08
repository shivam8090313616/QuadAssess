<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\RegistrationService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function register(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'country',
            'state',
            'account_type',
            'phone',
            'address',
            'designation',
            'position',
        ]);

        // Generate a custom UID
        do {
            $uid = strtoupper(substr($data['name'], 0, 3))  // First 3 letters of name (uppercase)
                . strtolower(substr($data['email'], 0, 3))  // First 3 letters of email (lowercase)
                . rand(100000, 999999);  // A random 6-digit number

            // Check if the UID already exists in the database
        } while (User::where('uid', $uid)->exists());

        // Add UID to data
        $data['uid'] = $uid;

        // Call the registration service
        $result = $this->registrationService->register($data);

        if ($result['success']) {
            return response()->json([
                'message' => 'User registered successfully.',
                'user' => $result['user']
            ], 201);
        } else {
            return response()->json([
                'message' => 'Registration failed.',
                'errors' => $result['errors']
            ], 422);
        }
    }
}
