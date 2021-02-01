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

            return

            //Write to $answers array
            array_push($answers, [
                "question" => $question->title,
                "all_answers" => json_decode($question->answers),
                "given_answer" => $request->answer[$key],
                "correct_answer" => $question->correct_answer,
                "is_correct" => $is_correct
            ]);
        }

        // Store the result to Database
        $result = Result::create([
            "quiz_id" => $quiz->id,
            "email" => request('email'),
            "name" => request('name'),
            "answers" => json_encode($answers),
            "total_questions" => $total_questions,
            "correct_answers" => $correct_answers,
            "score" => ($correct_answers / $total_questions) * 100
        ]);

        return redirect()->route('showResult', ["result_id" => $result->id]);
    }

    public function submitMultipleResponse(Request $request)
    {
        //ddd(array_values($request->answer[3]));

        //$request->validated(); //Validate the request using Form Request
        $quiz = Quiz::findOrFail($request->quiz_id); //Find the quiz the submission belongs to
        $answers = []; //Set an empty array to store answers
        $total_questions = $quiz->question->count(); // Count the number of questions
        $total_correct_answers_given = 0; //Set an empty variable to calculate total correct answers given by participant
        //$total_answers = 0; //Set an empty variable to calculate total answers of all questions combined
        $total_correct_answer_options = 0; //Set an empty variable to calculate total correct answers of all questions combined

        $total_wrong_answers_given = 0; //Set an empty variable to calculate total wrong answers given by participant

        //Store answers in $answers array
        foreach ($quiz->question->all() as $key => $question) {

            $no_of_correct_answers_given = 0; //Set an empty variable to calculate no of correct answers given for this question
            $no_of_wrong_answers_given = 0; //Set an empty variable to calculate no of wrong answers given for this question

            foreach ($request->answer[$key] as $index => $given_answer) {

                if (in_array($given_answer, json_decode($question->correct_answer))) {
                    $no_of_correct_answers_given++;
                    $total_correct_answers_given++; //Increase correct_answers counter for every correct answer
                } else {
                    $no_of_wrong_answers_given++;
                    $total_wrong_answers_given++;
                }
            }

            //$total_answers = $total_answers + count(json_decode($question->answers));
            $total_correct_answer_options = $total_correct_answer_options + count(json_decode($question->correct_answer));


            //Write to $answers array
            array_push($answers, [
                "question" => $question->title,
                "all_answers" => json_decode($question->answers),
                "given_answers" => array_values($request->answer[$key]),
                "correct_answers" => json_decode($question->correct_answer),
                "no_of_correct_answers_given" => $no_of_correct_answers_given,
                "no_of_wrong_answers_given" => $no_of_wrong_answers_given
            ]);
        }


        $score = ($total_correct_answers_given - $total_wrong_answers_given) / $total_correct_answer_options * 100;


        // Store the result to Database
        $result = Result::create([
            "quiz_id" => $quiz->id,
            "email" => request('email'),
            "name" => request('name'),
            "answers" => json_encode($answers),
            "total_questions" => $total_questions,
            "correct_answers" => $total_correct_answers_given,
            "score" => $score
        ]);

        return redirect()->route('showResult', ["result_id" => $result->id]);
    }

    public function submitTrueFalse(Request $request)
    {

        //$request->validated(); //Validate the request using Form Request
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

        // Store the result to Database
        $result = Result::create([
            "quiz_id" => $quiz->id,
            "email" => request('email'),
            "name" => request('name'),
            "answers" => json_encode($answers),
            "total_questions" => $total_questions,
            "correct_answers" => $correct_answers,
            "score" => ($correct_answers / $total_questions) * 100
        ]);

        return redirect()->route('showResult', ["result_id" => $result->id]);
    }

    public function submitShortText(Request $request)
    {

        //$request->validated(); //Validate the request using Form Request

        //ddd($request->request);

        $quiz = Quiz::findOrFail($request->quiz_id); //Find the quiz the submission belongs to
        $answers = []; //Set an empty array to store answers
        $total_questions = $quiz->question->count(); // Count the number of questions
        $correct_answers = 0; //Set an empty variable to calculate scores

        //Store answers in $answers array
        foreach ($quiz->question->all() as $key => $question) {

            // ddd($request->answer[$key]);

            $is_correct = false;

            
            if (in_array(simplifyAnswer($request->answer[$key]), json_decode($question->correct_answer))) {
                $correct_answers++;
                $is_correct = true;
            }
            



            //Write to $answers array
            array_push($answers, [
                "question" => $question->title,
                "all_answers" => json_decode($question->answers),
                "given_answer" => $request->answer[$key],
                "correct_answers" => json_decode($question->correct_answer),
                "is_correct" => $is_correct
            ]);
        }

        // Store the result to Database
        $result = Result::create([
            "quiz_id" => $quiz->id,
            "email" => request('email'),
            "name" => request('name'),
            "answers" => json_encode($answers),
            "total_questions" => $total_questions,
            "correct_answers" => $correct_answers,
            "score" => ($correct_answers / $total_questions) * 100
        ]);

        return redirect()->route('showResult', ["result_id" => $result->id]);
    }

    public function showResult($result_id)
    {

        $result = Result::findOrFail($result_id);
        $quiz = $result->quiz;

        if ($result->quiz->quiztype->id == 1) {
            return view('quiz.multipleChoice.result', ["result" => $result, "quiz" => $quiz]);
        }

        if ($result->quiz->quiztype->id == 2) {
            return view('quiz.multipleResponse.result', ["result" => $result, "quiz" => $quiz]);
        }

        if ($result->quiz->quiztype->id == 3) {
            return view('quiz.trueFalse.result', ["result" => $result, "quiz" => $quiz]);
        }

        if ($result->quiz->quiztype->id == 4) {
            return view('quiz.shortText.result', ["result" => $result, "quiz" => $quiz]);
        }
    }
}
