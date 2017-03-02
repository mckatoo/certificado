<!DOCTYPE html>
<html lang="pt-br">

@include('paginas.head')

<body ng-app="main">

    <div id="wrapper">
        @include('paginas.navbar')
        @yield('content')
    </div>

@yield('scriptjs')
</body>

</html>
