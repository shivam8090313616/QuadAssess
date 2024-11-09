<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewUser extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'interviewusers';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'email',
        'experienceLevel',
        'name',
        'role',
        'skills',
    ];

    // If skills are stored as JSON, make sure it's cast properly
    protected $casts = [
        'skills' => 'array',
    ];
}
