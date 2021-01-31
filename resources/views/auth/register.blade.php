@extends('auth/layout')

@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Sign Up</h1>
                        {{-- <p class="lead">
                            Sign in to your account to continue
                        </p> --}}
                    </div>


                    <div class="card">

                        <div class="card-body">

                            <div class="m-sm-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">

                                        <div class="alert-message">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }} <br>
                                            @endforeach
                                        </div>
                                    </div>

                                @endif
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input class="form-control form-control-lg" type="name" name="name"
                                            placeholder="Enter your name" id="name" required autofocus />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter your email" id="email" required />
                                        <small>Registering from these public domains are prohibited:<br> gmail.com, yahoo.com, hotmail.com, outlook.com, live.com and aol.com</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter your password" id="password" required
                                            autocomplete="new-password" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password_confirmation"
                                            placeholder="Enter your password" id="password_confirmation" required
                                            />
                                    </div>

                                    <a href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection