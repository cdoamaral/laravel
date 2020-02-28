@extends('layouts.plantilla')

	@section('titulo', 'Listado de destinos')

	@section('h1', 'Listado de destinos')

	@section('main')

		<table class="table table-bordered table-hover table-striped">
			<thead class="thead-warning">
				<tr>
					<th>Destino</th>
					<th>Region</th>
					<th>Precio</th>

				</tr>
			</thead>
			<tbody>
				@foreach($destinos as $destino)
				<tr>
					<td>{{$destino->destNombre}}</td>
					<td>{{$destino->regNombre}}</td>
					<td>${{$destino->destPrecio}}</td>
				</tr>
				@endforeach
			</tbody>

		</table>

	@endsection