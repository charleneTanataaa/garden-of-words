<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Garden of Words</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    body {
      font-family: 'Georgia', serif;
      background-color: #fef7f3;
    }
    .section-title {
      font-size: 2rem;
      font-style: italic;
    }
    .btn-green {
      background-color: #d2df6b;
      border: none;
    }
    footer {
      background-color: #d28f8f;
      color: white;
      padding: 2rem 0;
    }
  </style>
</head>
<body>

  @yield('content')

  <footer class="text-center mt-5">
    <div class="container d-flex justify-content-around align-items-start">
      <div>
        <img src="/images/logo.png" alt="logo" width="60"/>
      </div>
      <div>
        <strong>Garden of Words</strong><br>
        Write letters and grow your favourite plants!
      </div>
      <div>
        <strong>Links</strong><br>
        <a href="/" class="text-white d-block">Home</a>
        <a href="/pages" class="text-white d-block">Pages</a>
        <a href="/about" class="text-white d-block">About Us</a>
      </div>
    </div>
    <div class="mt-3">
      &copy;2025 Garden of Words. All rights reserved.
    </div>
  </footer>
</body>
</html>
