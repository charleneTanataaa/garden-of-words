@extends('layouts.app')

@section('content')
<x-header/>

<div class="text-center py-5" style="display:flex; align-items:center; flex-direction:column;">
  <img src="{{ asset('images/logo.png') }}" alt="Garden Logo" class="img-fluid" style="max-width: 600px;">
<h1 style="padding: 15px; font-family:cursive">Welcome to your garden of words</h1>
@if(Auth::check())  
  <div class="d-flex justify-content-center mt-4 gap-5">
    <a class="btn btn-green px-5 py-3 fs-5" href="/create">Create Garden</a>
    <a class="btn btn-green px-5 py-3 fs-5" href="/letters">Visit Garden</a>
  </div>
@else
  <div class="d-flex justify-content-center mt-4 gap-5">
    <a class="btn btn-green px-5 py-3 fs-5" href="/login">Create Garden</a>
    <a class="btn btn-green px-5 py-3 fs-5" href="/login">Visit Garden</a>
  </div>
@endif
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-6 p-4">
      <h2 class="section-title">What are we?</h2>
      <p style="padding: 4px; margin-bottom: 20px;">
        We’re a small project with a big mission: to help people write more and scroll less. Whether it’s journaling, storytelling, or just getting your thoughts out, we’re here to make writing easy, fun, and part of your daily routine.
      </p>
      <p style="padding: 4px;">
        With a sprinkle of sunshine and a garden full of prompts, we’re helping writing habits take root, turning “I should write more” into “I’m blooming with ideas!”
      </p>
    </div>
    <div class="col-md-6 bg-danger-subtle">
    </div>
  </div>
</div>

<div class="d-flex flex-column justify-content-center align-items-center" style="background-image: url('{{ asset('images/background.jpg') }}'); background-size: cover; background-position: center; height: 650px;">
  <h2 class="section-title text-center" style="font-family: cursive">Curious?</h2>
  <a class="btn btn-light mt-3 px-10 py-2 fs-4" style="display:flex; align-items: center; justify-content: center; background-color: #6277AC; color: #FFFFFF; width: 300px; height:70px; text-align:center; outline: none; box-shadow: 7px 6px 4px 0px rgba(60, 55, 55, 0.25); border:none;" href={{ route('letter.all') }}>Visit our community</a>
</div>

<x-footer></x-footer>
@endsection
