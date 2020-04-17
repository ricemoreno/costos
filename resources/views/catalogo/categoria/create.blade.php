@extends ('layouts.admin')
@section ('contenido')
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo categoria</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'catalogo/categoria','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
        </div>
        <div class="form-group">
            <label for="Rubro">Rubro</label>
            <select name="Rubro" class="form-control select2">
                @foreach ($rubros as $obj)
                <option value="{{$obj->Id}}">{{$obj->Descripcion}}</option>
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