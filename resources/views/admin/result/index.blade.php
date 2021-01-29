@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">All Results</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h5 class="card-title mb-0">Dashboard</h5>
                    --}}
                    
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Taken at</th>
                            <th>Quiz</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Score</th>
                            <th>Actions</th>
                        </tr>

                        @forelse ($results as $result)

                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->quiz->name }}</td>
                                <td>{{ $result->email }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->score }}%</td>
                                <td>
                                    <a href="{{ route('show-multiple-choice-result', ['result_id' => $result->id]) }}" target="_blank">View Full Result</a>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5">No Results to Display</td>
                            </tr>

                        @endforelse

                    </table>

                </div>
            </div>
            <!-- Pagination -->
            <div class="clearfix float-right">
                {{ $results->links() }}
            </div>
        </div>
    </div>


@endsection
