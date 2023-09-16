<?php

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

Route::get('/', function () {
    //return view('welcome');
    //return view('pages.dashboard');
    return redirect()->route('home');
})->name('index');

/*Route::get('nosotros', function () {
    return view('our-hotel');
})->name('our-hotel');

Route::get('cuartos', function () {
    return view('rooms');
})->name('rooms');

Route::get('galeria', function () {
    return view('gallery');
})->name('gallery');

Route::get('contactanos', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('inicio/{nombre}', function ($nombre) {
    dd("Bienveido $nombre");
});

Route::get('acceder', function () {
    return redirect('login');
})->name('acceder');

Route::get('registrar', function () {
    return redirect('register');
})->name('registrar');
*/

//Auth::routes();
Auth::routes([
    'register' => false,
    'password.request' => false,
    'reset' => false // antes era 'password.reset', actualizado por laravel
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    

    Route::resource('cliente', 'ClienteController');
    Route::resource('especialidad', 'EspecialidadController');
    Route::resource('doctor', 'DoctorController');
    Route::resource('seguro', 'SeguroController');
    Route::resource('asignacionSeguro', 'AsignacionClienteSeguroController');
    Route::resource('enfermedad', 'EnfermedadController');
    Route::resource('cita', 'CitaController')->parameters(['cita' => 'cita']);
    Route::get('cita/{cita}/atnder', 'CitaController@atenderCita')->name('cita.atender');
    Route::resource('bitacora', 'BitacoraController');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

