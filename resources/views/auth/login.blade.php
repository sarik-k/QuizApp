@extends('auth/layout')

@section('content')
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Log In</h1>
                        {{-- <p class="lead">
                            Sign in to your account to continue
                        </p> --}}
                    </div>


                    <div class="card">

                        <div class="card-body">

                            <div class="m-sm-4">
                                @if ($errors->any())
                                    <div class="alert alert-danger">

                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                    </div>
                                    
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email"
                                            placeholder="Enter your email" id="email" :value="old('email')" required
                                            autofocus />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Enter your password" id="password" required
                                            autocomplete="current-password" />
                                        <small>
                                            <a href="{{ route('password.request') }}"">Forgot password?</a>
                                                            </small>
                                                        </div>
                                                        <div>
                                                            <label class=" form-check">
                                                <input class="form-check-input" type="checkbox" value="remember-me" checked
                                                    id="remember_me" name="remember">
                                                <span class="form-check-label">
                                                    Remember me next time
                                                </span>
                                                </label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
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
