@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Find Me Center</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    
                    <form action="{{ route('reset.password.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="input-group mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="current-password"
                                placeholder="Password confirmation">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="row">

                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>

                            </div>

                            <!-- /.col -->
                        </div>
                    </form>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
@endsection
