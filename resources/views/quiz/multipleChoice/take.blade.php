<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} - {{ $quiz->name }}</title>

    <!--Bootstrap 5 CSS-->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <!--Custon Quiz Styles--->
    <style>
        body {
            background: lightgray;
        }

        .rounded-6 {
            border-radius: .8rem !important;
        }

        .title-card {
            border-top: .8rem solid orange;
        }

        .bmd-form-group .bmd-label-static {
            font-size: .85rem;
        }

        .w-40 {
            max-width: 40rem !important;
        }

    </style>

</head>

<body>

    <main class="mt-5 mx-auto p-3 w-40">
        <div class="card title-card rounded-6 mb-3">
            <div class="card-body">
                <div class="card-title">
                    <h1 class="h2">{{ $quiz->name }}</h1>
                </div>
                <p class="card-text">
                    {{ $quiz->description }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('submit-quiz-multiple-choice') }}"">
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
                        <div class="card-title h6 mb-3">{{ $question->title }} <sup class="text-danger">*</sup> :</div>

                        <hr>

                        @foreach (json_decode($question->answers) as $a_key => $answer)

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="answer[{{ $q_key }}]"
                                    id="answer_{{ $q_key }}_{{ $a_key }}" value="{{ $a_key }}" required>
                                <label class="form-check-label" for="answer_{{ $q_key }}_{{ $a_key }}">
                                    {{ $answer }}
                                </label>
                            </div>
                            @error('answer[$a_key]')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        @endforeach


                    </div>
                </div>

            @endforeach


            <button type="submit" class="btn btn-primary active">Submit and view result</button>

        </form>


    </main>

    <!--Bootstrap 5 JS-->
    {{-- <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('body').bootstrapMaterialDesign();
        });

    </script>
</body>

</html>
