<header>
    <nav class="navbar navbar-expand-lg" style="background-color: var(--background-color); padding: 10px 20px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.png" alt="logo" style="width: 60px;">
            </a>

            {{-- <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                style="border: none;">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <div class="justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/about">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" style="background-color: #F8F3BA;" href={{ route('register.email.form') }}>Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
