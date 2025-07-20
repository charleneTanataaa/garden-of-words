@extends('layouts.app')

@section('content')
<a href="{{  url()->previous() }}" class="back-link">← Back</a>

<div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #fff6f6;">
    <div class="card p-4 shadow" 
        style="width: 100%; max-width: 500px; border-radius: 15px; max-height: 90vh; overflow-y: auto;">
        
        <h3 class="text-center mb-4">Create Account</h3>

        <form method="POST" action="{{ route('register.setup') }}">
            @csrf
             @if ($errors->has('username'))
                <div style="color: red; font-size: 0.9rem;">
                    {{ $errors->first('username') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required value="{{ old('username') }}">
            </div>

             @if ($errors->has('password'))
                <div style="color: red; font-size: 0.9rem;">
                    {{ $errors->first('password') }}
                </div>
            @endif

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
                <div class="row row-cols-3 g-3">
                    @php
                        $flowers = [
                            ['name' => 'Sunflower', 'image' => 'sunflower.png'],
                            ['name' => 'Rose', 'image' => 'rose.png'],
                            ['name' => 'Tulip', 'image' => 'tulip.png'],
                            ['name' => 'Lily', 'image' => 'lily.png'],
                            ['name' => 'Daisy', 'image' => 'daisy.png'],
                            ['name' => 'Lavender', 'image' => 'lavender.png'],
                            ['name' => 'Orchid', 'image' => 'orchid.png'],
                            ['name' => 'Blue Bell', 'image' => 'bluebell.png'],
                            ['name' => 'Canna Lily', 'image' => 'canna_lily.png'],
                        ];
                    @endphp

                    @foreach ($flowers as $index => $flower)
                        <div class="col text-center">
                            <input type="radio" name="selected_flower_id" id="flower-{{ $index }}" value="{{ $index + 1 }}" class="btn-check" autocomplete="off" required>
                            <label class="flower-label" for="flower-{{ $index }}">
                                <img src="{{ asset('images/' . $flower['image']) }}" alt="{{ $flower['name'] }}" class="img-fluid flower-img">
                                <div class="mt-1">{{ $flower['name'] }}</div>
                            </label>
                        </div>
                    @endforeach


                </div>
                @error('selected_flower_id')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" style="background-color: #F8F3BA" class="btn w-100">Sign Up</button>
        </form>
    </div>
</div>

<style>
    .flower-img {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }

    .flower-label {
        display: inline-block;
        padding: 10px;
        border: 2px solid transparent;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-check:checked + .flower-label {
        border-color: #d2df6b;
        background-color: #F8F3BA;
    }
</style>
@endsection
