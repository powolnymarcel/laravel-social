<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> @yield('titre')</title>
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/lib/bootstrap/dist/css/bootstrap.min.css') }}">

    @yield('styles')
</head>
<body>

<section class="container">
    @include('includes.navigation')
    @yield('contenu')

</section>
<script src="{{ URL::to('src/lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::to('src/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('src/js/app.js') }}"></script>


</body>
</html>