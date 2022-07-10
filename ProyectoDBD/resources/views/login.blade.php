<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    @include('partials.nav')
    <script src="" async defer></script>
    @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)

        <li> {{$error}}</li>

        @endforeach
        </ul>
    @endif
    <form action="" method="POST">
        @csrf
        <label>
            <input value="{{ old('emal')}}"  required type="test" placeholder="Correo@ejemplo.com" name="email" id="email">
        </label><br>
        <label>
            <input required type="password" name="password" id="password">
        </label><br>
        <!--<label>
            <input type="checkbox" name="remember">
            Recuerdame
        </label><br> -->
        
        <button type="submit">Iniciar sesión </button>



    </form>
</body>

</html>