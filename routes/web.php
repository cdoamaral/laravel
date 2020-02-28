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


//Route::get('peticion', 'proceso');

/*Route::get('/hola', function(){
	// Aca va todo el proceso que necesitamos
	return view('saludo');
});

*/

/*

Route::get('/hola', function(){
	$nombre = 'Astrid';
	return view('saludo', [ 'nombre'=> $nombre ]);
});



Route::get('/hola', function(){
	$nombre = 'Astrid';
	$alumnos = ['Marta', 'Bridgitte', 'Jessica', 'Carmela', 'Sheila', 'Wagner'];
	return view('saludo', [ 
							'nombre'=> $nombre, 
							'alumnos'=> $alumnos	
						]);
});

*/


Route::get('/prueba1', function(){
	return view('prueba1');
});


//Cuando NO necesito ninguno proceso, lo pongo asi (peticion/vista):
//Route::view('/prueba1', 'prueba1');


Route::get('/inicio', function(){
	return view('inicio');
});



// Para el formulario
Route::get('/formulario', function(){
	return view('formulario');
});

Route::post('/procesa', function(){

	$nombre = $_POST['nombre'];
	return view('procesa', [ 'nombre'=> $nombre ]);

});




#### RAW SQL #### 
use Illuminate\Support\Facades\DB;

Route::get('/listaRegiones', function(){
	$regiones = DB::select('SELECT regID, regNombre FROM regiones');

//	dd($regiones);
				// este es el nombre de mi blade
	return view('listarRegiones', ['regiones'=>$regiones]);

});

