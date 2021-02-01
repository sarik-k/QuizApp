<strong>Question {{ $key + 1 }}:</strong> {{ $question->title }}
<p><strong>{{ $question->questiontype->name }}</strong> - <span
        class="text-muted">{{ $question->questiontype->description }}</span></p>
