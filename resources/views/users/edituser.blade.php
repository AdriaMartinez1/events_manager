@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Usuari</h2>
        </div>
        <div>
            <a href="{{route('users.index')}}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <form action="{{route('users.update',$user)}}" method="POST">
        <div class="row">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom usuari:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Usuari" value="{{$user->name}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Correu electronic" value="{{$user->email}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom contrasenya:</strong>
                    <input type="text" name="password" class="form-control" placeholder="Contrasenya" value="{{$user->password}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Es administrador?:</strong>
                    <input type="boolean" name="is_admin" class="form-control" placeholder="true o false" value="{{$user->is_admin}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </div>
        </div>
    </form>
</div>
@endsection