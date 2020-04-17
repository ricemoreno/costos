@extends ('layouts.admin')
@section ('contenido')
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar rubro: {{ $rubro->Descripcion}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($rubro,['method'=>'PATCH','route'=>['rubro.update',$rubro->Id]])!!}
            {{Form::token()}}
      
            <div class="form-group">
            	<label for="Descripcion">Descripción</label>
            	<input type="text" name="Descripcion" class="form-control" value="{{$rubro->Descripcion}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{url('catalogo/rubro')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
            </div>

			{!!Form::close()!!}		
            
		</div>
		@include('sweet::alert')
	</div>
@endsection