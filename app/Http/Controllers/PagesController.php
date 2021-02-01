<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitMultipleChoiceQuestionRequest;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;


class PagesController extends Controller
{
    //
    protected $quiz;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //Make all functions pass through auth middleware, except those mentioned
        $this->quiz = new Quiz;
    }

    public function home()
    {
        $quiz = $quizzes = $this->quiz->orderBy('created_at', 'desc')->take(10)->get();
        return view('home', ['quizzes' => $quizzes]);
    }

    public function takeQuiz($quiz_id)
    {

        $quiz = Quiz::findOrFail($quiz_id);

        return view('quiz.take', ["quiz" => $quiz]);

    }

    
}
