@extends('layouts.plantilla')

	@section('titulo', 'Listado de regiones')

	@section('h1', 'Listado de regiones')

	@section('main')

		<table class="table table-bordered table-hover table-striped">
			<thead class="thead-warning">
				<tr>
					<th>ID</th>
					<th>Region</th>

				</tr>
			</thead>
			<tbody>
				@foreach($regiones as $region)
				<tr>
					<td>{{$region->regID}}</td>
					<td>{{$region->regNombre}}</td>
				</tr>
				@endforeach
			</tbody>

		</table>

	@endsection