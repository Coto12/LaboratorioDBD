<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href ="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>REGISTER - DEBEDE</title>
  </head>
  <body>
    <!-- Incluir Navbar-->
    @include('partials.nav')
    <!-- FORMULARIO DE REGISTRO -->
    <div class=container.fluid style="background: black;"><div clas="row" style="padding: 50px;"></div></div>
    <div class="container.fluid">
      <div class="row">
        <div class="col" style="background:black ;"></div>

        <div class="col" style="padding: 30px;">
        <form class="login" method="POST" action="/user/create">
            <!-- NOMBRE USUARIO-->
            <div class="mb-3">
              <label>Nombre de usuario</label>
              <input class="form-control" type="text" placeholder="Ingrese nombre de usuario" name="name" id="name" value="" required minlength="5" maxlength="20">
            </div>
            <!-- CORREO-->
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
              <input type="email" class="form-control" type="text" aria-describedby="emailHelp" placeholder="Ingrese correo electronico" name="email" id="email" value="" required maxlength="35">
              <div id="emailHelp" class="form-text">Recuerde su correo para futuro ingreso a la plataforma.</div>
            </div>
            <!-- CONTRASEÑA-->
            <div class="mb-3">
              <label>Contraseña</label>
              <input class="form-control" type="password" aria-describedby="passwordHelpInline" placeholder="Ingrese contraseña" name="password" id="password" value="" required minlength="5" maxlength="20">
              <div id="passwordHelpInline" class="form-text"> Tiene que ser entre 5-20 caracteres de largo.</div>
            </div>
            <!-- FECHA DE NACIMIENTO -->
            <label>Seleccione su fecha de nacimiento</label>
            <input class="form-control" type="date" name="birth_date" id="birth_date">
            <button type="submit" class ="btn btn-primary">Enviar</button>
            </div>

          </form>
        </div>

        <div class="col" style="background:black ;"></div>
      </div>
    </div>
    <div class=container.fluid style="background: black;"><div clas="row" style="padding: 50px;"></div></div>
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    

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