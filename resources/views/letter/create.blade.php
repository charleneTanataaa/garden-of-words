@extends('layouts.app')

@section('content')
<form action="{{ route('logout') }}" method="POST" style="display:inline">
    @csrf
    <button type="submit">Logout</button>
</form>

<div class="letter-wrapper">
<a href="{{ url()->previous() }}" class="back-link">← Back</a>

    <form action="{{ route('letter.store') }}" method="POST" class="letter-form">
        @csrf

        <div class="form-left">
            <h2>Create your letter</h2>
            <input type="text" name="title" id="title" placeholder="Title" required>
            <textarea name="content" id="content" rows="6" placeholder="Type your letter here..." required></textarea>
            <input type="hidden" name="color" id="selected-color-input">
            <button type="submit">Submit Letter</button>
        </div>

        <div class="form-right">
            <div class="color-grid">
                @foreach([
                    '#A4B0F5', '#C4B7CB', '#BBC7CE', '#98E2C6',
                    '#E9FAE3', '#F2E863', '#FF9FB2', '#DBDBDB',
                    '#ABC4AB','#EAF0CE','#B6465F','#F87060'
                ] as $color)
                    <div class="color-swatch" data-color="{{ $color }}" style="background-color: {{ $color }}"></div>
                @endforeach
            </div>
        </div>
    </form>
</div>

<style>
    .letter-wrapper {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .letter-form {
        display: flex;
        gap: 40px;
        justify-content: center;
        flex-wrap: wrap;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .form-left {
        flex: 1;
        min-width: 300px;
    }

    .form-left h2 {
        margin-bottom: 20px;
        font-family: 'Georgia', serif;
    }

    .form-left input,
    .form-left textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .form-left button {
        width: 100%;
        padding: 12px;
        background-color: #fff6b2;
        border: none;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-left button:hover {
        background-color: #ffe664;
    }

    .form-right {
        flex: 0 0 200px;
        display: flex;
        justify-content: center;
    }

    .color-grid {
        display: grid;
        grid-template-columns: repeat(3, 60px);
        gap: 10px;
    }

    .color-swatch {
        width: 60px;
        height: 60px;
        border-radius: 4px;
        cursor: pointer;
        border: 0px;
        transition: transform 0.2s, border-color 0.2s;
    }

    .color-swatch:hover {
        transform: scale(1.05);
        border-color: #808080;
    }

    .color-swatch.selected {
        border: 3px solid #808080;
    }

    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swatches = document.querySelectorAll('.color-swatch');
        const colorInput = document.getElementById('selected-color-input');
        const form = document.querySelector('.letter-form');

        swatches.forEach(swatch => {
            swatch.addEventListener('click', () => {
                swatches.forEach(s => s.classList.remove('selected'));
                swatch.classList.add('selected');
                colorInput.value = swatch.getAttribute('data-color');
            });
        });

        form.addEventListener('submit', function (e) {
            if (!colorInput.value) {
                e.preventDefault();
                alert("Please select a color before submitting.");
            }
        });
    });
</script>
@endsection
