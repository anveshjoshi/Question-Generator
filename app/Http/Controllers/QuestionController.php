<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionPaper;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

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

        //store in local storage
        $filename = time();
        Storage::put('uploads/'.$filename.'.pdf', $content);

        //store in database
        $question_papers = new QuestionPaper();
        $question_papers->question_paper = $filename ;
        $question_papers->save();

        return $pdf->stream('question_paper.pdf');
    }

    public function editPDF()
    {
        $pdf = new FPDI();
        $pdf->AddPage();
        $pdf->setSourceFile('C:\xampp\htdocs\Question Generator\storage\app\uploads\1575436081.pdf');
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $pdf->SetFont('Arial', 'B', '24');
        $pdf->SetXY(0,50);
        $pdf->Image('C:\xampp\htdocs\Question Generator\college_logo.png',40,10,-100);
        $time = time();
        $pdf->Output('F', $time.'_new.pdf');

        return redirect()->back();
    }
}
