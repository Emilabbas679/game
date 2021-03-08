<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionHistory extends Model
{
    protected $table = 'question_histories';
    protected $guarded = [];
    use HasFactory;


    public function history()
    {
        return $this->hasMany(QuestionHistoryAnswer::class, 'question_history_id', 'id')->with(['question', 'answer']);
    }



}
