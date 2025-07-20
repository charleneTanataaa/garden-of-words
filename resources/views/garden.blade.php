@extends('layouts.app')

@section('content')
<div class="nav-letter">
    <a href="{{ route('homepage') }}" class="btn">← Back To Home</a>
    <h1 style="text-align:center; margin: 10px;">Your Garden</h1>
    <div class="nav-right">
        <a href="{{ route('letter.show') }}" class="btn">My Letter</a>
        <a href="{{ route('letter.create') }}" class="btn">Write New Letter</a>
    </div>

</div>

<div class="garden-content">
    <div class="split-page">
        <div class="left-panel">
            @forelse ($gardens as $garden)
                @php
                    $flower = $garden->flower;
                @endphp

                @if ($flower)
                    @php
                        $flower = $garden->flower;
                        $startDate = \Carbon\Carbon::parse($garden->date_grown);
                        $finishDate = $startDate->copy()->addDays(14);

                        $image = $garden->count . '.png';
                        $flowerName = strtolower(str_replace(' ', '_', $flower->name));
                        $imagePath = 'images/' . $flowerName . '/' . $image;
                    @endphp

                    <div class="card shadow p-3 rounded garden-detail" data-id="{{ $garden->id }}">
                        {{-- <img src="{{ asset('images/sunflower/14.png') }}"> --}}
                        <img src="{{ asset($imagePath) }}"
                            alt="{{ $flower->name }}"
                            class="card-img-top"
                            style="object-fit: contain; height: 600px; width: 100%;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $flower->name }}</h5>
                            <p>Started: {{ $startDate->format('F j, Y') }}</p>
                            <p>Expected Finish: {{ $finishDate->format('F j, Y') }}</p>
                            <p>Progress: {{ $garden->count }}/14 letters</p>
                            @if ($garden->count < 14)
                                <a href="{{ route('letter.create') }}" class="btn">Keep Writing</a>
                            @endif
                        </div>
                    </div>
                @else
                    <p class="text-danger">This garden has no flower assigned.</p>
                @endif
            @empty
                <p>You haven't planted any flowers yet. Start writing to grow your garden!</p>
            @endforelse
        </div>

        <div class="right-panel">
            <h2>Your Flower Shelf</h2>
            <div class="flower-shelf">
                @forelse ($gardens->sortByDesc('created_at') as $garden)
                    @php $flower = $garden->flower; @endphp
                    <div class="shelf-item">
                        <img src="{{ asset('images/' . ($garden->count == 14 ? $flower->image : 'leaves.png')) }}"
                             alt="{{ $flower->name }}"
                             class="shelf-flower"
                             data-id="{{ $garden->id }}">
                    </div>
                @empty
                    <p>No flowers yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<x-footer/>

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
        background: rgb(255, 252, 248);
        padding: 5px;
        border-top: 5px solid #48392A;
        border-bottom: 5px solid #48392A;
    }

    .shelf-item img {
        width: 80px;
        height: auto;
        object-fit: contain;
        cursor: pointer;
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

    .nav-right {
        display: flex;
        gap: 10px;
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const shelfFlowers = document.querySelectorAll('.shelf-flower');
        const flowerDetails = document.querySelectorAll('.garden-detail');

        shelfFlowers.forEach(flower => {
            flower.addEventListener('click', () => {
                const id = flower.dataset.id;
                flowerDetails.forEach(detail => {
                    detail.style.display = detail.dataset.id === id ? 'block' : 'none';
                });
            });
        });

        if (shelfFlowers.length > 0) {
            shelfFlowers[0].click();
        }
    });
</script>
@endsection
