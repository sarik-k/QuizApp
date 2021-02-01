@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">All Quizzes</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h5 class="card-title mb-0">Dashboard</h5> --}}
                    <a href="{{ route('create-quiz') }}" class="btn btn-primary float-right"> + Create a Quiz</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            @can('do anything')
                                <th>Created By</th>
                            @endcan
                            <th class="text-center">Actions</th>
                        </tr>

                        @forelse ($quizzes as $quiz)

                            <tr>
                                <td>{{ $quiz->id }}</td>
                                <td>{{ $quiz->name }}</td>
                                <td>{{ $quiz->description }}</td>
                                @can('do anything')
                                    <td>{{ $quiz->user->name }}</td>
                                @endcan
                                <td class="table-action text-center">
                                     <form method="POST" action="{{ route('destroy-quiz', ['quiz_id' => $quiz->id]) }}"
                                        onsubmit="return confirm('Do you really want to delete the quiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('edit-quiz', ['quiz_id' => $quiz->id]) }}">
                                            <i class="align-middle" data-feather="edit-2"></i>
                                        </a>
                                        <button class="btn btn-outline-link p-1" type="submit">
                                            <i class="align-middle" data-feather="trash"></i>
                                        </button>
                                    </form> 
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="100%">No Quizzes to Display</td>
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
