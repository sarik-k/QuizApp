@foreach ($answer->all_answers as $an_ans_key => $an_answer)
    <div class="form-check mb-3">
        <input class="form-check-input " type="radio" name="answer[{{ $ans_key }}]"
            id="answer_{{ $ans_key }}_{{ $an_ans_key }}" value="{{ $an_ans_key }}"
            {{ $an_ans_key == $answer->given_answer ? 'checked' : '' }} disabled>
        <label
            class="form-check-label {{ $an_ans_key == $answer->given_answer ? ($answer->is_correct ? 'text-success' : 'text-danger') : '' }}"
            for="answer_{{ $ans_key }}_{{ $an_ans_key }}">
            {{ $an_answer }}
        </label>
    </div>
@endforeach
<hr>
<strong>Score:</strong> {{ $answer->score }} <br>
<strong>Correct Answer:</strong> <h5 class="d-inline">
    <span class="badge badge-light ">{{ $answer->all_answers[$answer->correct_answer] }}</span>
</h5>
