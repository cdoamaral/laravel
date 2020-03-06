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
use Illuminate\Http\Request;


Route::get('/listaRegiones', function(){
	$regiones = DB::select('SELECT regID, regNombre FROM regiones');

//	dd($regiones);
				// este es el nombre de mi blade
	return view('listarRegiones', ['regiones'=>$regiones]);

});




Route::get('/listaDestinos', function(){
	$destinos = DB::select('SELECT destNombre, destPrecio, r.regNombre FROM destinos d, regiones r WHERE r.regID = d.regID');

				// este es el nombre de mi blade
	return view('listarDestinos', ['destinos'=>$destinos]);

});

###### QUERY BUILDER ######

Route::get('/adminRegiones', function(){
	$regiones = DB::table('regiones')
						->select('regID', 'regNombre')
						->get();
	// dd($regiones);
				// este es el nombre de mi blade
	return view('adminRegiones', ['regiones'=>$regiones]);

});


// Esta es para ver/mostrar la peticion
Route::view('/agregarRegion', 'formAgregarRegion');

//Esta para procesar el form
//El Request $request: adentro del Closure es el tipo de dato que va a recibir
//Request es un objeto que viene de http
Route::post('/agregarRegion', function(Request $request){
	// $regNombre = $_POST['regNombre'];
	
	//$request->input: Captura todos datos de un formulario que no sea type File
	//para capturar archivos $request->file
	$regNombre = $request->input('regNombre');
	
	DB::table('regiones')
						->insert(['regNombre'=>$regNombre]);

	//redireccion a una peticion, NO a una vista
	return redirect('/adminRegiones')->with('mensaje', 'Region: '.$regNombre.' agregada correctamente');
	//mensaje, es una variable de sesion
});


//Capturo dato que viene desde la peticion - adminRegiones.blade
//Aca solo va con un par de llaves porque en Routing hay otro sistema, que es para capturar un dato obligatorio. El nombre puede ser cualquiera que quiera, solo estamos usando un metodo descriptivo para variables.
Route::get('/modificarRegion/{regID}', function($regID){

	$region = DB::table('regiones')
				->select('regID', 'regNombre')
				->where('regID', $regID)
				->first();
				// dd($region);
	return view ('/formModificarRegion', ['region'=>$region]);


});



Route::post('/modificarRegion', function(Request $request){
	$regNombre = $request->input('regNombre');
	$regID = $request->input('regID');

			DB::table('regiones')
            ->where('regID', $regID)
            ->update(['regNombre' => $regNombre]);



	//return view ('/formModificarRegion', ['region'=>$region]);
	return redirect('/adminRegiones')->with('mensaje', 'Region modificada correctamente');


});





