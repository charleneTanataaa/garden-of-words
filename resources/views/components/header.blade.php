<header>
  <nav class="navbar navbar-expand-lg" style="background-color: #d28f8f; padding: 10px 20px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="/images/main_logo.png" alt="logo" style="width: 60px;">
      </a>
      <button class="navbar-toggler" type="button" id="navbarToggle">
        &#9776;
      </button>
      <div class="justify-content-end navbar-collapse" id="navbarNav" style="z-index: 9999;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/about">About us</a>
          </li>
          <li class="nav-item">
            @if(Auth::check())
              <a class="nav-link text-white" href="/profile/edit">Profile</a>
              {{-- <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn" style="background-color: #F8F3BA;">Logout</button>
              </form> --}}
            @else
              <a class="btn" style="background-color: #F8F3BA;" href="{{ route('register.email.form') }}">Sign Up</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
</header>

<style>
.navbar-toggler {
  display: none;
  font-size: 24px;
  background: none;
  border: none;
  color: white;
}

.nav-link{
  transition: text-decoration 0.9s ease;
}
.nav-link:hover{
  text-decoration:underline;
  text-decoration-color:white;
}

@media (max-width: 100px) {
  .navbar-toggler {
    display: block;
  }

  .navbar-collapse {
    display: none;
    width: 100%;
    background-color: #d28f8f;
    margin-top: 10px;
  }

  .navbar-collapse.show {
    display: block;
  }

  .navbar-nav {
    flex-direction: column;
    gap: 10px;
  }

  .navbar-nav .nav-item {
    text-align: center;
  }
}
</style>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("navbarToggle");
    const nav = document.getElementById("navbarNav");

    toggleBtn.addEventListener("click", function () {
      nav.classList.toggle("show");
    });
  });
</script>
