@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register</h5>
                        <form action="{{ route('register.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                <span class="text-danger">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                <span class="text-danger">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" minlength="10" value="{{old('phone')}}">
                                <span class="text-danger">
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                <span class="text-danger">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                </span>
                            </div>
                            {{-- <div class="form-group">
                                <label for="password_confirmation">password_confirmation</label>
                                <input type="password_confirmation" class="form-control" id="password_confirmation" name="password_confirmation"><br>
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div> --}}

                            <center>
                                <br>
                                <button type="submit" class="btn btn-primary">Register</button>
                                {{-- <a class="btn btn-primary" href="{{ route('login') }}" role="button">Login</a> --}}
                                <center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
