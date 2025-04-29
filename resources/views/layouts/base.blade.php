<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Gestio d'events</title>
</head>
<body class="bg-white text-black">
<div class="d-flex justify-content-between w-100 gap-2">
    @if(Auth::user()->is_admin)
        <a href="{{ route('events.index') }}" class="btn btn-primary flex-fill text-center">
            Gestió d'events
        </a>
        <a href="{{ route('categories.index') }}" class="btn btn-primary flex-fill text-center">
            Gestió de categories
        </a>
        <a href="{{ route('users.index') }}" class="btn btn-primary flex-fill text-center">
            Gestió d'usuaris
        </a>
    @else
        <a href="{{ route('events.index') }}" class="btn btn-success flex-fill text-center">
            Inscripció a events
        </a>
    @endif
</div>
<div class="d-flex justify-content-between w-100 gap-2 mt-3">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary flex-fill text-center">
        Dashboard
    </a>

    <form action="{{ route('logout') }}" method="POST" class="flex-fill text-center">
        @csrf
        <button type="submit" class="btn btn-danger w-100">
            Logout
        </button>
    </form>
</div>
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>