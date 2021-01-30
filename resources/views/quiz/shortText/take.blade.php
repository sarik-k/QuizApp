@extends('quiz/layout')

@section('content')


    <main class="mt-5 mx-auto p-3 w-40">
        <div class="text-right">
            <a href="/#quizzes" class="btn btn-primary">Back to Quiz List</a>
        </div>
        <div class="card title-card rounded-6 mb-3">
            <div class="card-body">
                <div class="card-title">
                    <h1 class="h2">{{ $quiz->name }}</h1>
                </div>
                <p class="card-text">
                    {{ $quiz->description }} <br>
                    <span class="text-muted float-right">- {{ $quiz->user->name }}</span>
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('submit-quiz-short-text') }}"">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <!--Email Address Input Card -->
            <div class=" card rounded-6 mb-3 p-3">
                <div class="card-body w-50">
                    <div class="form-group">
                        <label for="email">Email address<sup class="text-danger">*</sup>:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                            value="{{ old('email') }}" autofocus required>
                        {{-- <small id="emailHelp" class="form-text text-muted">Please
                            enter your email address.</small> --}}
                    </div>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!--Name Input Card -->
            <div class="card rounded-6 mb-3 p-3">
                <div class="card-body w-50">
                    <div class="form-group">
                        <label for="name">Enter your name<sup class="text-danger">*</sup>:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Answer"
                            value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            @foreach ($quiz->question as $q_key => $question)

                <div class="card rounded-6 mb-3 p-3">
                    <div class="card-body">
                        <div class="card-title h6">{{ $question->title }} <sup class="text-danger">*</sup> :</div>
                        <div class="form-group pt-1">
                            <input type="text" class="form-control" id="answer_{{ $q_key }}" name="answer[]" placeholder="Your Answer"
                                value="{{ old('answer[]') }}" required>
                        </div>


                    </div>
                </div>

            @endforeach


            <button type="submit" class="btn btn-primary active">Submit and view result</button>

        </form>


    </main>

@endsection
