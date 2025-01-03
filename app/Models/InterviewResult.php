<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'interview_id',
        'score',
        'correct_answers',
        'incorrect_answers',
        'marks_per_question',
    ];
}
