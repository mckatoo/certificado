<!DOCTYPE html>
<html lang="pt-br">

@include('paginas.head')

<body>
	{{-- @yield('menu') --}}
    <div id="container">
    @yield('content')
    </div>

    @yield('footer')

    @yield('scriptjs')

</body>

</html>
