@extends('layouts.app')

@section('content')
<form action="{{ route('logout') }}" method="POST" style="display:inline">
    @csrf
    <button type="submit">Logout</button>
</form>

<div id="letter-container">
    <a href="{{ url()->previous() }}" class="back-link">← Back</a>

    <div id="letter-form">
        <form action="{{ route('letter.store') }}" method="POST">
            @csrf

            <h2>Create your letter</h2>
            <input type="text" name="title" id="title" placeholder="title" required>

            <textarea name="content" id="content" rows="5" placeholder="content" required></textarea>

            <button type="submit">Submit Letter</button>
        </form>
    </div>
</div>
@endsection
