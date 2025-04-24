@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Event</h2>
        </div>
        <div>
            <a href="{{route('events.index')}}" class="btn btn-primary">Tornar</a>
        </div>
    </div>

    <form action="{{route('events.update',$event)}}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nom del event:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Event"  value="{{$event->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripcio:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Descripcio..." value="{{$event->description}}"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Data event:</strong>
                    <input type="date" name="date" class="form-control" id="" value="{{$event->date}}">
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
                <button type="submit" class="btn btn-primary">Actualitzar</button>
            </div>
        </div>
    </form>
</div>
@endsection