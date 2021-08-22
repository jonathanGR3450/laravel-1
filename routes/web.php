<?php

use App\Http\Controllers\app\ProjectController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Role::create([
//     "name" => "mod",
//     "display_name" => "moderator",
//     "description" => 'moderador del sitio',
// ]);

// crear rutas enviandole parametros opcionales
Route::get('saludo/{nombre?}', function ($nombre = 'invitado')
{
    return 'hola ' . $nombre . ' gonorrea';
});

// rutas con nombre, para llamar esta ruta se hace con el metodo route('nombre')
Route::get('contacto', function ()
{
    return 'seccion de contactos';
})->name('contacto');


// retornar rutas con la funcion view de php
// Route::get('/', function ()
// {
//     $nombre = 'jonathan';
//     return view('home')->with(compact('nombre'));
// })->name('home');

// otra forma de retornar vistas es directamente con el metodo view
Route::view('/', 'home', ['nombre' => 'jonathan' ])->name('home');

// Route::get('/', [appController::class, 'index'])->name('home');
// Route::get('/', 'app\appController@index')->name('home');

Route::get('/about', function ()
{
    return view('about');
})->name('about');


Route::resource('project', 'app\ProjectController');

Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'app\MessageController@store')->name("contact.store");



// video 35
// se puede enviar array con las rutas que no van incluidas
Auth::routes(['register' =>true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function ()
// {
//     Route::resource('user', "users\UserController");
// });

Route::resource('user', "users\UserController");

Route::get('roles', function ()
{
    return Role::with('user')->get();
});
