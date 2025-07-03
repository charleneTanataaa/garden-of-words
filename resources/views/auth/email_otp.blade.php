@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #ffe5e5;">
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
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                    value="{{ old('email', session('register.email')) }}" required>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror

            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="otp" class="form-label">OTP Code</label>
                    <input type="text" name="otp" class="form-control">
                </div>
                <div class="col-6 d-flex align-items-end">
                    <button name="send_otp" class="btn btn-warning w-100" type="submit">Send OTP code</button>
                </div>
            </div>

            <button name="verify_otp" class="btn btn-warning w-100" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
