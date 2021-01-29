@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">All Quizzes</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h5 class="card-title mb-0">Dashboard</h5>
                    --}}
                    <a href="{{ route('create-quiz') }}" class="btn btn-primary float-right"> + Create a Quiz</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Quiz Type</th>
                            @can('do anything')
                                <th>Created By</th>
                            @endcan
                            <th>Actions</th>
                        </tr>

                        @forelse ($quizzes as $quiz)

                            <tr>
                                <td>{{ $quiz->id }}</td>
                                <td>{{ $quiz->name }}</td>
                                <td>{{ $quiz->description }}</td>
                                <td>{{ $quiz->quiztype->name }}</td>
                                @can('do anything')
                                    <td>{{ $quiz->user->name }}</td>
                                @endcan
                                <td>
                                    <a href="{{ route('edit-quiz', ['quiz_id' => $quiz->id]) }}">Edit</a>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5">No Quizzes to Display</td>
                            </tr>

                        @endforelse

                    </table>

                </div>
            </div>
            <!-- Pagination -->
            <div class="clearfix float-right">
                {{ $quizzes->links() }}
            </div>
        </div>
    </div>


@endsection
