@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-black">Gestió d'usuaris</h2>
        </div>
        <div>
            <a href="{{route('users.create')}}" class="btn btn-primary">Crear usuari</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-black">
            <tr class="text-secondary">
                <th>Nom usuari</th>
                <th>Acció</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td class="fw-bold">{{$user->name}}</td>
                <td>
                    <a href="{{route('users.edit',$user)}}" class="btn btn-warning">Editar</a>

                    <form action="{{route('users.destroy', $user)}}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                        <button type="submit"  class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
