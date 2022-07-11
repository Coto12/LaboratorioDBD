<!DOCTYPE html>

<html lang="es">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DASHBOARD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        @include('partials.nav')
        
        <script src="" async defer></script>
        <pre> {{Auth::user()}}</pre>
    
    <div  align="center" class="card mx-auto w-50" style="width: 18rem;">
        <div class="card-header">
          Tú información
        </div>

        <ul class="list-group list-group-flush">
          <!-- NOMBRE -->
          <li class="list-group-item">Nombre: {{Auth::user()->name}}</li>
            <!-- ROL -->
          <li class="list-group-item">Corre: {{Auth::user()->email}}</li>
          <!-- FECHA DE NACIMIENTO -->
          <li class="list-group-item">Fecha de nacimiento: {{Auth::user()->birth_date}}</li>
          <!-- TIPO SUSCRIPCIÓN -->
          <li class="list-group-item">Tipo suscripción</li>
        </ul>
    </div> 

    </body>
</html>