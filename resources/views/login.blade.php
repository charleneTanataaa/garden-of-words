@extends('layouts.app')

@section('content')
<a href="{{  route('homepage') }}" class="back-link">← Back</a>

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #ffd6d6;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px; border-radius: 15px;">
        <div class="mb-3">
            <img src="/images/logo.png" alt="Logo" class="mx-auto d-block" style="max-width: 120px;">
        </div>

        <h3 class="text-center mb-3">Log In</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter your username" value="{{ old('username') }}" required>
            </div>
            @if(session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif


            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn w-100" style="background-color: #F8F3BA">Submit</button>
        </form>
        <div class="mb-2 text-center text-muted small mt-3">
            <p class="fst-italic">Don't have an account yet? 
                <a href="{{ route('register.email.form') }}" class="text-decoration-none text-warning fw-semibold" style="transition: 0.2s ease">
                    sign up here
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
