@extends('layouts/app')

@section('content')
    <!--====== HERO PART START ======-->
	<section id="home" class="hero-area bg_cover">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 offset-xl-7 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
					<div class="hero-content">
						<h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s">QuizApp</h2>
						<p class="wow fadeInUp" data-wow-delay=".4s">{{ config('app.description','No App Description') }}</p>
						<div class="hero-btns">
							<a href="#courses" class="main-btn wow fadeInUp" data-wow-delay=".6s">Take a Quiz</a>
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
@endsection