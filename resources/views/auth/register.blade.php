@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #ffd6d6;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 450px; border-radius: 15px;">
        <div class="text-center mb-3 ">
            <img src="/images/logo.png" alt="Logo" style="max-height: 100px;">
        </div>
        <h3 class="text-center mb-3">Sign Up</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('register.email.handle') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label" >Email</label>
                <input type="email" name="email" class="form-control"
                    placeholder="Enter your email" value="{{ old('email', session('register.email')) }}" required>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror

            </div>

            <button class="btn w-100" style="background-color: #F8F3BA" type="submit">Submit</button>

            <div class="text-center mt-2">
                <small>Already have an account? 
                <a href="{{ route('login.form') }}" class="text-decoration-none text-warning fw-semibold" style="transition: 0.2s ease">
                    Login
                </a>
            </small>
            </div>
        </form>
    </div>
</div>
@endsection
