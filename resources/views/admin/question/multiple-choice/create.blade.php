@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">Add a Question</h1>

    <div id="root">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Step 2: Add Questions (Multiple Choice)</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        <form id="add_question_form" v-on:submit="validateForm" method="POST"
                            action="{{ route('store-question-multiple-choice', ['quiz_id' => $quiz_id]) }}">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="question_title" class="form-label h4 mb-3">Question:</label>
                                        <textarea class="form-control" name="question_title" id="question_title" cols="60"
                                            rows="10" v-model="question" autofocus ></textarea>
                                    </div>
                                    <div class="mb3">
                                        @error('question_title')
                                            <div class="alert alert-danger">
                                                <div class="alert-message">
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div v-for="(answer,key) in answers" :key="key">
                                        @{{ key }} . @{{ answer . content }}
                                    </div>
                                    <hr>
                                    Correct Answer: @{{ correctAnswer }}
                                </div>
                                <div class="col-md-8">

                                    <h4 class="mb-3">Answers Options:</h4>
                                    <table class="table table-bordered">


                                        <tr v-for="(answer,key) in answers" :key="key">

                                            <td style="width: 40px">
                                                <input type="radio" v-model="correctAnswer" name="correct_answer"
                                                    :value="key" class="form-check-input">
                                            </td>
                                            <td>
                                                <div class="input-group input-group-navbar">
                                                    <input type="text" class="form-control" v-model="answer.content"
                                                        placeholder="Answer Option" name="answer[]">
                                                    <button v-show="key >= 2" class="btn text-danger" type="button"
                                                        v-on:click="removeAnswer(key)">
                                                        <svg viewBox="0 0 24 24" width="16" height="16"
                                                            stroke="currentColor" stroke-width="2" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>

                                            </td>

                                        </tr>
                                    </table>

                                    <button class="btn btn-success mb-3" v-on:click.prevent="addAnswer()">Add an
                                        answer</button>

                                    @error('answer.*')
                                        <div class="alert alert-danger mb-3">
                                            <div class="alert-message">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror

                                    @error('correct_answer')
                                        <div class="alert alert-danger mb-3">
                                            <div class="alert-message">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror

                                    <div class="alert alert-danger mb-3" v-if="errors.length">
                                        <div class="alert-message">
                                            <ul>
                                                <li v-for="error in errors">@{{ error }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')

    <script>
        let app = new Vue({
            el: '#root',
            data: {
                question: '',
                answers: [{
                        content: ''
                    },
                    {
                        content: ''
                    },
                    {
                        content: ''
                    },
                    {
                        content: ''
                    }

                ],

                correctAnswer: '',
                errors: []

            },
            methods: {
                addAnswer(key) {
                    let newAnswer = {
                        content: ''
                    }; //Set new blank answer
                    this.answers.push(newAnswer); //Push to answers array
                },
                removeAnswer(key) {
                    if (this.correctAnswer == key) { //Clear correctAnswer if Correct Answer Option is removed
                        this.correctAnswer = '';
                    } else if (this.correctAnswer >
                        key
                    ) { //If removed answer is above correct answer, reduce correct answer value by one to match key
                        this.correctAnswer--;
                    }

                    this.answers.splice(key, 1);
                },

                checkForEmptyAnswers(array){
                    // Function to check if content of array is empty
                    const empty_answers = (element) => element.content === ''; 

                    if (array.some(empty_answers)) { //Check if there are any empty answers
                        return true;
                    };
                },
                checkForDuplicateAnswers(array){

                    //Function to check of two simple arrays have duplicates
                    function hasDuplicates(array) {
                        return new Set(array).size !== array.length
                    }

                    //Set an empty array for simplified array
                    var stripped_answers_array = [];

                    //Simplify the array
                    array.forEach(answer => {
                        stripped_answers_array.push(answer.content); 
                    });

                 

                    //Check if there are duplicates
                    if (hasDuplicates(stripped_answers_array)) {
                          return true;
                      }


                },
                validateForm: function(e) {

                    //Set error array to empty
                    this.errors = []; 

                    //Check if user has entered a question
                    if (!this.question) { 
                        this.errors.push("A Question is required.");
                    }

                    //Check if user has selected a correct answer
                    if (!this.correctAnswer) { 
                        this.errors.push("Please select a correct answer.");
                    }

                    // Check if there are empty answers
                    if(this.checkForEmptyAnswers(this.answers)){
                        this.errors.push(
                            "Please fill all the answer inputs. Delete empty answers if possible.");
                    }

                    // Check if there are duplucate answers
                    if(this.checkForDuplicateAnswers(this.answers)){
                        this.errors.push(
                            "You cannot have duplicate answers!");
                    }

                    //Submit form if there are no errors
                    if (!this.errors.length) {
                        return true;
                    }

                    //Prevent form submission if there are errors
                    e.preventDefault();
                }
            }
        })

    </script>

@endsection
