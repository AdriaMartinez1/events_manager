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
                <th>Acció</th>
            </tr>
            @foreach ($events as $event)
            <tr>
                <td class="fw-bold">{{$event->name}}</td>
                <td>
                    <a href="" class="btn btn-warning">Editar</a>

                    <form action="" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
