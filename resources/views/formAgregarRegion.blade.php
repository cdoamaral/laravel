@extends('layouts.plantilla')

	@section('titulo', 'Alta de nueva Region')

	@section('h1', 'Alta de nueva Region')

	@section('main')

		<div class="alert bg-light p3">
			
			<form method="post" action="/agregarRegion">
				@csrf
				Nombre region:
				<br>
				<input type="text" name="regNombre" class="form-control" required>
				<br>
				<a href="/adminRegiones" class="btn btn-outline-secondary">Volver</a>
				<button class="btn btn-dark ml-3">Agregar region</button>

			</form>

		</div>

	@endsection