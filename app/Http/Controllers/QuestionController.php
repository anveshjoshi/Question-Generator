<?php

namespace App\Http\Controllers;

use App\Question;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return view('add_question');
    }

    public function store(Request $request)
    {
        $question = new Question();

        $question->question = request('question');
        $question->save();

        return redirect()->back();
    }

    public function getQuestionPaper()
    {
        $getRandomQuestion = Question::all()->random(10);

        $pdf = \PDF::loadview('question_paper_format', compact('getRandomQuestion'));

        return $pdf->stream('question_paper_format.pdf');
    }
}
