<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionPaper;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    /**
     * @return mixed
     */
    public function getQuestionPaper()
    {
        $getRandomQuestion = Question::all()->random(10);

        $pdf = \PDF::loadview('question_paper', compact('getRandomQuestion'));

        $content = $pdf->download();

        $filename = time();
        Storage::put('uploads/'.$filename.'.pdf', $content);

        $question_papers = new QuestionPaper();
        $question_papers->question_paper = $filename ;
        $question_papers->save();

        return $pdf->stream('question_paper.pdf');
    }
}
