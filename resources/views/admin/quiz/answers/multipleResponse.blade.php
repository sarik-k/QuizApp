<div class="card">
    <div class="card-body">
        <strong>Question {{ $key + 1 }}:</strong> {{ $question->title }} <br>
        <hr>
        <div class="row">
            @foreach (json_decode($question->answers) as $k => $answer)
                <div class="col-6">

                    @if (in_array($k, json_decode($question->correct_answer)))

                        <div class="mb-3 text-success h4">
                            <i class="far fa-fw fa-check-circle"></i> {{ $answer }}
                        </div>

                    @else

                        <div class="mb-3 text-danger h4">
                            <i class="far fa-fw fa-times-circle"></i> {{ $answer }}
                        </div>

                    @endif


                </div>
            @endforeach

        </div>

    </div>
</div>