<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Garden of Words</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
