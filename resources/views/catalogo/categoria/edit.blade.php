@extends ('layouts.admin')
@section ('contenido')
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar categoria: {{ $categoria->Descripcion}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($categoria,['method'=>'PATCH','route'=>['categoria.update',$categoria->Id]])!!}
            {{Form::token()}}
      
            <div class="form-group">
            	<label for="Descripcion">Descripción</label>
            	<input type="text" name="Descripcion" class="form-control" value="{{$categoria->Descripcion}}" placeholder="Descripción...">
            </div>

			<div class="form-group">
            <label for="Rubro">Rubro</label>
            <select name="Rubro" class="form-control select2">
                @foreach ($rubros as $obj)
				@if ($obj->Id == $categoria->Rubro)
                    <option value="{{$obj->Id}}" selected>{{$obj->Descripcion}}</option>
                    @else
                    <option value="{{$obj->Id}}">{{$obj->Descripcion}}</option>
                    @endif
                @endforeach
            </select>
        </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{url('catalogo/categoria')}}"><button class="btn btn-danger" type="button">Cancelar</button></a>
            </div>

			{!!Form::close()!!}		
            
		</div>
		@include('sweet::alert')
	</div>
@endsection