<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameQuiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_type',
        'attemp_question',
        'attemp_answer',
        'time',
        'points',
        'correct'
    ];
}
