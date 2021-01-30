<!-- Modal -->
<div class="modal fade" id="addQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            {{-------------------------------------------Modal-Header------------------------------------------}}

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Add Question Form Starts --}}
            <form id="add_question_form" v-on:submit="validateForm" method="POST"
                action="{{ route('store-question-short-text', ['quiz_id' => $quiz->id]) }}">
                @csrf
                <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">


                {{-------------------Modal-Body--------------------}}

                <div class="modal-body">


                    {{-- Question Title Field --}}
                    <div class="mb-3">
                        <label for="question_title" class="form-label h4 mb-3">Question:</label>
                        <textarea class="form-control" name="question_title" id="question_title" cols="30" rows="5"
                            v-model="question" autofocus></textarea>
                    </div>

                    {{-- Backend Validation Error Message --}}
                    <div class="mb3">
                        @error('question_title')
                            <div class="alert alert-danger">
                                <div class="alert-message">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                    </div>

                    <hr>

                    {{-- Answer Options --}}
                    <h4 class="mb-3">Answers Options:</h4>
                    <table class="table table-bordered">
                        <tr v-for="(answer,key) in answers" :key="key">
                            <td>
                                <div class="input-group input-group-navbar">
                                    <input type="text" class="form-control" v-model="answer.content"
                                        placeholder="Add an answer" name="answer[]">
                                    <button v-show="key >= 1" class="btn text-danger" type="button"
                                        v-on:click="removeAnswer(key)">
                                        <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor"
                                            stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>

                    {{-- Add Answer Button --}}
                    <button class="btn btn-success mb-3" v-on:click.prevent="addAnswer()">
                        Add an answer
                    </button>

                    {{-- Front-end Validation Error Messages
                    --}}
                    <div class="alert alert-danger mb-3" v-if="errors.length">
                        <div class="alert-message">
                            <ul>
                                <li v-for="error in errors">@{{ error }}</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Backend Validation Error Messages
                    --}}
                    @error('answer.*')
                        <div class="alert alert-danger mb-3">
                            <div class="alert-message">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror

                    @error('correct_answer')
                        <div class="alert alert-danger mb-3">
                            <div class="alert-message">
                                {{ $message }}
                            </div>
                        </div>
                    @enderror



                </div>

                {{---------------------------------Modal-Footer------------------------------------------}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!---Modal Ends -->
