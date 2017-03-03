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

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-blackboard"></i> Usuários
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-usuario'>Novo</a>
                            <div class="modal fade" id="modal-usuario">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Novo Usuário</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['url' => '/register', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            {!! Form::text('name', old('name'), [
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
                                                {!! Form::email('email', old('email'), [
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
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                {!! Form::select('tipo', $tipo->pluck('tipo','id'), 0, [
                                                'placeholder' => 'SELECIONE ...',
                                                'required' => 'required',
                                                'class' => 'form-control',
                                                'id' => "tipo"
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
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Criado em</th>
                                    <th>Atualizado em</th>
                                    <th>Apagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->created_at }}</td>
                                        <td>{{ $u->updated_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal-Apagar-{{ $u->id }}'>Apagar</a>
                                            <div class="modal fade" id="modal-Apagar-{{ $u->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="panel panel-danger">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Apagar</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    Tem certeza que deseja apagar o usuário {{ $u->name }}?
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['route' => 'usuarios.apagar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $u->id) !!}
                                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scriptjs')
    <script src="{{ mix('js/admin.js') }}"></script>
@stop
