<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionPaper extends Model
{
    protected $table = 'question_papers';

    protected $fillable = [
        'question_paper',
    ];
}
