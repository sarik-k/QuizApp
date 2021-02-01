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
                            action="{{ route('store-question-true-false', ['quiz_id' => $quiz_id]) }}">
                            @csrf
                            <input type="hidden" name="quiz_id" value="{{ $quiz_id }}">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="question_title" class="form-label h4 mb-3">Question:</label>
                                        <textarea class="form-control" name="question_title" id="question_title" cols="60"
                                            rows="10" v-model="question" autofocus></textarea>
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
                                    
                                </div>
                                <div class="col-md-8">

                                    <h4 class="mb-3">Answers Options:</h4>
                                    <table class="table table-bordered">
                        
                                        <tr v-for="(answer,key) in answers" :key="key">
                                            <td style="width: 40px">
                                                <input type="radio" v-model="correctAnswer" name="correct_answer" :value="key"
                                                    class="form-check-input" :id="key">
                                            </td>
                                            <td>
                                                <label class="form-check-label" :for="key">
                                                    @{{ answer.content }}
                                                  </label>
                                            </td>
                                        </tr>
                                    
                                </table> 

                                    {{-- <button class="btn btn-success mb-3" v-on:click.prevent="addAnswer()">Add an
                                        answer</button> --}}

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
                    content: 'False'
                },
                {
                    content: 'True'
                },
            ],

            correctAnswer: null,
            errors: [],

        },

        methods: {

            validateForm: function(e) {

                //Set error array to empty
                this.errors = [];

                //Check if user has entered a question
                if (!this.question) {
                    this.errors.push("A Question is required.");
                }

                //Check if user has selected a correct answer
                if (this.correctAnswer == null) {
                    this.errors.push("Please select a correct answer.");
                }

                //Submit form if there are no errors
                if (!this.errors.length) {
                    return true;
                }

                //Prevent form submission if there are errors
                e.preventDefault();
            },
        }
    })

</script>

@endsection
