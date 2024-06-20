@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Login</h5>
                        @if ($errors->has('invaild'))
                            <span class="text-danger">
                                {{ $errors->first('invaild') }}
                            </span>
                        @endif
                        <form action="{{ route('login.check') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="login_email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="login_password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ old('password') }}">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <div>
                                <a href="{{ route('register') }}" class="link-primary">Don't have account ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
