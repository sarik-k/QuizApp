@extends('layouts/app')

@section('content')
    <!--====== HERO PART START ======-->
    <section id="home" class="hero-area bg_cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 offset-xl-7 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="hero-content">
                        <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">QuizApp</h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">{{ config('app.description', 'No App Description') }}
                        </p>
                        <div class="hero-btns">
                            <a href="#quizzes" class="main-btn wow fadeInUp" data-wow-delay=".6s">Create a Quiz</a>
                            <a href="#quizzes" class="btn btn-secondary rounded-pill p-3 wow fadeInUp ml-3" data-wow-delay=".6s">Take a Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-left">
            <img src="images/hero-img.png" alt="">
            <img src="images/dot-shape.svg" alt="" class="shape">
        </div>
    </section>
    <!--====== HERO PART END ======-->

    <!--====== QUIZZES PART START ======-->
    <section id="quizzes" class="skill-area pt-170">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
                    <div class="section-title text-center">
                        <h2 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Take a Quiz</h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Lorem ipsum dolor sit amet, consetetur sadipscing
                            elitr, sed diam nonumy eirmod tempor invidunt utlabo</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($quizzes as $quiz)

                    @if ($quiz->question->count() > 0)

                        <div class="col-xl-4 col-lg-4 col-md-6">

                            <div class="single-skill wow fadeInUp" data-wow-delay=".2s">
                                <a href="{{ route('take-quiz', ['quiz_id' => $quiz->id]) }}">
                                    <div class="skill-content">
                                        <h4>{{ $quiz->name }}</h4>
                                        <p>{{ $quiz->description }}</p>
                                        
                                    </div>
                                </a>
                            </div>

                        </div>

                    @endif

                @empty
                    <h3>No Quizzes published yet</h3>
                @endforelse


            </div>
        </div>
    </section>
    <!--====== QUIZZES PART ENDS ======-->
@endsection
