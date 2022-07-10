<a href="/">Inicio</a>
@auth
    <a href="/dashboard">Dashboard</a>
    
    <form style= "display: inline" action= "/logout" method="POST"> </form>
        @csrf
        <a href="/#" 
            onclick="this.closest('form').submit()">
            Logout</a>

@else
    <a href="/login">Login</a>
@endauth