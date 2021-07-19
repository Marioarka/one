@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div>
                    @if(@Auth::user()->hasRole('Administrador'))
                    <h2>Eres un admin</h2>
                    @endif
                    <a href="/crud">Ir al crud</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
