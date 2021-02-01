<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function getMultipleChoiceAnswers($givenAnswer, $question)
    {
        $is_correct = false;
        $score = 0;

        //Check whether provided answer is correct
        if ($givenAnswer == $question->correct_answer) {
            $is_correct = true;
            $score = 1;
        }

        return [
            "question" => $question->title,
            "all_answers" => json_decode($question->answers),
            "given_answer" => $givenAnswer,
            "correct_answer" => $question->correct_answer,
            "is_correct" => $is_correct,
            "score" => $score
        ];
    }

    public function getMultipleResponseAnswers($givenAnswers, $question, $total_correct_answer_options)
    {
        $no_of_correct_answers_given = 0; //Set an empty variable to calculate no of correct answers given for this question
        $no_of_wrong_answers_given = 0; //Set an empty variable to calculate no of wrong answers given for this question

        foreach ($givenAnswers as $index => $given_answer) {

            if (in_array($given_answer, json_decode($question->correct_answer))) {
                $no_of_correct_answers_given++;
            } else {
                $no_of_wrong_answers_given++;
            }
        }

        $score = ($no_of_correct_answers_given - $no_of_wrong_answers_given);

        return [
            "question" => $question->title,
            "all_answers" => json_decode($question->answers),
            "given_answers" => array_values($givenAnswers),
            "correct_answers" => json_decode($question->correct_answer),
            "no_of_correct_answers_given" => $no_of_correct_answers_given,
            "no_of_wrong_answers_given" => $no_of_wrong_answers_given,
            "score" => $score
        ];
    }
}
