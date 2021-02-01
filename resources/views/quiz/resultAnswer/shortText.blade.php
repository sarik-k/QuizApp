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


<hr>
<strong>Score:</strong> {{ $answer->score }} <br>
<strong>Correct Answers:</strong>

@foreach ($answer->correct_answers as $correct_answer)
    <h5 class="d-inline">
        <span class="badge badge-light ">{{ $correct_answer }}</span>
    </h5>
@endforeach