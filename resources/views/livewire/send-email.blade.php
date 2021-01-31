<div>
    <div class="mb-3"><small>Enter an email below and send them an invite:</small>
        <form action="" method="POST" wire:submit.prevent="sendEmail">
            <div class="form-group">
                <div class="input-group">
                    <input wire:model="link" value="$link" type="hidden" name="quiz-link">

                    <input wire:model="email" type="text" class="form-control" id="shareEmail" name="shareEmail"
                        placeholder="hello@email.com">
                    <button type="submit" class="btn btn-secondary" type="button" id="share-button">
                        Invite
                    </button>
                </div>
                @if (session()->has('message'))
                    <span class="text-success mt-3"> {{ session('message') }} </span>
                @endif
                @error('email') <span class="text-danger pt-3">{{ $message }}</span> @enderror
            </div>
        </form>

    </div>
</div>
