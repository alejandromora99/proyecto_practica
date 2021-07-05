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
    Route::get('pdf', 'postulation\PostulationController@PDF_locations')->name('pdf.generate');
});

Route::group(['prefix'=> 'map'], function () {
    Route::get('ver-marcadores', 'map\LocationController@markers')->name('markers.show');
    Route::resource('location', 'map\LocationController');
});

Route::group(['prefix'=> 'admin'], function () {
    Route::get('file/create', 'file\FileController@create')->name('file.create');
    Route::post('file/create/file-upload', 'file\FileController@upload')->name('file.upload');
    Route::get('file/create/dropzone/fetch', 'file\FileController@fetch')->name('dropzone.fetch');
    Route::post('file/create/dropzone/delete', 'file\FileController@delete');
    Route::delete('file/destroy/{file}', 'file\FileController@destroy')->name('file.destroy');
    Route::get('file/index', 'file\FileController@list_files')->name('file.index');
    Route::get('file/download/{file}', 'file\FileController@download_file')->name('file.download');
});


// Route::get('localizations', 'PostulationController@storeAntecedentesResponsable')->name('antecedentesresponsable.store');


