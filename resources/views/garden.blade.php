@extends('layouts.app')

@section('content')
    <div class="nav-letter">
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('homepage') }}" class="btn">← Back</a>
        </form>
        <h1 style="text-align:center; margin: 10px;">Your Garden</h1>
        <a href="{{ route('letter.create') }}" class="btn">Write New Letter</a>
    </div>

    <div class="garden-content">
            @if ($gardens)
                @foreach ($gardens as $garden)
                    @php
                        $flower=$garden->flower;
                        $startDate = \Carbon\Carbon::parse($garden->date_grown);
                        $finishDate = $startDate->copy()->addDays(14);
                    @endphp
                    <div class="card shadow p-3 rounded" style="max-width: 300px;">
                        <img src="{{ asset('images/' . $flower->image) }}" 
                            alt="{{ $flower->name }}" 
                            class="card-img-top" style="object-fit: contain; height: 200px;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $flower->name }}</h5>
                            <p>Started: {{ \Carbon\Carbon::parse($startDate)->format('F j, Y') }}</p>
                            <p>Finished: {{ \Carbon\Carbon::parse($finishDate)->format('F j, Y') }}</p>
                            <p>Progress: {{ $garden->count }}/14 letters</p>

                            @if($garden->count < 14)
                                <a class="btn" href="/letter/create">Complete Garden</a>
                            @endif
                            
                        </div>
                    </div>
                @endforeach
                    
            @else
                <p>You haven't grown any flowers yet. Start writing letters!</p>
            @endif
        </div>
    </div>

    <style>
        .btn {
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #999;
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 0.9rem;
        color: #000;
        transition: background-color 0.2s;
    }

    .btn:hover {
        background-color: #eee;
    }

    .nav-letter {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        border-bottom: 1px solid black;
        position: fixed;
        top: 0;
        width: 100%;
        background-color: white;
        z-index: 10;
    }

    .garden-content{
        margin-top: 100px;
        padding: 30px;
        display: flex;
        
    }
    </style>
@endsection