<!DOCTYPE html>
<html>

<head>
    <meta charset="UFT-8">
    <title>Doação de Alimentos</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="bg-light py-0 px-0">
    <nav class="navbar navbar-expand-lg navbar-dark shadow" id="nav-principal">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a id="navbar" class="nav-link" href="/geral" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        Área Geral
                    </a>
                </li>

                <li class="nav-item">
                    <a id="navbar" class="nav-link" href="/admin" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        Área Administrativa
                    </a>
                </li>

                @if (session('id'))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Desconectar
                            </a>

                            <form id="logout-form" action="/logout" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </div>
        </div>
    </nav>

    @yield('conteudo')

</body>

</html>
