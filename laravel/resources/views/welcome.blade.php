<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edible</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            /* .full-height {
                height: 100vh;
            } */

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: fixed;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .flow {
                width: 500px;
            }

            .arrow {
                position: fixed;
                right: 50px;
                bottom: 40px;
                z-index: 100;
            }

            .posts {
                border-bottom: solid black 2px;
            }

            .icon {
                position: relative;
                z-index: 90;
                top: -20px;
                left: 0px;
            }
        </style>
    </head>
    <body>

        <div class="arrow">
        <a href="#"><img height="30px" src="data:image/png;base64,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" alt="arrow" srcset=""></a>
        </div>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">User Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Edible
                </div>

                <div class="icon">
                <img height="50px" src="https://cdn.discordapp.com/attachments/496700240200597505/585395536866312202/tongue-clipart-8204.png" alt="tongue" srcset="">
                </div> 

                <div class="links">
                    <a href="">About Us</a>
                    <a href="{{ route('eula') }}">EULA</a>
                </div> <br />

                <div>
                    <form action="/search" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                placeholder="Search recipes..."> 
                        </div>
                    </form>
                </div> <br />

                <div class="flow">
                    @foreach ($recipes as $recipe)
                    <div class="posts">
                    <h2> {{ $recipe->title }} </h2>
                    <img src="{{ $recipe->picture }}" height="300px" width="300px;">
                    <p><strong>Category: {{ $recipe->category }} </strong></p>
                    <p> {{ $recipe->content }}</p>
                    <br>
                    <p><strong>Created by: {{ $recipe->createdby }} </strong></p>
                    </div><br />
                    @endforeach
                </div> 

            </div>
        </div>
    </body>
</html>
