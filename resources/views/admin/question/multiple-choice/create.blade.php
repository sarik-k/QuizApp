@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">Add a Question</h1>

    <div id="root">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Step 2: Add Questions (Multiple Choice)</h5>
                    </div>
                    <hr>
                    <div class="card-body">
                        {{-- <h3 class="mb-3">Quiz Title</h3> --}}
                        <form method="POST" action="">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="question_title" class="form-label h4 mb-3">Question:</label>
                                        <textarea class="form-control" name="question_title" id="question_title" cols="60"
                                            rows="10" v-model="question" autofocus></textarea>
                                    </div>
                                    <div v-for="(answer,key) in answers" :key="key">
                                        @{{ answer.id }} . @{{ answer.content }}
                                    </div>
                                    <hr>
                                    Correct Answer: @{{ correctAnswer }}
                                </div>
                                <div class="col-md-8">

                                    <h4 class="mb-3">Answers:</h4>
                                    <table class="table table-bordered">


                                        <tr v-for="(answer,key) in answers" :key="key">

                                            <td style="width: 40px">
                                                <input type="radio" v-model="correctAnswer" name="correct_answer" :value="answer.id" class="form-check-input">
                                            </td>
                                            <td>                                              
                                                    <div class="input-group input-group-navbar">
                                                        <input type="text" class="form-control" v-model="answer.content"  placeholder="Answer Option">
                                                        <button v-show="key >= 2" class="btn text-danger" type="button" v-on:click="removeAnswer(key)">
                                                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                        </button>
                                                    </div>
                                                
                                            </td>

                                        </tr>
                                    </table>

                                    <button class="btn btn-success" v-on:click.prevent="addAnswer()">Add an answer</button>



                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')

    <script>
        let app = new Vue({
            el: '#root',
            data: {
                question: '',
                answers: [{
                        id: 1,
                        content: ''
                    },
                    {
                        id: 2,
                        content: ''
                    },
                    {
                        id: 3,
                        content: ''
                    },
                    {
                        id: 4,
                        content: ''
                    }

                ],
                last_id: 4,
                correctAnswer: ''

            },
            methods: {
                addAnswer(key){
                    this.last_id++ ;
                    let newAnswer = {id:this.last_id,content:''};
                    this.answers.push(newAnswer);
                },
                removeAnswer(key){
                    this.last_id-- ; 
                    this.answers.splice(key, 1);
                }
            }
        })

    </script>

@endsection
