<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewUserData extends Model
{ use HasFactory;

    use HasFactory;

    protected $table = 'interview_user_data';

    protected $fillable = [
        'interview_id',
        'score',
        'correct_answers',
        'incorrect_answers',
        'email',
        'experienceLevel',
        'name',
        'role',
        'skills',
        'marks_per_question',
    ];

    protected $casts = [
        'skills' => 'array',
        'marks_per_question' => 'array',
    ];
}
