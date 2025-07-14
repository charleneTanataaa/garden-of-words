@extends('layouts.app')

@section('content')
    <h2>Your Garden</h2>

        @if ($garden)
            <div class="card shadow p-3 rounded" style="max-width: 400px;">
                <img src="{{ asset('images/' . $flower->image) }}" 
                    alt="{{ $flower->name }}" 
                    class="card-img-top" style="object-fit: contain; height: 300px;">

                <div class="card-body">
                    <h5 class="card-title">{{ $flower->name }}</h5>
                    <p>Started: {{ \Carbon\Carbon::parse($startDate)->format('F j, Y') }}</p>
                    <p>Finished: {{ \Carbon\Carbon::parse($finishDate)->format('F j, Y') }}</p>
                    <p>Progress: {{ $garden->count }}/7 letters</p>
                </div>
            </div>
        @else
            <p>You haven't grown any flowers yet. Start writing letters!</p>
        @endif
    </div>
@endsection