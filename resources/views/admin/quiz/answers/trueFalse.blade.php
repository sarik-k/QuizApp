<div class="card">
    <div class="card-body">
        @include('admin.quiz.answers.header')
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