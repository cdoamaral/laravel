@extends('layouts.plantilla')


	@section('titulo', 'Formulario de envio')
	@section('h1', 'Formulario de envio')


	@section('main')

		<div class="alert bd-light p4">
		<form action="/procesa" method="post">
			<!-- Para generar un token temporal. Es una directiva blade-->
			@csrf

			Nombre:
			<br>
			<input type="text" name="nombre" class="form-control">
			<br>
			<button class="btn btn-warning">Enviar</button>

		</form>
		</div>

	@endsection




