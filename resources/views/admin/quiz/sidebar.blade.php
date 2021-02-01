<div class="card min-vh-50">
    <div class="card-body">
        <h4>{{ $quiz->name }}
            <div class="float-right text-muted">

                <div class="table-action">
                    <form method="POST" action="{{ route('destroy-quiz', ['quiz_id' => $quiz->id]) }}"
                        onsubmit="return confirm('Do you really want to delete the quiz?');">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-outline-link p-1" data-bs-toggle="modal" data-bs-target="#editQuiz">
                            <i class="align-middle" data-feather="edit-2"></i>
                        </a>
                        <button class="btn btn-outline-link p-1" type="submit">
                            <i class="align-middle" data-feather="trash"></i>
                        </button>
                    </form>
                </div>

            </div>
        </h4>
        <hr>
        <small>{{ $quiz->description }}</small>
        <hr class="w-25">

        <h4>Share Quiz:</h4>

        @if (count($quiz->question) >= 5)

            @livewire('send-email',['link' => config('app.url').'/quiz/'.$quiz->id ])


            <div class="mb-3"><small>Copy the link below and share directly:</small>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="shareLink" id="shareLink" readonly>
                        <button class="btn btn-secondary" type="button" id="copy-button" @click.stop.prevent="copyLink">
                            @{{ copyMessage }}
                        </button>
                    </div>
                </div>
            </div>
        @else
            <small class="text-danger">Please add at least 5 questions to share this quiz.</small>
        @endif

        <!-- Edit Quiz Modal -->
        <div class="modal fade" id="editQuiz" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="POST" action="{{ route('update-quiz',['quiz_id'=>$quiz->id]) }}">
                        @csrf
                        @method('POST')

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Quiz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="quiz-title-input" class="form-label">Quiz Title</label>
                                <input type="text" class="form-control" id="quiz-title-input" name="title" value="{{ $quiz->name }}" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="quiz-description-input" class="form-label">Description</label>
                                <textarea name="description" id="quiz-title-input" cols="30" rows="5" class="form-control">{{ $quiz->description }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
