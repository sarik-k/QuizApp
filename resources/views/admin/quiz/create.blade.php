@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">Create a Quiz</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Step 1: The Basics</h4>
                </div>
                <hr>
                <div class="card-body">
                    <form method="POST" action="{{ route('store-quiz') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                {{-- Quiz Title Input --}}
                                <div class="mb-3">
                                    <label for="quiz_title" class="form-label">Give your Quiz a Title:</label>
                                    <input type="text" class="form-control" id="quiz_title" name="quiz_title" autofocus
                                        required>
                                    @error('quiz_title')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>

                                {{-- Quiz Description Input --}}
                                <div class="mb-3">
                                    <label for="quiz_description" class="form-label">A Brief Description of the
                                        Quiz:</label>
                                    <textarea id="quiz_description" cols="30" rows="5" class="form-control"
                                        name="quiz_description"></textarea>
                                    @error('quiz_description')
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="btn-close" data-dismiss="alert"
                                                aria-label="Close"></button>
                                            <div class="alert-message">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            

                            {{-- Create Quiz Button --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create Quiz</button>
                            </div>
                        </div>





                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


