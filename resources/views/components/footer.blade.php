<footer class="text-center mt-5">
    <div class="container d-flex justify-content-around align-items-start">
        <div>
        <img src="/images/main_logo.png" alt="logo" style="width:150px;"/>
        </div>
        <div>
        <strong>Garden of Words</strong><br>
        Write letters and grow your favourite plants!
        </div>
        <div>
        <strong>Links</strong><br>
        <a href="/" class="text-white d-block">Home</a>
        <a href="/about" class="text-white d-block">About Us</a>
        @if(Auth::check())
            <a href="{{ route("profile.edit") }}" class="text-white d-block">Profile</a>
        @else
            <a href="{{ route("register.email.form") }}" class="text-white d-block">Sign Up</a>
            @endif
        </div>
    </div>
    <div class="mt-3">
        &copy;2025 Garden of Words. All rights reserved.
    </div>
</footer>