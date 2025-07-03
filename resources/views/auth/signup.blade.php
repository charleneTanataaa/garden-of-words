@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center justify-content-center vh-100" style="background-color: #fff6f6;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 500px; border-radius: 15px;">
        <h3 class="text-center mb-4">Create Account</h3>

        <form method="POST" action="{{ route('register.setup') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Choose Your Flower</label>
                <select name="selected_flower_id" class="form-select" required>
                    <option value="">-- Select Flower --</option>
                    @foreach ($flowers as $flower)
                        <option value="{{ $flower->id }}">{{ $flower->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning w-100">Sign Up</button>
        </form>
    </div>
</div>
@endsection
