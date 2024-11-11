<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $table = 'user_answers'; // Optional, but explicit if using 'user_answers'
    
    // Define the fillable properties for mass assignment
    protected $fillable = [
        'user_id',
        'interview_id',
        'question_id',
        'answer_text',
    ];

    // Optional: Define relationships if needed, such as to a Question model
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
