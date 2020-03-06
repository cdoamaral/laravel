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
						<a href="/eliminarRegion/{{$region->regID}}" name="{{$region->regNombre}}" onclick="return laURL(this.href, this.name)" class="btn btn-dark"> Eliminar </a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>


<script>
	
function laURL(h, n){
	function(e){
		let url = h;
		let region = n;
		e.preventDefault();


Swal.fire({
			  title: '¿Esta seguro?',
			  text: "Esta accion no se puede deshacer",
			  icon: 'warning',
			  showCancelButton: true,
			  cancelButtonColor: '#d33',
			  cancelButtonText: 'No eliminar',
			  confirmButtonColor: '#d00',
			  confirmButtonText: 'Si, borralo'
			}).then((result) => {
			  if (!result.value) {
			    window.location = '/adminRegiones';
			    return false;
			  }
			   window.location = url;
			   return true;
			})


	}


}
/*
	let link = document.querySelector('#link{{$region->regID}}');
	


	link.onclick = function(e){
		let url = e.target.href;	
		e.preventDefault();
			Swal.fire({
			  title: '¿Esta seguro?',
			  text: "Esta accion no se puede deshacer",
			  icon: 'warning',
			  showCancelButton: true,
			  cancelButtonColor: '#d33',
			  cancelButtonText: 'No eliminar',
			  confirmButtonColor: '#d00',
			  confirmButtonText: 'Si, borralo'
			}).then((result) => {
			  if (!result.value) {
			    window.location = '/adminRegiones';
			    return false;
			  }
			   window.location = url;
			   return true;
			})


	}

*/

</script>


	@endsection