@extends('layouts.plantilla')


	@section('titulo', 'Modificar región')
	@section('h1', 'Modificar región')


	@section('main')

		<div class="alert bd-light p4">
		<form action="/modificarRegion" method="post">
@csrf
			<!-- Para generar un token temporal. Es una directiva blade-->
	@foreach($region as $region)
		
			<input type="hidden" name="regID" value="{{$region->regID}}" class="form-control"> 
			Nombre:
			<br>
			<input type="text" name="regNombre" value="{{$region->regNombre}}" class="form-control">
	@endforeach
			<br>
			<button class="btn btn-warning">Modificar</button>

		</form>
		</div>

	@endsection




