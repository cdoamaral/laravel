@extends('layouts.plantilla')

	@section('titulo', 'Panel de administracion de regiones')

	@section('h1', 'Panel de administracion de regiones')

	@section('main')

		@if (session('mensaje'))
	    <div class="alert alert-success">
	        {{ session('mensaje') }}
	    </div>
		@endif

		<table class="table table-bordered table-striped table-hover">
			
			<thead class="thead-dark">
				
				<tr>
					<th> id	</th>
					<th> Region </th>
					<th colspan="2">
						<a href="/agregarRegion" class="btn btn-dark"> Agregar </a>
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($regiones as $region)
				<tr>
					<td> {{$region->regID}} </td>
					<td> {{$region->regNombre}} </td>
					<td>
						<a href="/modificarRegion/{{$region->regID}}" class="btn btn-dark"> Modificar </a>
					</td>
					<td>
						<a href="" class="btn btn-dark"> Eliminar </a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	@endsection