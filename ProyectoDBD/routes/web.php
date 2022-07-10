<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;



use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolUserController;
use App\Http\Controllers\PermissionRolController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongPlaylistController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CityUserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GenreSongController;


Route::get('/', function () {
    return view('welcome');
});



Route::view('/','welcome');
Route::view('login','login')->name('login')->middleware('guest');
Route::view('dashboard','dashboard');

Route::post('login', function() {
    $credentials = request()->validate([
        'email' =>  'required|email|string',
        'password' => 'required| string'
    ],[
        'email.required' => 'Debes ingresar un correo',
        'email.email' => 'El formato del correo no es correcto',
        'password.required' => 'Debes ingresar una contraseña'

    ]);
    
    //$remember = request()->filled('remember');

    if (Auth::attempt($credentials)){
        request()->session()->regenerate();

        return redirect('dashboard');
    }
    throw ValidationException::withMessages([
        'email' => 'Contraseña e email no coinciden'
    ]);
});








Route::post('logout', function() {
    
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('login');
   
});


Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user/create', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);
//ruta controladores pais
Route::get('/countries', [CountryController::class, 'index']);
Route::get('/country/{id}', [CountryController::class, 'show']);
Route::post('/country/create', [CountryController::class, 'store']);
Route::put('/country/update/{id}', [CountryController::class, 'update']);
Route::delete('/country/delete/{id}', [CountryController::class, 'destroy']);
//ruta controladores role
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/role/{id}', [RoleController::class, 'show']);
Route::post('/role/create', [RoleController::class, 'store']);
Route::put('/role/update/{id}', [RoleController::class, 'update']);
Route::delete('/role/delete/{id}', [RoleController::class, 'destroy']);
//ruta controladores permisos
Route::get('/permissions', [PermissionController::class, 'index']);
Route::get('/permission/{id}', [PermissionController::class, 'show']);
Route::post('/permission/create', [PermissionController::class, 'store']);
Route::put('/permission/update/{id}', [PermissionController::class, 'update']);
Route::delete('/permission/delete/{id}', [PermissionController::class, 'destroy']);
//ruta controladores rol usuario
Route::get('/rolUsers', [RolUserController::class, 'index']);
Route::get('/rolUser/{id}', [RolUserController::class, 'show']);
Route::post('/rolUser/create', [RolUserController::class, 'store']);
Route::put('/rolUser/update/{id}', [RolUserController::class, 'update']);
Route::delete('/rolUser/delete/{id}', [RolUserController::class, 'destroy']);
//ruta controladores Permisos rol
Route::get('/permissionRoles', [PermissionRolController::class, 'index']);
Route::get('/permissionRol/{id}', [PermissionRolController::class, 'show']);
Route::post('/permissionRol/create', [PermissionRolController::class, 'store']);
Route::put('/permissionRol/update/{id}', [PermissionRolController::class, 'update']);
Route::delete('/permissionRol/delete/{id}', [PermissionRolController::class, 'destroy']);
//ruta controladores Metodo de pago
Route::get('/paymentMethods', [PaymentMethodController::class, 'index']);
Route::get('/paymentMethod/{id}', [PaymentMethodController::class, 'show']);
Route::post('/paymentMethod/create', [PaymentMethodController::class, 'store']);
Route::put('/paymentMethod/update/{id}', [PaymentMethodController::class, 'update']);
Route::delete('/paymentMethod/delete/{id}', [PaymentMethodController::class, 'destroy']);
//ruta controladores suscripcion
Route::get('/subscriptions', [SubscriptionController::class, 'index']);
Route::get('/subscription/{id}', [SubscriptionController::class, 'show']);
Route::post('/subscription/create', [SubscriptionController::class, 'store']);
Route::put('/subscription/update/{id}', [SubscriptionController::class, 'update']);
Route::delete('/subscription/delete/{id}', [SubscriptionController::class, 'destroy']);
//ruta controladores follows
Route::get('/follows', [FollowController::class, 'index']);
Route::get('/follow/{id}', [FollowController::class, 'show']);
Route::post('/follow/create', [FollowController::class, 'store']);
Route::put('/follow/update/{id}', [FollowController::class, 'update']);
Route::delete('/follow/delete/{id}', [FollowController::class, 'destroy']);
//ruta controladores boleta
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/ticket/{id}', [TicketController::class, 'show']);
Route::post('/ticket/create', [TicketController::class, 'store']);
Route::put('/ticket/update/{id}', [TicketController::class, 'update']);
Route::delete('/ticket/delete/{id}', [TicketController::class, 'destroy']);
//ruta controladores cancion
Route::get('/songs', [SongController::class, 'index']);
Route::get('/song/{id}', [SongController::class, 'show']);
Route::post('/song/create', [SongController::class, 'store']);
Route::put('/song/update/{id}', [SongController::class, 'update']);
Route::delete('/song/delete/{id}', [SongController::class, 'destroy']);
//ruta controladores interacciones
Route::get('/interactions', [InteractionController::class, 'index']);
Route::get('/interaction/{id}', [InteractionController::class, 'show']);
Route::post('/interaction/create', [InteractionController::class, 'store']);
Route::put('/interaction/update/{id}', [InteractionController::class, 'update']);
Route::delete('/interaction/delete/{id}', [InteractionController::class, 'destroy']);
//ruta controladores playlist
Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlist/{id}', [PlaylistController::class, 'show']);
Route::post('/playlist/create', [PlaylistController::class, 'store']);
Route::put('/playlist/update/{id}', [PlaylistController::class, 'update']);
Route::delete('/playlist/delete/{id}', [PlaylistController::class, 'destroy']);
//ruta controladores songplaylist
Route::get('/songPlaylists', [SongPlaylistController::class, 'index']);
Route::get('/songPlaylist/{id}', [SongPlaylistController::class, 'show']);
Route::post('/songPlaylist/create', [SongPlaylistController::class, 'store']);
Route::put('/songPlaylist/update/{id}', [SongPlaylistController::class, 'update']);
Route::delete('/songPlaylist/delete/{id}', [SongPlaylistController::class, 'destroy']);
//ruta controladores ciudad
Route::get('/cities', [CityController::class, 'index']);
Route::get('/city/{id}', [CityController::class, 'show']);
Route::post('/city/create', [CityController::class, 'store']);
Route::put('/city/update/{id}', [CityController::class, 'update']);
Route::delete('/city/delete/{id}', [CityController::class, 'destroy']);
//ruta controladores ciudad Usuario
Route::get('/cityUsers', [CityUserController::class, 'index']);
Route::get('/cityUser/{id}', [CityUserController::class, 'show']);
Route::post('/cityUser/create', [CityUserController::class, 'store']);
Route::put('/cityUser/update/{id}', [CityUserController::class, 'update']);
Route::delete('/cityUser/delete/{id}', [CityUserController::class, 'destroy']);
//ruta controladores generos
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);
Route::post('/genre/create', [GenreController::class, 'store']);
Route::put('/genre/update/{id}', [GenreController::class, 'update']);
Route::delete('/genre/delete/{id}', [GenreController::class, 'destroy']);
//ruta controladores genero cancion
Route::get('/genreSongs', [GenreSongController::class, 'index']);
Route::get('/genreSong/{id}', [GenreSongController::class, 'show']);
Route::post('/genreSong/create', [GenreSongController::class, 'store']);
Route::put('/genreSong/update/{id}', [GenreSongController::class, 'update']);
Route::delete('/genreSong/delete/{id}', [GenreSongController::class, 'destroy']);