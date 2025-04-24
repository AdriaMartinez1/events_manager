@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Gestió de Events</h2>
        </div>
        <div>
            <a href="{{route('events.create')}}" class="btn btn-primary">Crear event</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Event</th>
                <th>Data</th>
                <th>Descripcio</th>
                <th>Categoria</th>
                <th>Acció</th>
            </tr>
            @foreach ($events as $event)
            <tr>
                <td class="fw-bold">{{$event->name}}</td>
                <td class="fw-bold">{{$event->date}}</td>
                <td class="fw-bold">{{$event->description}}</td>
                <td class="fw-bold">{{$event->category->name}}</td>
                <td>
                    <a href="" class="btn btn-warning">Editar</a>

                    <form action="{{route('events.destroy', $event)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
