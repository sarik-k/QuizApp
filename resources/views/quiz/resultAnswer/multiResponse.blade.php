@foreach ($answer->all_answers as $an_ans_key => $an_answer)
    <div class="form-check mb-3">
        <input class="form-check-input " type="checkbox" name="answer[{{ $ans_key }}]"
            id="answer_{{ $ans_key }}_{{ $an_ans_key }}" value="{{ $an_ans_key }}"
            {{ in_array($an_ans_key, $answer->given_answers) ? 'checked' : '' }} disabled>
        <label
            class="form-check-label {{ in_array($an_ans_key, $answer->given_answers) ? (in_array($an_ans_key, $answer->correct_answers) ? 'text-success' : 'text-danger') : '' }}"
            for="answer_{{ $ans_key }}_{{ $an_ans_key }}">
            {{ $an_answer }}
        </label>
    </div>
@endforeach
<hr>
<strong>Correct Answers:</strong>

@foreach ($answer->correct_answers as $correct_answer)
    <h5 class="d-inline">
        <span class="badge badge-light ">{{ $answer->all_answers[$correct_answer] }}</span>
    </h5>

@endforeach
