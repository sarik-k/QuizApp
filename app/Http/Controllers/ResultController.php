<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResultController extends Controller
{
    protected $result;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //Make all functions pass through auth middleware, except those mentioned
        $this->result = new Result;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if (Auth::user()->hasPermissionTo('do anything')) {
            $results = Result::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $results = Auth::user()->result()->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.result.index', ['results' => $results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        

        $quiz = Quiz::findOrFail($request->quiz_id); //Find the quiz the submission belongs to
        $answers = []; //Set an empty array to store answers

        $total_questions = $quiz->question->count(); // Count the number of questions
        $total_correct_answer_options = 0; //Set an empty variable to calculate total correct answers of all questions combined

        $total_correct_answers_given = 0; //Set an empty variable to calculate total correct answers given by participant
        $total_wrong_answers_given = 0; //Set an empty variable to calculate total wrong answers given by participant
        $total_score = 0; //Set an empty variable to calculate total score of participant

        
        $request->validate([
            'answer' => 'min:'.$total_questions
        ]);

        //Store answers in $answers array


        foreach ($quiz->question->all() as $key => $question) {

            if ($question->questiontype->id == 1) {

                if ($request->answer[$key] == $question->correct_answer) {
                    $total_correct_answers_given++; //Increase correct_answers counter for every correct answer
                }

                $total_correct_answer_options++;

                $answer = $this->result->getMultipleChoiceAnswers($request->answer[$key], $question);
                array_push($answers, $answer);
            }

            if ($question->questiontype->id == 2) {

                if (in_array($request->answer[$key], json_decode($question->correct_answer))) {
                    $total_correct_answers_given++; //Increase correct_answers counter for every correct answer
                } else {
                    $total_wrong_answers_given++;
                }
                $total_correct_answer_options = $total_correct_answer_options + count(json_decode($question->correct_answer));

                $answer = $this->result->getMultipleResponseAnswers($request->answer[$key], $question, $total_correct_answer_options);
                array_push($answers, $answer);
            }

            if ($question->questiontype->id == 3) {

                $is_correct = false;
                $score = 0;

                $total_correct_answer_options++;


                if ($request->answer[$key] == $question->correct_answer) {
                    $total_correct_answers_given++; //Increase correct_answers counter for every correct answer
                    $is_correct = true;
                    $score = 1;
                }

                //Write to $answers array
                array_push($answers, [
                    "question" => $question->title,
                    "all_answers" => json_decode($question->answers),
                    "given_answer" => $request->answer[$key],
                    "correct_answer" => $question->correct_answer,
                    "is_correct" => $is_correct,
                    "score" => $score,
                    "question_type" => 3
                ]);
            }

            if ($question->questiontype->id == 4) {

                $is_correct = false;
                $score = 0;

                $total_correct_answer_options++;


                if (in_array(simplifyAnswer($request->answer[$key]), json_decode($question->correct_answer))) {
                    $total_correct_answers_given++;
                    $is_correct = true;
                    $score = 1;
                }

                //Write to $answers array
                array_push($answers, [
                    "question" => $question->title,
                    "all_answers" => json_decode($question->answers),
                    "given_answer" => $request->answer[$key],
                    "correct_answers" => json_decode($question->correct_answer),
                    "is_correct" => $is_correct,
                    "score" => $score,
                    "question_type" => 4
                ]);
            }
        }

        //Score Calculation
        foreach ($answers as $key => $answer) {
            $total_score =$total_score + $answer['score'];
        }


        $result = Result::create([
            "quiz_id" => $quiz->id,
            "email" => request('email'),
            "name" => request('name'),
            "answers" => json_encode($answers),
            "total_questions" => $total_questions,
            "correct_answers" => $total_correct_answers_given - $total_wrong_answers_given,
            "score" => $total_score / $total_correct_answer_options * 100
        ]);

        return redirect()->route('show-result', ["result_id" => $result->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show($result_id)
    {
        
        $result = Result::findOrFail($result_id);
        $quiz = $result->quiz;

        return view('quiz.result', ["result" => $result, "quiz" => $quiz]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
