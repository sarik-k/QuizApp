@extends('quiz/layout')

@section('content')

    <main class="mt-5 mx-auto p-3 w-40">
        <div class="card title-card rounded-6 mb-3">
            <div class="card-body">
                <div class="card-title">
                    <h1 class="h2">Score - {{ $result->correct_answers }}/{{ $result->total_questions }} !</h1>
                </div>
                <p class="card-text">
                    {{ $result->quiz->name }}
                </p>
            </div>
        </div>

        <!--Submitted Email Address Card-->
        <div class=" card rounded-6 mb-3 p-3">
            <div class="card-body w-50">
                <div class="form-group">
                    <label for="email">Email address<sup class="text-danger">*</sup>:</label><br>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                        value="{{ $result->email }}" readonly>
                    {{-- <small id="emailHelp" class="form-text text-muted">Please
                        enter your email address.</small> --}}
                </div>
            </div>
        </div>

        <!--Submitted Name Card -->
        <div class="card rounded-6 mb-3 p-3">
            <div class="card-body w-50">
                <div class="form-group">
                    <label for="name">Enter your name<sup class="text-danger">*</sup>:</label><br>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Answer"
                        value="{{ $result->name }}" readonly>
                </div>
            </div>
        </div>

        @foreach (json_decode($result->answers) as $ans_key => $answer)
            <div class="card rounded-6 mb-3 p-3">
                <div class="card-body">
                    <div class="card-title h6 mb-3 {{ $answer->is_correct ? 'text-success' : 'text-danger' }}">
                        {{ $answer->question }} :
                    </div>
                    <p class="{{ $answer->is_correct ? 'text-success' : 'text-danger' }}">

                        @if ($answer->is_correct)
                        <span class="material-icons" style="font-size:14px;bottom:-5px">
                            done
                        </span>
                        @else
                        <span class="material-icons" style="font-size:14px;bottom:-5px">
                            close
                        </span>
                        @endif
                        {{ $answer->given_answer }}
                    </p>




                    {{-- @foreach ($answer->all_answers as $an_ans_key => $an_answer)
                        <div class="form-check mb-3">
                            <input class="form-check-input " type="radio" name="answer[{{ $ans_key }}]"
                                id="answer_{{ $ans_key }}_{{ $an_ans_key }}" value="{{ $an_ans_key }}"
                                {{ $an_ans_key == $answer->given_answer ? 'checked' : '' }} disabled>
                            <label
                                class="form-check-label {{ $an_ans_key == $answer->given_answer ? ($answer->is_correct ? 'text-success' : 'text-danger') : '' }}"
                                for="answer_{{ $ans_key }}_{{ $an_ans_key }}">
                                {{ $an_answer }}
                            </label>
                        </div>
                    @endforeach --}}
                    <hr>
                    <strong>Correct Answers:</strong>

                    @foreach ($answer->correct_answers as $correct_answer)
                        <h5 class="d-inline">
                            <span class="badge badge-light ">{{ $correct_answer }}</span>
                        </h5>
                        {{-- {{ $loop->last ? '' : ', ' }} --}}
                    @endforeach


                </div>
            </div>
        @endforeach

        <div class="text-right">
            <a href="/#quizzes" class="btn btn-primary">Back to Quiz List</a>
        </div>



    </main>
@endsection
