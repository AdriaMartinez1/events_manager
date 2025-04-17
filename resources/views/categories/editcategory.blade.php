@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Categoria</h2>
        </div>
        <div>
            <a href="{{route('categories.index')}}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <form action="{{route('categories.update',$category)}}" method="POST">
        <div class="row">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Actualitzar categoria:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Categoria" value="{{$category->name}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </div>
        </div>
    </form>
</div>
@endsection