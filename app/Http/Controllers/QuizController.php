<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Quiztype;
use App\Models\User;
use App\Http\Requests\StoreQuizRequest;
use Illuminate\Support\Facades\Auth;



class QuizController extends Controller
{

    protected $quiz;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]); //Make all functions pass through auth middleware, except those mentioned
        $this->quiz = new Quiz;
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
            $quizzes = Quiz::orderBy('id', 'desc')->paginate(10);
        } else {
            $quizzes = Auth::user()->quiz()->orderBy('created_at', 'desc')->paginate(10);
        }

        
        return view('admin.quiz.index', ['quizzes' => $quizzes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $quiztypes = Quiztype::all();

        return view('admin/quiz/create')
            ->with('quiztypes', $quiztypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizRequest $request)
    {

        $request->validated(); //Validate Request using Form Request

        $newQuiz = Quiz::create([
            'name' => request('quiz_title'),
            'description' => request('quiz_description'),
            'user_id' => auth()->user()->id
        ]);

        // if (request('quiz_type') == 1) {
        return redirect()->route('edit-quiz', ['quiz_id' => $newQuiz->id]);
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id)
    {
        //Find Quiz by ID
        $quiz = Quiz::findOrFail($quiz_id);

        //Verify if Quiz belongs to current user
        if(!auth()->user()->can('update',$quiz)){
            abort('403');
        }
            return view('admin.quiz.edit', ['quiz' => $quiz]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
