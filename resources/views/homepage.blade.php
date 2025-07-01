@extends('layouts.app')

@section('content')
<div class="text-center py-5">
  <h1>Welcome to your garden of words</h1>
  <div class="d-flex justify-content-center mt-4 gap-3">
    <a class="btn btn-green px-4" href="#">Create Garden</a>
    <a class="btn btn-green px-4" href="#">Visit Garden</a>
  </div>
</div>

<div class="container my-5">
  <div class="row">
    <div class="col-md-6 p-4">
      <h2 class="section-title">What are we?</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et quam tellus...
      </p>
    </div>
    <div class="col-md-6 bg-danger-subtle">
      <!-- Pink box for illustration -->
    </div>
  </div>
</div>

<div class="text-center py-5">
  <h2 class="section-title">Curious?</h2>
  <a class="btn btn-light mt-3 px-4 py-2" href="#">Visit our community</a>
</div>
@endsection
