@extends('admin/layout')

@section('content')

    <div id="main">
        <h1 class="h3 ">Quiz Editor </h1>

        <div class="row">
            <div class="col-md-4">
                @include('admin.quiz.sidebar')
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">

                        <!-- Add Question Trigger Button -->
                        {{-- <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#selectType">
                            + Add a Question
                        </button> --}}
                        <div class="btn-group float-right" role="group">
                            <button id="add-question-button" type="button"
                                class="btn btn-primary dropdown-toggle float-right" data-bs-toggle="dropdown">
                                + Add a Question
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('create-question', ['quiz_id' => $quiz->id,'questiontype_id' => 1]) }}"
                                        class="btn btn-light w-100">
                                        Multiple Choice
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('create-question', ['quiz_id' => $quiz->id,'questiontype_id' => 2]) }}"
                                        class="btn btn-light w-100">
                                        Multiple Response
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('create-question', ['quiz_id' => $quiz->id,'questiontype_id' => 3]) }}"
                                        class="btn btn-light w-100">
                                        True or False
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('create-question', ['quiz_id' => $quiz->id,'questiontype_id' => 4]) }}"
                                        class="btn btn-light w-100">
                                        Short Text
                                    </a>
                                </li>
                                {{-- <li>
                                    <button class="btn btn-light w-100" data-bs-toggle="modal"
                                        data-bs-target="#multipleChoice">
                                        Multiple Choice
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-light w-100" data-bs-toggle="modal"
                                        data-bs-target="#multipleResponse">
                                        Multiple Response
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-light w-100" data-bs-toggle="modal"
                                        data-bs-target="#trueFalse">
                                        True or False
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-light w-100" data-bs-toggle="modal"
                                        data-bs-target="#Short Text">
                                        Short Text
                                    </button>
                                </li> --}}

                            </ul>
                        </div>
                    </div>

                    <div class="card-body">

                        @forelse ($quiz->question as $key => $question)

                            @if ($question->questiontype->id == 1)

                                @include('admin.quiz.answers.multipleChoice')

                            @endif

                            @if ($question->questiontype->id == 2)

                                @include('admin.quiz.answers.multipleResponse')

                            @endif

                            @if ($question->questiontype->id == 3)

                                @include('admin.quiz.answers.trueFalse')

                            @endif

                            @if ($question->questiontype->id == 4)

                                @include('admin.quiz.answers.shortText')

                            @endif

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
        el: '#main',
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

            correctAnswers: [false, false, false, false],
            errors: [],
            shareLink: '{{ config('app.url') }}/quiz/{{ $quiz->id }}',
            copyMessage: 'copy'

        },

        methods: {
            addAnswer(key) {
                this.answers.push({
                    content: ''
                }); //Push to answers array
                this.correctAnswers.push(false); //Push to correctAnswers array
            },
            removeAnswer(key) {
                this.correctAnswers.splice(key, 1);
                this.answers.splice(key, 1);
            },

            checkForEmptyAnswers(array) {
                //Function to check if content of array is empty
                const empty_answers = (element) => element.content === '';

                if (array.some(empty_answers)) { //Check if there are any empty answers
                    return true;
                };


            },
            checkIfCorrectAnswerIsSelected(array) {
                //Function to check if content of array is empty
                const true_answers = (element) => element == true;

                if (array.some(true_answers)) { //Check if there are any empty answers
                    return true;
                };

                return false;

            },
            checkForDuplicateAnswers(array) {

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
                console.log(this.correctAnswers);
                if (!this.checkIfCorrectAnswerIsSelected(this.correctAnswers)) {
                    this.errors.push("Please select atleast one correct answer.");
                }


                //if (this.correctAnswers == null) {
                //    this.errors.push("Please select a correct answer.");
                //}


                // Check if there are empty answers
                if (this.checkForEmptyAnswers(this.answers)) {
                    this.errors.push(
                        "Please fill all the answer inputs. Delete empty answers if not required.");
                }

                // Check if there are duplicate answers
                if (this.checkForDuplicateAnswers(this.answers)) {
                    this.errors.push(
                        "You cannot have duplicate answers!");
                }

                //Submit form if there are no errors
                if (!this.errors.length) {
                    return true;
                }

                //Prevent form submission if there are errors
                e.preventDefault();
            },
            copyLink() {
                let linkToCopy = document.querySelector('#shareLink');
                linkToCopy.select();
                try {
                    var successful = document.execCommand('copy');
                    this.copyMessage = 'copied!';
                    setTimeout(() => {
                        this.copyMessage = 'copy';
                    }, 1000);
                } catch (err) {
                    alert('Oops, unable to copy');
                }
            }
        }
    })

</script>

@endsection
