@extends('admin/layout')

@section('content')

<div class="card">
    <div class="card-body">
        <strong>Username:</strong> {{ auth()->user()->name }} <br>
        <strong>Email:</strong> {{ auth()->user()->email }}<br>
        <strong>Roles:</strong> 
        @foreach (auth()->user()->roles as $role)
           {{ $role -> name}}
        @endforeach
    </div>
</div>

@endsection