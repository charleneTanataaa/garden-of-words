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
        <div class="split-page">
            <div class="left-panel">
                <div id="flower-detail-container">
                    @include('components.flower-detail', [
                        'garden' => $gardens->first(),
                        'flower' => $gardens->first()?->flower
                    ])
                </div>
            </div>
            {{-- <div class="left-panel">
                @forelse ($gardens as $garden)
                    @php
                        $flower = $garden->flower;
                        $startDate = \Carbon\Carbon::parse($garden->date_grown);
                        $finishDate = $startDate->copy()->addDays(14);
                    @endphp
                    <div class="card shadow p-3 rounded" style="max-width: 300px; margin-bottom: 20px;">
                            <img src="{{ asset('images/' . ($garden->count == 14 ? $flower->image : 'leaves.png')) }}"                              alt="{{ $flower->name }}" 
                             class="card-img-top" 
                             style="object-fit: contain; height: 200px;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $flower->name }}</h5>
                            <p>Started: {{ $startDate->format('F j, Y') }}</p>
                            <p>Finished: {{ $finishDate->format('F j, Y') }}</p>
                            <p>Progress: {{ $garden->count }}/14 letters</p>

                            @if($garden->count < 14)
                                <a class="btn" href="{{ route('letter.create') }}">Complete Garden</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>You haven't grown any flowers yet. Start writing letters!</p>
                @endforelse
            </div> --}}

            <div class="right-panel">
                <h2>Your Flower Shelf</h2>
                <div class="flower-shelf">
                    @forelse ($gardens as $garden)
                        @php $flower = $garden->flower; @endphp
                        <div class="shelf-item">
                            <img src="{{ asset('images/' . ($garden->count == 14 ? $flower->image : 'leaves.png')) }}"                              alt="{{ $flower->name }}" 
                                class="shelf-flower">
                        </div>
                    @empty
                        <p>No flowers on the shelf yet.</p>
                    @endforelse
                </div>
            </div>
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

        .flower-shelf {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(80px, 100px));
            gap: 5px;
            justify-items: center;
            align-items: end;
            background:rgb(255, 252, 248);
            padding: 5px;
            border-top: 5px solid #48392A;
            border-bottom: 5px solid #48392A;
        }

        .shelf-item {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .shelf-item img {
            width: 80px;
            height: auto;
            object-fit: contain;
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

        .garden-content {
            margin-top: 100px;
            padding: 30px;
        }

        .split-page {
            display: flex;
            width: 100%;
            gap: 30px;
        }

        .left-panel {
            width: 60%;
        }

        .right-panel {
            width: 40%;
        }
    </style>
@endsection
