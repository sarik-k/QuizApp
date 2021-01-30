@extends('admin/layout')

@section('content')

    <div id="root">
        <h1 class="h3 ">Quiz Editor </h1>
        <p class="h5 mb-3">{{ $quiz->quiztype->name }} - <small
                class="text-muted">{{ $quiz->quiztype->description }}</small></p>

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline">{{ $quiz->name }}</h4>

                        <!-- Add Question Trigger Button -->
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#addQuestion">
                            + Add a Question
                        </button>
                    </div>

                    <div class="card-body">

                        @include('admin.quiz.trueFalse.addQuestion')




                         @forelse ($quiz->question as $key => $question)
                            <div class="card">
                                <div class="card-body">
                                    <strong>Question {{ $key + 1 }}:</strong> {{ $question->title }} <br>
                                    <hr>
                                    <div class="row">
                                        @foreach (json_decode($question->answers) as $k => $answer)
                                            <div class="col-6" style="display:flex;flex-direction: column-reverse;">

                                                @if ($question->correct_answer == $k)

                                                    <div class="mb-3 text-success h4">
                                                        <i class="far fa-fw fa-check-circle"></i> {{ (boolval($answer) ? 'True' : 'False') }}
                                                    </div>

                                                @else

                                                    <div class="mb-3 text-danger h4">
                                                        <i class="far fa-fw fa-times-circle"></i> {{  (boolval($answer) ? 'True' : 'False')  }}
                                                    </div>

                                                @endif


                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        @empty
                            Start by adding a Question!
                        @endforelse 


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
            errors: []

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
            }
        }
    })

</script>

@endsection
