<div class="card min-vh-50">
    <div class="card-body">
        <h4>{{ $quiz->name }}</h4>
        <p class="h5 mb-3">
            {{ $quiz->quiztype->name }} -
            <small class="text-muted">
                {{ $quiz->quiztype->description }}
            </small>
        </p>
        <hr>
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

    </div>
</div>
