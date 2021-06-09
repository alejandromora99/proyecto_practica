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
    return view('welcome');
});

// Route::resource('IngresoDocumento', 'PostulationController');
// // Route::get('IngresoDocumento/geo/{location}', 'PostulationController@probando');
// Route::post('IngresoDocumento/aspectosproyecto', 'PostulationController@storeAspectosProyeecto')->name('aspectosproyecto.store');
// Route::post('IngresoDocumento/antecedentesinstitucion', 'PostulationController@storeAntecedentesInstitucion')->name('antecedentesinstitucion.store');
// Route::post('IngresoDocumento/antecedentesresponsable', 'PostulationController@storeAntecedentesResponsable')->name('antecedentesresponsable.store');
// Route::post('IngresoDocumento/desarrolloproyecto', 'PostulationController@storeDesarrolloProyecto')->name('desarrolloproyecto.store');
// Route::post('IngresoDocumento/location', 'PostulationController@storeLocation')->name('location.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'postulacion'], function () {
    Route::resource('ingresodocumento', 'postulation\PostulationController');
    // Route::get('IngresoDocumento/geo/{location}', 'PostulationController@probando');
    Route::post('ingresodocumento/aspectosproyecto', 'postulation\PostulationController@storeAspectosProyeecto')->name('aspectosproyecto.store');
    Route::post('ingresodocumento/antecedentesinstitucion', 'postulation\PostulationController@storeAntecedentesInstitucion')->name('antecedentesinstitucion.store');
    Route::post('ingresodocumento/antecedentesresponsable', 'postulation\PostulationController@storeAntecedentesResponsable')->name('antecedentesresponsable.store');
    Route::post('ingresodocumento/desarrolloproyecto', 'postulation\PostulationController@storeDesarrolloProyecto')->name('desarrolloproyecto.store');
    Route::post('ingresodocumento/location', 'postulation\PostulationController@storeLocation')->name('location.store');
});

Route::group(['prefix'=> 'map'], function () {
    Route::get('ver-marcadores', 'map\LocationController@markers')->name('markers.show');
});

// Route::get('localizations', 'PostulationController@storeAntecedentesResponsable')->name('antecedentesresponsable.store');


