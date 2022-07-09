<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Debede</title>
    <link rel="shortcut icon" href="./favicon32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet">
</head>

<body>
    <header class="container-fluid bg-primary
    d-flex justify-content-center">
        <p class="text-light mb-0 p-2
      fs-">Debede, el servicio de música al alcance de todos!</p>
    </header>
    <!-- Aquí comienza el menú -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Debede</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>
                        <!-- Button trigger modal Inicio sesión -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tú perfil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./profileinfo.html">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Tus canciones</a></li>
                            <li><a class="dropdown-item" href="#">Comprar suscripción</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Iniciar sesión</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- VALIDACIÓN INICIO SESIÓN VALIDACIÓN INICIO SESIÓN VALIDACIÓN INICIO SESIÓN VALIDACIÓN INICIO SESIÓN VALIDACIÓN INICIO SESIÓN -->
                                    <form class="row g-3">
                                        <p></p>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Correo</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="staticEmail"
                                                    value="correo@ejemplo.com">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="inputPassword"
                                                class="col-sm-2 col-form-label">Contraseña</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <h1>Debede</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>






                    <li class="nav-item">
                        <!-- Cambiar link # -->
                        <a class="nav-link" href="#">Búsqueda avanzada</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" size="50"
                        placeholder="Canciones, artistas, entre otros!" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </form>


            </div>
        </div>
    </nav>

    <!-- SLIDE IMAGEN SLIDE IMAGEN SLIDE IMAGEN SLIDE IMAGEN SLIDE IMAGEN SLIDE IMAGEN SLIDE IMAGEN SLIDE IMAGEN  -->

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active" style="height: 600px !important;">
                <img src="./images/slide1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="height: 600px !important;">
                <img src="./images/slide2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" style="height: 600px !important;">
                <img src="./images/slide3.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>



    <section class="w-50 mx-auto text-center pt-5 pb-5">
        <h1 class="p-3 fs-2 border-top border-3 border-bottom border-3">Reproduce ahora mismo en Debede las <span
                class="text-primary">más escuchadas!</span></h1>
        <p class="p-3 fs-4"><span class="text-primary">Debede </span>ofrece de manera gratuita la reproducción de las
            canciones más
            escuchadas del momento :)</p>
    </section>

    <!-- CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES  -->

    <div align="center">
        <p class="fs-5 px-3 pt-3 fw-bold"> Print N°1</p>
        <audio src="./Cris-MJ-Una-Noche-En-Medellin.mp3" controls="controls" type="audio/mpeg" preload="preload">
        </audio>
    </div>

    <div align="center">
        <p class="fs-5 px-3 pt-3 fw-bold"> Print N°2</p>
        <audio src="./Cris-MJ-Una-Noche-En-Medellin.mp3" controls="controls" type="audio/mpeg" preload="preload">
        </audio>
    </div>

    <div align="center">
        <p class="fs-5 px-3 pt-3 fw-bold"> Print N°3</p>
        <audio src="./Cris-MJ-Una-Noche-En-Medellin.mp3" controls="controls" type="audio/mpeg" preload="preload">
        </audio>
    </div>

    <div align="center">
        <p class="fs-5 px-3 pt-3 fw-bold"> Print N°4</p>
        <audio src="./Cris-MJ-Una-Noche-En-Medellin.mp3" controls="controls" type="audio/mpeg" preload="preload">
        </audio>
    </div>

    <div align="center">
        <p class="fs-5 px-3 pt-3 fw-bold"> Print N°5</p>
        <audio src="./Cris-MJ-Una-Noche-En-Medellin.mp3" controls="controls" type="audio/mpeg" preload="preload">
        </audio>
    </div>


    <!-- CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES CANCIONES  -->

    <!-- PIE PIE PIE PIE PIE PIE PIE PIE PIE -->
    <p>&nbsp;</p>
    <p></p>

    <p>&nbsp;</p>
    <p></p>

    <p>&nbsp;</p>
    <p></p>

    <p>&nbsp;</p>
    <p></p>

    <p>&nbsp;</p>
    <p></p>

    <footer class="w-100 d-flex align-items justify-content-center flex-wrap">
        <p class="fs-5 px-3 pt-3 fw-bold text-primary">Debede. Laboratorio Diseño de Base de datos.</p>


    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
    src = "main.js"
    </script>
</body>

</html>