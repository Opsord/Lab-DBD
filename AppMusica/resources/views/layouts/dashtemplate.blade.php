<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto Zhiv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>

<body class="bg-gradient">
    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <a href="/">
                    <h4 class="text-light font-weight-bold">ZHIV</h4>
                </a>
            </div>
            <div class="menu">
                <a href="/" class="d-block text-light p-3">
                    <ion-icon class="lead" name="logo-soundcloud"></ion-icon> Inicio
                </a>
                <a href="/songs" class="d-block text-light p-3"><i class="bi bi-music-note-beamed lead"></i>
                    Canciones</a>
                <a href="/users" class="d-block text-light p-3"><i class="bi bi-person-circle lead"></i> Usuarios</a>
                <a href="/genres" class="d-block text-light p-3"><i class="bi bi-music-note lead"></i> Generos</a>
                <a href="/subscriptions" class="d-block text-light p-3"><i class="bi bi-wallet2 lead"></i>
                    Subscripciones</a>
                <div class="btn-group dropup position-absolute bottom-0 p-3 mb-5 ">
                    <button class="btn btn-warning btn-lg" type="button">
                        <i class="bi bi-person-circle"></i>Username
                    </button>
                    <button type="button" class="btn btn-lg btn-warning dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>Cerrar sesion</li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="container-fluid" id="contenido">
            @yield('dashcontent')
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
