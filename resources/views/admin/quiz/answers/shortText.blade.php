<div class="card">
    <div class="card-body">
        @include('admin.quiz.answers.header')
        <hr>
        <div class="row">
            @foreach (json_decode($question->answers) as $k => $answer)
                <div class="col-6">
                    <div class="mb-3 text-success h4">
                        <i class="far fa-fw fa-check-circle"></i> {{ $answer }}
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>