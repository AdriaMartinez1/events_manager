@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Usuari</h2>
        </div>
        <div>
            <a href="{{route('users.index')}}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <form action="{{route('users.store')}}" method="POST">
        <div class="row">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom usuari:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Usuari" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Correu electronic" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom contrasenya:</strong>
                    <input type="text" name="password" class="form-control" placeholder="Contrasenya" >
                </div>
            </div>

            <div >
                <div class="form-group">
                    <strong>Es administrador?:</strong>
                    <input type="checkbox" name="is_admin" >
                </div>
            </div>
            



<!-- 
            <div >
            <select name="is_admin" class="form-select" id="is_admin">
                    <option value="">-- Escull una opció --</option>
                        <option value=1>Administrador</option>
                        <option value=0>Usuari</option>
                    </select>
                    </div>

 -->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection