<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/navbar-brand.png') }}" alt=""></a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-users fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if (Auth::user()->tipo->tipo == 'Administrador')
                    <li>
                        <a href="{{ route('register') }}">
                        <div class="inline">
                            Usuários
                        </div>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('usuarios.update') }}">
                    <div class="inline">
                        Perfil
                    </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#" id="logout"><i class="fa fa-sign-out fa-fw"></i>
                    <div class="inline">
                        Sair
                    </div>
                    </a>
                    {!! Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'form-logout']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Principal</a>
                </li>
                <li>
                    <a href="{{ route('certificados.index') }}"><i class="fa fa-certificate fa-fw"></i> Certificados</a>
                </li>

                <li>
                    <a href="{{ route('cadastros.index') }}"><i class="fa fa-database fa-fw"></i> Cadastros</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
