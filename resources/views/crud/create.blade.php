@extends('crud.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </br>
            <h2>Agregar nuevo</h2>
        </div>
    </br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('crud.index') }}"> Atrás</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('crud.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="col-md-3">
            <div class="form-group">
            </br>
                <strong>Nombre del Escritor:</strong>
                <input type="text" name="nombreEscritor" class="form-control" placeholder="Nombre del Escritor">
            </div>
        </div>
    </br>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Obras:</strong>
                <input type="text" class="form-control"  name="articulosEscritos" placeholder="Obras Escritas">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Foto:</strong>
                <input type="file" class="form-control"  name="foto" placeholder="Foto" accept="image/*">
                @error('foto')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>
@endsection