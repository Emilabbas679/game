<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionHistoryAnswer extends Model
{
    protected $table = 'question_history_answers';
    protected $guarded = [];
    use HasFactory;



    public function question()
    {
        return $this->hasOne(Question::class, 'id', 'question_id');
    }

    public function answer()
    {
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }
}
