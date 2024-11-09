<?php

namespace App\Services;

use App\Models\InterviewUser; // Assuming InterviewUser is your model

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
                throw new \InvalidArgumentException("Invalid experience level");
        }

        // Create a new instance of InterviewUser and save the data
        $user = new InterviewUser();
        $user->email = $data['email'];
        $user->experienceLevel = $experienceLevel; // Set mapped integer value
        $user->name = $data['name'];
        $user->role = $data['role'];
        $user->skills = json_encode($data['skills']);  // Store skills as JSON

        // Save the user data to the database
        $user->save();

        return $user; // Return the saved user
    }
}
