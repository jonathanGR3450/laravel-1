<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- se puede enviar como segundo parametro el contenido para mostrar por defecto si no esta definido --}}
    <title>@yield('title', 'test')</title>
    {{-- <link rel="stylesheet" href="css/app.css?id=6f99709f605f271ed6fb"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            {{-- se puede incluir archivos que se encuentren dentro de la carpeta app/resources/views se puede usar el / o el . --}}
            @include('partials.nav')

            @include('partials._show-status')
        </header>
        <main class="py-3">
            <!-- se usa yield para agregar contenido dinamicamente -->
            @yield('content')
        </main>

        <footer class="bg-white text-center text-black-50 py-4 shadow">
            {{ config('app.name') }} | copyright {{ date('Y') }}
        </footer>
    </div>
</body>
</html>