@extends ('layouts.admin')
@section ('contenido')
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de categorias <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<!--@include('catalogo.categoria.search')-->
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
		<table id="example1" class="table table-bordered table-striped">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
					<th>Rubro</th>
					<th>Opciones</th>
				</thead>
               @foreach ($categorias as $obj)
				<tr>
					<td>{{ $obj->Id}}</td>
					<td>{{ $obj->Descripcion}}</td>
					<td>{{ $obj->Rubro}}</td>
					<td>
						<a href="{{URL::action('CategoriaController@edit',$obj->Id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$obj->Id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('catalogo.categoria.modal')
				@endforeach
			</table>
		</div>
		@include('sweet::alert')
	</div>
</div>

@endsection