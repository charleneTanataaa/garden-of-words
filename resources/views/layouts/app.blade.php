<!DOCTYPE html>
<html>
    <head>
        <title>Garden of Words</title>
        <style>
            *{
                padding:0;
                margin:0;
            }
            .home-container{
                width: 100vw;
                height:100vh;
                background-color: pink;
                bottom-margin:10px;
            }

        :root{
            --background-color: #cb9797;
            --font-white: #FFF;
        }
        body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        }
        footer {
        background-color: var(--background-color);
        color: var(--font-white);
        padding: 1rem;
        }

        .footer-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        }

        .footer-left img {
        width: 150px;
        height: auto;
        }

        .footer-middle {
            flex: 1;
        padding:  2rem;
        }

        .footer-middle h2 {
        font-size: 1.2rem;
        }

        .footer-middle p {
        font-size: 0.95rem;
        margin-top: 0.9rem;
        }

        .footer-right {
        min-width: 200px;
        }

        .footer-right h3 {
        font-size: 1.1rem;
        }

        .footer-links {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
        margin-top: 0.5rem;
        }

        .footer-links a {
        color: var(--font-white);
        text-decoration: none;
        font-size: 0.95rem;
        }

        .footer-links a:hover {
        text-decoration: underline;
        }

        .footer-bottom {
        margin-top: 1rem;
        text-align: center;
        font-size: 0.9rem;
        color: var(--font-white);
        }

        @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-middle, .footer-right {
            padding: 1rem 0;
        }

        .footer-right {
            align-items: center;
        }
     }
  </style>
    </head>
    <body>
        <div class='content'>
            @yield('content')
        </div>
    </body>
</html>

