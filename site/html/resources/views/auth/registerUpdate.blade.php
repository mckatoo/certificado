@extends('layouts.admin')

@section('linkcss')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@stop

@section('content')
    <div id="page-wrapper">
        <div class="row">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @foreach ($errors->all() as $error)
                        <strong>Erro</strong> {{ $error }} <br>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Sucesso</strong> {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-blackboard"></i> Usuário
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'usuarios.update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::hidden('id', Auth::user()->id) !!}
                    {!! Form::text('name', Auth::user()->name, [
                    'required' => 'required',
                    'autofocus' => 'autofocus',
                    'class' => 'form-control',
                    'placeholder' => 'NOME COMPLETO',
                    'id' => 'name'
                    ]) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::email('email', Auth::user()->email, [
                        'required' => 'required',
                        'class' => 'form-control',
                        'placeholder' => 'E-MAIL',
                        'id' => "email"
                        ]) !!}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {!! Form::password('password', [
                        'required' => 'required',
                        'class' => 'form-control',
                        'placeholder' => 'SENHA'
                        ]) !!}

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::password('password_confirmation', [
                        'placeholder' => 'CONFIRME A SENHA',
                        'id' => 'password-confirm',
                        'class' => 'form-control',
                        'required' => 'required'
                        ]) !!}
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scriptjs')
    <script src="{{ mix('js/admin.js') }}"></script>
@stop
