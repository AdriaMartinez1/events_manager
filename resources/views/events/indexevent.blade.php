@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-black">Gestió de Events</h2>
        </div>
        <div>
        @if($user->is_admin)
            <a href="{{route('events.create')}}" class="btn btn-primary">Crear event</a>
            @endif
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-black">
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
                @if($user->is_admin)
                    <a href="{{route('events.edit', $event)}}" class="btn btn-warning">Editar</a>
                    <form action="{{route('events.destroy', $event)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    @endif
                    @if($user->events->contains($event))
                    <form action="{{ route('unregister.removeRegistry', ['event' => $event, 'user' => $user]) }}" method="post" class="d-inline">
                    @csrf
                        <button type="submit" class="btn btn-danger">Desinscriure's</button>
                    </form>
                    @else
                    <form action="{{ route('register.addRegistry', ['event' => $event, 'user' => $user]) }}" method="post" class="d-inline">
                    @csrf
                        <button type="submit" class="btn btn-success">Inscriure's</button>
                    </form>
                    @endif

                    
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
