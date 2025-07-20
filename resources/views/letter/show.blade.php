@extends('layouts.app')

@section('content')
    <div class="nav-letter">
        @if(Auth::check())
        <a href="{{ route('homepage') }}" class="btn">← Back</a>
        <h1 style="text-align:center; margin: 10px;">{{ $heading }}</h1>
        <a href="{{ route('letter.create') }}" class="btn">Write New Letter</a>
        @else
            <a href="{{ route('homepage') }}" class="btn">← Back</a>
            <h1 style="text-align:center; margin: 10px;">{{ $heading }}</h1>
            <a style="hidden"></a>
        @endif
    </div>

    <div class="px-5" style="padding-top: 120px;">
        @if (Auth::check())
        <div class="d-flex justify-content-between align-items-center mb-4">
            <form action="{{ route('letter.search') }}" method="GET" class="d-flex" style="flex: 1;">
                <input type="text" name="query" placeholder="Search letters..." class="form-control w-50 me-2" value="{{ request('query') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            @if($heading == "My Letters")
                <a href="{{ route('letter.all') }}" class="btn ms-3">Community Letter</a>
            @else
                <a href="{{ route('letter.show') }}" class="btn ms-3">My Letter</a>
            @endif
            <a href="{{ route('garden') }}" class="btn ms-3">My Garden</a>
        </div>
        @endif
    </div>


    <div class="container mt-2">
        <form action="{{ request()->routeIs('letter.all') ? route('letter.all') : route('letter.show') }}" method="GET">           
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <div class="d-flex align-items-center gap-2">
                    <strong>Filter by:</strong>
                    <input type="date" name="date" value="{{ request('date') }}" class="form-control" style="width: 160px;">
                </div>

                <div class="d-flex align-items-center gap-2">
                    <strong>Sort by:</strong>

                    <select name="sort" class="form-select" style="width: 140px;">
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>ascending</option>
                        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>descending</option>
                    </select>

                    <button type="submit" class="btn px-3 py-2" style="
                        background-color: #F9F7F5;
                        color: black;
                        border: black solid 1px;
                        border-radius: 8px;
                        font-weight: 500;
                        box-shadow: 2px 2px 6px rgba(0,0,0,0.15);
                        transition: all 0.2s ease-in-out;
                    ">
                        Apply
                    </button>
                </div>

            </div>
        </form>
    </div>



    <div id="container_letter">
        @if($letters->isEmpty())
            <p>No letters found.</p>
        @else
            @foreach ($letters as $letter)
                <div class="letter-card" style="background-color: {{ $letter->color }};">
                    <h5 class="letter-title">{{ $letter->title }}</h5>
                    <div class="letter-content">
                        <p>{{ $letter->content }}</p>
                    </div>
                    @if ($letter->user_id === auth()->id())
                        <div class="letter-edit">
                            <a class="btn btn-letter" href="{{ route('letter.edit', $letter->id) }}">Edit</a>
                            <form action="{{ route('letter.destroy', $letter->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-letter" onclick="return confirm('Are you sure you want to delete this letter?');">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>


<style>
    #container_letter {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        padding: 20px;
        padding-top:10px;
        gap: 16px;
        max-width: 1200px;
        margin: 0 auto;
        padding-top: 100px;
    }

    .letter-card {
        display: flex;
        flex-direction: column;
        width: 300px;
        height: 400px;
        border-radius: 8px;
        overflow: hidden;
        padding: 10px;
        font-family: 'Georgia', serif;
    }

    .letter-title {
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
        flex-shrink: 0;
    }

    .letter-content {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        font-size: 1rem;
        line-height: 1.4;
        border-radius: 4px;
    }

    .letter-edit {
        margin-top: 10px;
        flex-shrink: 0;
        display: flex;
        justify-content: space-around;
    }

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
</style>
@endsection
