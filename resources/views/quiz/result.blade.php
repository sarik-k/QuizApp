@extends('quiz/layout')

@section('content')

    <main class="mt-5 mx-auto p-3 w-40">
        <div class="card rounded-6 mb-3">
            <img src="https://i.imgur.com/BzCOxlC.jpg" class="card-img-top rounded-6" alt="Result Banner">
        </div>
        <div class="card title-card rounded-6 mb-3">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="h2">{{ $result->quiz->name }}</h1>
                            <h5 class="text-muted">{{ $result->quiz->description }}</h5>
                        </div>
                        <div class="col-md-4">
                            Total Score:  
                            <span class="ml-2 h5">
                                <span class="badge badge-primary">
                                    {{ $result->score }}%
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!--Participant Info Card-->
        <div class=" card rounded-6 mb-3 p-3">
            <div class="card-body w-75">
                <div class="form-group">
                    <label for="email" class="form-label">Your Email address<sup class="text-danger">*</sup>:</label><br>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                        value="{{ $result->email }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Your name<sup class="text-danger">*</sup>:</label><br>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Answer"
                        value="{{ $result->name }}" readonly>
                </div>
            </div>
        </div>


         @foreach (json_decode($result->answers) as $ans_key => $answer)
            <div class="card rounded-6 mb-3 p-3">
                <div class="card-body">
                    <div class="card-title h6 mb-3">
                        {{ $answer->question }} :
                    </div>

                    @if ($answer->question_type == 1)

                    @include('quiz.resultAnswer.multiChoice')
                        
                    @endif

                    @if ($answer->question_type == 2)

                    @include('quiz.resultAnswer.multiResponse')
                        
                    @endif

                    @if ($answer->question_type == 3)
                    
                    @include('quiz.resultAnswer.trueFalse')
                        
                    @endif

                    @if ($answer->question_type == 4)

                    @include('quiz.resultAnswer.shortText')
                        
                    @endif

                </div>
            </div>
        @endforeach 
        
        <div class="text-right">
            <a href="/#quizzes" class="btn btn-primary">Back to Quiz List</a>
        </div>



    </main>
    @endsection