@extends('layouts.app')

@section('content')
    <div class="nav-letter">
        <form method="post" action="{{  route('logout') }}">
            @csrf
            <button type="submit" class="btn">Logout</button>
        </form>
        <h1 style="text-align:center; margin: 10px;">All Letters</h1>
        <a href="{{  route('letter.create') }}" class="btn"> Write new letter</a>
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
                    <div class="letter-edit">
                        <a class="btn btn-letter" style="width:100px" href="{{ route('letter.edit', $letter->id) }}">Edit</a>
                        <form action="{{ route('letter.destroy', $letter->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width:100px" class="btn btn-letter" onclick="return confirm('Are you sure you want to delete this letter?');">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <style>
        #container_letter {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            padding: 20px;
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

        .nav-letter{
            display:flex;
            justify-content: space-between;
            align-items:center;
            padding: 0 20px;
            border-bottom: 1px solid black;
            position: fixed;
            top: 0;
            width: 100%;
            background-color:white;
        }
    </style>
@endsection
