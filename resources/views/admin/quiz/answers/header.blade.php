<div class="row">
    <div class="col-md-6">
        <strong>Question {{ $key + 1 }}:</strong> {{ $question->title }}
        <p>
            <strong>{{ $question->questiontype->name }}</strong> -
            <span class="text-muted">{{ $question->questiontype->description }}</span>
        </p>
    </div>
    <div class="col-md-6">

        <div class="table-action d-inline text-right">
            <form method="POST" action="{{ route('destroy-question', ['question_id' => $question->id]) }}"
                onsubmit="return confirm('Do you really want to delete the question?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-link p-1" type="submit">
                    <i class="align-middle" data-feather="trash"></i>
                </button>
            </form>
        </div>
    </div>
</div>
