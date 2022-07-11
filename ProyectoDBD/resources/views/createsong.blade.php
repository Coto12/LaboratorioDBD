<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Registrar canción</title>
</head>

<body>
    <!-- Incluir Navbar-->
    @include('partials.nav')
    <!-- FORMULARIO DE REGISTRAR CANCION -->
    <div class=container.fluid style="background: black;">
        <div clas="row" style="padding: 50px;"></div>
    </div>
    <div class="container.fluid">
        <div class="row">
            <div class="col" style="background:black ;"></div>
            <div class="col" style="padding: 30px;">
                <form class="login" method="POST" action="/song/create">
                    <!-- NOMBRE CANCION-->
                    <div class="mb-3">
                        <label for=song_name class="form-label" >Nombre cancion</label>
                        <input class="form-control" type="text" name="song_name" id="song_name" value="" requiredmaxlength="50">
                    </div>
                    <!-- IMAGEN-->
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Url imagen</label>
                        <input type="text" class="form-control" type="text" name="image" id="image" value="">
                        <div id="emailHelp" class="form-text">.</div>
                    </div>
                    <!-- AGE RESTRICTION-->
                    <div class="mb-3">
                        <label for="age_restriction" class="form-label">¿Restricción de edad?</label>
                        <input type="text" class="form-control" name="age_restriction" id="age_restriction" value="">
                        <div id="age_restriction" class="form-text"></div>
                    </div>
                    <!-- LETRA-->
                    <div class="mb-3">
                        <label for="lyrics">Letra de la canción</label>
                        <textarea id="lyrics" name="lyrics" rows="10" cols="100"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </div>
                </form>
            </div>

            <div class="col" style="background:black ;"></div>
        </div>
    </div>
    <div class=container.fluid style="background: black;">
        <div clas="row" style="padding: 50px;"></div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>


</body>
<style>
/*NAVBAR*/
/*Buscador*/

/*-------------------------------*/
/*PARTE DEL FOOTER (Pie de pagina)*/
.footer-2 {
    padding: 10px 0;
    color: #f0f9ff;
    background-color: #282d32;
}

/*-------------------------------*/
</style>

</html>