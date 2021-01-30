<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMultipleChoiceQuestionRequest;
use App\Http\Requests\StoreMultipleResponseQuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function create_multiple_choice($quiz_id)
    {
        //

        /* Deprecetad 
        $quiz = Quiz::findOrFail($quiz_id);

        
        if ($quiz->quiztype_id == 1) {
            return view('admin/question/multiple-choice/create')
            ->with('quiz_id',$quiz->id);

        } else {
            abort(404);
        }
        */
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
    }

    public function store_multiple_choice(StoreMultipleChoiceQuestionRequest $request)
    {
        //
        $request->validated();

        // ddd(request('question_title'));
        
        
        Question::create([
            'title' => request('question_title'),
            'correct_answer' => request('correct_answer'),
            'answers' => json_encode(request('answer')) ,
            'quiz_id' => request('quiz_id')
        ]);
        
        return redirect()->route('edit-quiz', ['quiz_id' => request('quiz_id')]);
        
    }

    public function store_multiple_response(StoreMultipleResponseQuestionRequest $request)
    {
        //
        $request->validated();
        
        
        Question::create([
            'title' => request('question_title'),
            'correct_answer' => json_encode(request('correct_answers')),
            'answers' => json_encode(request('answer')) ,
            'quiz_id' => request('quiz_id')
        ]);
        
        return redirect()->route('edit-quiz', ['quiz_id' => request('quiz_id')]);
        
    }

    public function store_true_false(Request $request)
    {
        //
        //$request->validated();

        // ddd(request('question_title'));
        
        
        $question = Question::create([
            'title' => request('question_title'),
            'correct_answer' => request('correct_answer'),
            'answers' => json_encode([0,1]) ,
            'quiz_id' => request('quiz_id')
        ]);
        
        return redirect()->route('edit-quiz', ['quiz_id' => request('quiz_id')]);
        
    }

    public function store_short_text(Request $request)
    {
        //
        //$request->validated();

        //ddd($request->request);

        

        
        Question::create([
            'title' => request('question_title'),
            'correct_answer' => json_encode(simplifyArray(request('answer'))),
            'answers' => json_encode(request('answer')) ,
            'quiz_id' => request('quiz_id')
        ]);
        
        return redirect()->route('edit-quiz', ['quiz_id' => request('quiz_id')]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
