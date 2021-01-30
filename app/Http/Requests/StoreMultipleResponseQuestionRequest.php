<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleResponseQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'question_title.required' => 'A Question is required',
            'correct_answers.required' => 'Please select a correct answer',
            'answer.*.required' => 'Please fill all the answer inputs. At least 2 answers are required.',
            'answer.*.distinct' => 'You cannot have duplicate answers!',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_title' => 'required|string|min:3|max:255',
            'correct_answers' => 'required',
            'answer' => 'required|array|min:2',
            'answer.*' => 'required|string|distinct|max:255'
        ];
    }
}
