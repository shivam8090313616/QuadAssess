<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationService
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return array
     */
    public function register(array $data): array
    {
        // Validation
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'account_type' => 'required|string',
            'phone' => 'required|string|min:10|max:15',
            'address' => 'required|string|max:255',
            'designation' => 'nullable|string|max:100',
            'position' => 'nullable|string|max:100',
            'uid' => 'required|string|unique:users,uid', // Ensure UID is unique
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors()->all()
            ];
        }

        // Hash password
        $data['password'] = Hash::make($data['password']);

        // Create user
        $user = User::create($data);

        return [
            'success' => true,
            'user' => $user
        ];
    }
}
