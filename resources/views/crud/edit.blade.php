@extends('crud.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('crud.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('crud.update',$crud->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombreEscritor" value="{{ $crud->nombreEscritor }}" class="form-control" placeholder="Nombre Escritor">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Obras:</strong>
                    <input type="text" class="form-control"  name="articulosEscritos" value=" {{$crud->articulosEscritos }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Foto:</strong>
                    <input type="file" class="form-control"  name="foto" placeholder="Foto">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
   
    </form>
@endsection