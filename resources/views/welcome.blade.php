<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .description{
                background: black;
                color: white;
                padding: 15px;
                margin: 20px;
                font-family: monospace;
                width: 500px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif --}}

            <div class="content">
                <div class="title m-b-md">
                    Olá.
                </div>
                <div class="description">
                    <p>
                        O teste foi realizado seguindo 2 formas de desenvolvimento.
                    </p>
                    <p>
                        Na primeira, foram realizados os requisitos sem a utilização de AJAX, já na segunda a parte do CRUD dos estados foram implementadas utilizando AJAX.
                    </p>
                    <p>
                        Foram criados também os grupos de tipos de usuarios e permissões. Que somente o administrador tem acesso.
                    </p>
                </div>

                <div class="links">
                    <a href="{{ url('/estados') }}"> Laravel + Blade </a>
                    <a href="{{ url('/home') }}">Laravel + Blade(AJAX Version)</a>

                </div>
            </div>
        </div>
    </body>
</html>
