@extends('crud.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crud</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('crud.create') }}"> Agregar</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre Escritor</th>
            <th>Escritos</th>
            <th>Foto</th>
            @if(@Auth::user()->hasRole('Administrador'))
            <th width="280px">Acciones</th>
            @endif
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nombreEscritor }}</td>
            <td>{{ \Str::limit($value->articulosEscritos, 100) }}</td>
            <td>{{ $value->foto }}</td>
            <td>
                @if(@Auth::user()->hasRole('Administrador'))
                <form action="{{ route('crud.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('crud.show',$value->id) }}">Ver</a>    
                    <a class="btn btn-primary" href="{{ route('crud.edit',$value->id) }}">Editar</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Elimimar</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection