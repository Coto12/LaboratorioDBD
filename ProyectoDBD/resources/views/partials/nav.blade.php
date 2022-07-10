<a href="/">Inicio</a>
@auth
    <a href="/dashboard">Dashboard</a>
    
    <form style= "display: inline" action= "/logout" method="POST"> 
    @csrf
        <a style="cursor:pointer;"
            onclick="this.closest('form').submit()"
            >Logout</a>
        </form>
        

@else
    <a href="/login">Login</a>
@endauth