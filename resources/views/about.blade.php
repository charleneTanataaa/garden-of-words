@extends('layouts.app')

@section('content')
    

    <style>
        .how-card {
            background-color: #fffaf2;
            border-radius: 15px;
            transition: all 0.3s ease;
            color:rgb(73, 73, 73);
        }

        .how-card:hover {
            background-color: var(--background-color);
            color: white;
        }

        .how-card:hover h5,
        .how-card:hover p {
            color: white;
        }

        .start-btn{
            background-color: var(--background-color);
            padding:12px 30px;
            border-radius: 15px;
            font-size: 20px;
            margin-top: 30px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px. 0 rgba(0,0,0,0.19); 
        }

        .start-btn:hover{
            background-color: #a55c5c;
            text-decoration:none;
        }
        .full-width-img {
            height: 50vh;
            display: block;
            border-radius: 0;
            object-fit:cover;
            margin: 0;

            padding: 0;
        }

        .start-button-over-image {
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }


        .text-pink{
            color: var(--background-color);
        }
    </style>

    <x-header/>
    
    <div style="padding: 60px 20px;">
        <h1 class="text-center mb-4 fw-bold  text-pink" font-size: 2.5rem;">
            About Us
        </h1>

        <div class="mb-5 text-center" style="max-width: 1200px; margin: 0 auto;">
            <p class="fs-5 text-muted">
                Garden of Words is a letter writing website that lets you write daily letters and grow a chosen flower with each letter you write.
            </p>
            <p class="fs-5 text-muted">
                Our mission is to inspire the habit of writing letters and help you bloom along with your flower.
            </p>
        </div>

        <div class="text-center mb-4">
            <h4 class="fw-semibold text-pink">How It Works</h4>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-center align-items-stretch gap-5 px-4 px-md-5 " style="max-width:1200px; margin:0 auto;">
            <div class="flex-fill text-center p-4 shadow-sm how-card">
                <h5 class="fw-bold">Pick a Flower</h5>
                <p class="mt-2">Choose your favorite flower when signing up. It’ll grow with you on your journey.</p>
            </div>
            <div class="flex-fill text-center p-4 shadow-sm how-card">
                <h5 class="fw-bold">Write a Letter</h5>
                <p class="mt-2">Each day, write a letter. Your thoughts, your day, anything is fine!</p>
            </div>
            <div class="flex-fill text-center p-4 shadow-sm how-card">
                <h5 class="fw-bold">Watch it Grow</h5>
                <p class="mt-2">With each letter, your flower grows until it blooms fully after 7 letters.</p>
            </div>
        </div>

        <div class="position-relative w-100 h-50 mt-5">
            @if(Auth::check())
                <a class="btn text-white start-btn position-absolute start-button-over-image" href="/letter/create">
                Start now
                </a>
                
            @else
                <a class="btn text-white start-btn position-absolute start-button-over-image" href="/login">
                Start now
                </a>
            @endif
            
            <img src="/images/background.jpg" alt="Flower Illustration" class="w-100 full-width-img">
        </div>


    </div>

    <x-footer></x-footer>
@endsection
