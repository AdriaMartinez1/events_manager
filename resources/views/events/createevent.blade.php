@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Event</h2>
        </div>
        <div>
            <a href="{{route('events.index')}}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <form action="{{route('events.store')}}" method="POST">
    @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom del event:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Event" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripcio:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripcio..."></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Data event:</strong>
                    <input type="date" name="date" class="form-control" id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Categories</strong>
                    <select name="category_id" class="form-select" id="">
                    <option value="">-- Escull categoria --</option>

                    @foreach ($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection