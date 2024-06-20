@extends('layouts.master')
@section('title', 'Profile')
@section('content')

    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-image-container">
                                    <form action="{{ route('imgupload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="position-relative d-inline-block">
                                            <input type="file" name="profile_image" id="profileImageUpload"
                                                class="form-control d-none" accept="image/*"
                                                aria-describedby="uploadButton">
                                            <label for="profileImageUpload"
                                                class="input-group-text position-absolute top-0 start-100 translate-middle"
                                                id="uploadButton">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                            <div id="profileImagePreviewContainer" class="rounded-circle overflow-hidden"
                                                style="width: 150px; height: 150px; border: 2px solid #ccc; cursor: pointer;">
                                                @if ($user->image)
                                                    <img id="profileImagePreview" class="img-fluid"
                                                        src="{{ asset('storage/logo/' . $user->image) }}"
                                                        alt="Profile Image">
                                                @else
                                                    <img id="profileImagePreview" class="img-fluid"
                                                        src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                                                        alt="Default Profile Image">
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                                        @if ($errors->has('profile_image'))
                                            <span class="text-danger">
                                                {{ $errors->first('profile_image') }}
                                            </span>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p class="card-text">Name : {{ $user->name }}</p>
                                <p class="card-text">E-mail : {{ $user->email }}</p>
                                <p class="card-text">Contact : {{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
