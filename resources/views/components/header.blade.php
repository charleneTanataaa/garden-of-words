<header>
  <nav class="navbar navbar-expand-lg" style="background-color: #d28f8f; padding: 10px 20px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="/images/main_logo.png" alt="logo" style="width: 60px;">
      </a>


      <div class=" justify-content-end" id="navbarNav" style="z-index: 9999;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/about">About us</a>
          </li>
          <li class="nav-item">
            @if(Auth::check())
              <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn" style="background-color: #F8F3BA;">Logout</button>
              </form>
            @else
              <a class="btn" style="background-color: #F8F3BA;" href="{{ route('register.email.form') }}">Sign Up</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
</header>
