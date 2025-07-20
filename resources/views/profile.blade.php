@extends('layouts.app')
@section('content')
<x-header/>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="text-end mb-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Logout
                    </button>
                </form>
            </div>

            <div class="card shadow rounded-4">
                <div class="card-body mb-4">
                    <h4 class="m-4 text-center">My Profile</h4>
                    @php
                        $flower = Auth::user()->flower;
                        $flowerName = strtolower(str_replace(' ', '_', $flower->name));
                        $imagePath = 'images/' . $flowerName . '.png';                   
                    @endphp
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset($imagePath) }}" alt="{{ $flower->name }}"
                            class="rounded-circle border" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" 
                                   placeholder="{{ old('username', Auth::user()->username) }}" >
                            @error('username')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   placeholder="{{ old('email', Auth::user()->email) }}" >
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" 
                                   placeholder="Leave blank to keep current password">
                            @error('password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn" style="background-color: var(--yellow);">Update Profile</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<x-footer/>
@endsection
