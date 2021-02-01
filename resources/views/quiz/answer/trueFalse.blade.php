@foreach (json_decode($question->answers) as $a_key => $answer)

    <div class="form-check mb-3">
        <input class="form-check-input" type="radio" name="answer[{{ $q_key }}]"
            id="answer_{{ $q_key }}_{{ $a_key }}" value="{{ $a_key }}" required>
        <label class="form-check-label" for="answer_{{ $q_key }}_{{ $a_key }}">
            {{ boolval($answer) ? 'True' : 'False' }}
        </label>
    </div>
    @error('answer[$a_key]')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror

@endforeach
