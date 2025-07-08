@extends('layouts.app')

@section('content')
    <h1>All Letters</h1>

    @if($letters->isEmpty())
        <p>No letters found.</p>
    @else
        @foreach ($letters as $letter)
            <div class="letter-card" style="background-color: {{ $letter->color }};">
                <h5 class="letter-title">{{ $letter->title }}</h5>
                <p class="letter-content">{{ $letter->content }}</p>
            </div>
        @endforeach
    @endif

    <style>
        .letter-card {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            color: #000;
            font-family: 'Georgia', serif;
            max-width: 600px;
        }

        .letter-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .letter-content {
            font-size: 1rem;
            line-height: 1.4;
        }
    </style>
@endsection
