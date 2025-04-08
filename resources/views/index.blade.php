@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Gestió de Categories</h2>
        </div>
        <div>
            <a href="{{route('categories.create')}}" class="btn btn-primary">Crear categoria</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Categoria</th>
                <th>Acció</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td class="fw-bold">{{$category ->name}}</td>
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
