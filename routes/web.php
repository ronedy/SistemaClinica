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

use Illuminate\Support\Facades\Route;

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

    Route::prefix('autocomplete')->group(function(){
        Route::get('especialidades', 'AutoCompleteController@especialidades')->name('autocomplete.especialidades');
        Route::get('pacientes', 'AutoCompleteController@pacientes')->name('autocomplete.pacientes');
    });

    Route::resource('usuarios', 'UsuarioController')->except(['show']);

    Route::resource('cliente', 'ClienteController');
    Route::resource('especialidad', 'EspecialidadController');
    Route::resource('doctor', 'DoctorController');
    Route::resource('seguro', 'SeguroController');
    Route::resource('asignacionSeguro', 'AsignacionClienteSeguroController');
    Route::resource('enfermedad', 'EnfermedadController');
    Route::resource('cita', 'CitaController')->parameters(['cita' => 'cita']);
    Route::get('cita/{cita}/atender', 'CitaController@atenderCita')->name('cita.atender');
    Route::put('cita/{cita}/guardar-atender', 'CitaController@guardarAtenderCita')->name('cita.guardar-atender');
    Route::resource('bitacora', 'BitacoraController');

    Route::prefix('api/auth')->group(function(){
        Route::get('cliente/{id}/historial-control-parental', 'Api\ClienteController@historialControlParental')->name('api.auth.cliente.historial-control-parental');
    });

    Route::prefix('export/pdf')->group(function(){
        Route::post('cita/ficha', 'DocumentoController@exportPDFCitaFicha')->name('export.pdf.cita.ficha');
        Route::post('cita/receta', 'DocumentoController@exportPDFRecetaCita')->name('export.pdf.cita.receta');
        Route::post('cliente/expediente', 'DocumentoController@exportPDFExpedienteCliente')->name('export.pdf.cliente.expediente');
    });
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

