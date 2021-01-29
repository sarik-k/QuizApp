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
        //$this->middleware('auth', ['except' => ['index', 'show']]); //Make all functions pass through auth middleware, except those mentioned
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
        return view('quiz.multipleChoice.take', ["quiz" => $quiz]);
    }

    public function submitMultipleChoice(SubmitMultipleChoiceQuestionRequest $request)
    {

        $request->validated(); //Validate the request using Form Request
        $quiz = Quiz::findOrFail($request->quiz_id); //Find the quiz the submission belongs to
        $answers = []; //Set an empty array to store answers
        $total_questions = $quiz->question->count(); // Count the number of questions
        $correct_answers = 0; //Set an empty variable to calculate scores

        //Store answers in $answers array
        foreach ($quiz->question->all() as $key => $question) {

            //Check whether provided answer is correct
            if ($request->answer[$key] == $question->correct_answer) {
                $is_correct = true;
                $correct_answers++; //Increase correct_answers counter for every correct answer
            } else {
                $is_correct = false;
            }

            //Write to $answers array
            array_push($answers, [
                "question" => $question->title,
                "all_answers" => json_decode($question->answers),
                "given_answer" => $request->answer[$key],
                "correct_answer" => $question->correct_answer,
                "is_correct" => $is_correct
            ]);
        }

        $result = Result::create([
            "quiz_id" => $quiz->id,
            "email" => request('email'),
            "name" => request('name'),
            "answers" => json_encode($answers),
            "total_questions" => $total_questions,
            "correct_answers" => $correct_answers,
            "score" => ($correct_answers/$total_questions)*100
        ]);

        return redirect()->route('show-multiple-choice-result',["result_id" => $result->id]);
        //return view('quiz.multipleChoice.result', ["result" => $result]);
    }

    public function showMultipleChoiceResult($result_id){

        $result = Result::findOrFail($result_id);

        return view('quiz.multipleChoice.result', ["result" => $result]);
    }
}
