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
                action="{{ route('store-question-true-false', ['quiz_id' => $quiz->id]) }}">
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
                    <div class="d-flex">
                    <table class="table table-bordered">
                        
                            <tr v-for="(answer,key) in answers" :key="key">
                                <td style="width: 40px">
                                    <input type="radio" v-model="correctAnswer" name="correct_answer" :value="key"
                                        class="form-check-input" :id="key">
                                </td>
                                <td>
                                    <label class="form-check-label" :for="key">
                                        @{{ answer.content }}
                                      </label>
                                </td>
                            </tr>
                        
                    </table>
                </div>

                    

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
