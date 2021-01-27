@extends('admin/layout')

@section('content')

    <h1 class="h3 mb-3">Blank Page</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Empty card</h5>
                </div>
                <div class="card-body">
                   
                    @can('do anything')
                        I am a superadmin
                    @endcan

                    @can('administer website')
                        I am an admin
                    @endcan

                </div>
            </div>
        </div>
    </div>


@endsection
