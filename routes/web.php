<?php

use App\Http\Controllers\app\ProjectController;
use App\Models\Note;
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


// Note::create([
//     "body" => "nota usuario dos",
//     'notable_id' => '2',
//     'notable_type' => 'App\Models\User',
// ]);

// Note::create([
//     "body" => "nota usuario tres",
//     'notable_id' => '3',
//     'notable_type' => 'App\Models\User',
// ]);

// Note::create([
//     "body" => "nota mensaje ocho",
//     'notable_id' => '8',
//     'notable_type' => 'App\Models\Message',
// ]);

// Note::create([
//     "body" => "nota mensaje tres",
//     'notable_id' => '3',
//     'notable_type' => 'App\Models\Message',
// ]);

// Route::get('/', function () {
//     return view('welcome');
// });

// Role::create([
//     "name" => "mod",
//     "display_name" => "moderator",
//     "description" => 'moderador del sitio',
// ]);
// Role::create([
//     "name" => "admin",
//     "display_name" => "administrator",
//     "description" => 'administrador del sitio',
// ]);

// User::create([
//     "name" => "jonathan",
//     "last_name" => "garzon",
//     "email" => "jonatangarzon95@gmail.com",
//     "password" => bcrypt('12345678'),
// ]);

// User::create([
//     "name" => "andres",
//     "last_name" => "garzon",
//     "email" => "cemunidosprueba@gmail.com",
//     "password" => bcrypt('12345678'),
// ]);
// User::create([
//     "name" => "jaime",
//     "last_name" => "garzon",
//     "email" => "jonathan.garzon.ruiz@unillanos.edu.co",
//     "password" => bcrypt('12345678'),
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


Route::resource('message', 'app\MessageController');



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
    return Role::with('users')->get();
});
