@extends('admin/layout')

@section('content')

    <div id="main">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="h3 mb-3 d-inline">Quiz Editor </h1>
        
                <a href="{{ route('list-quiz') }}" class="btn btn-outline-secondary float-right">Back to Quiz List</a>
            </div>
            
        </div>
        
        

        <div class="row">
            <div class="col-md-4">
                @include('admin.quiz.sidebar')
            </div>
            <div class="col-md-8 ">
                <div class="card min-vh-50">
                    <div class="card-header">

                        <!-- Add Question Trigger Button -->
                        {{-- <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#selectType">
                            + Add a Question
                        </button> --}}
                        <div class="btn-group float-right" role="group">
                            <button id="add-question-button" type="button"
                                class="btn btn-primary dropdown-toggle float-right" data-bs-toggle="dropdown" >
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
            shareLink: '{{ config('app.url') }}/quiz/{{ $quiz->id }}',
            copyMessage: 'copy'

        },

        methods: {
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
