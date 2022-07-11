<a href="/home">Inicio</a>
@auth
    <a href="/dashboard">Dashboard</a>
    <a href="/dashboard">Actualizar nombre de usuario</a>
    <a href="/createSong">Subir canción</a>
    <form style= "display: inline" action= "/logout" method="POST"> 
    @csrf
        <a style="cursor:pointer;"
            onclick="this.closest('form').submit()"
            >Logout</a>
        </form>
        

@else
    <a href="/login">Login</a>
    <a href="/register">Register</a>
@endauth