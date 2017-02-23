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
            @if (session('erro')!==null)
                <div class="alert alert-danger">{{ session('erro') }}</div>
            @endif
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-institution fa-fw"></i> Instituto
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-instituto'>Novo</a>
                            <div class="modal fade" id="modal-instituto">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Instituto</h4>
                                        </div>
                                        <div class="modal-body">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <br>
                                            {!! Form::open(['route' => 'instituto.salvar']) !!}
                                            <div class="form-group">
                                            {!! Form::label('diretor', 'Diretor', ['class' => 'control-label']) !!}
                                            {!! Form::select('diretor', $professores, null, ['placeholder' => 'Selecione ...', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('logotipo', 'Logotipo', ['class' => 'control-label']) !!}
                                            {!! Form::textarea('logotipo', null, ['placeholder' => 'Cole aqui um imagem em base64','class' => 'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                            {!! Form::text('nome', null, ['placeholder' => 'Nome simplificado', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                            {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    Instituto
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-graduation-cap fa-fw"></i> Professor
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-professor'>Novo</a>
                            <div class="modal fade" id="modal-professor">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Professor</h4>
                                        </div>
                                        <div class="modal-body form-inline">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <br>
                                            {!! Form::open(['route' => 'professor.salvar']) !!}
                                            <div class="form-group">
                                            {!! Form::label('tratamento', 'Tratamento', ['class' => 'control-label']) !!}
                                            {!! Form::text('tratamento', null, ['class' => 'form-control','size' => '5','maxlength' => '20']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                            {!! Form::text('nome', null, ['placeholder' => 'Nome completo', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                            {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    Professor
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-blackboard"></i> Curso
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-curso'>Novo</a>
                            <div class="modal fade" id="modal-curso">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Curso</h4>
                                        </div>
                                        <div class="modal-body">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <br>
                                            {!! Form::open(['route' => 'curso.salvar']) !!}
                                            <div class="form-group">
                                            {!! Form::label('diretor', 'Diretor', ['class' => 'control-label']) !!}
                                            {!! Form::select('diretor', $professores, null, ['placeholder' => 'Selecione ...', 'class' => 'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('logotipo', 'Logotipo', ['class' => 'control-label']) !!}
                                            {!! Form::textarea('logotipo', null, ['placeholder' => 'Cole aqui um imagem em base64','class' => 'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                            {!! Form::text('nome', null, ['placeholder' => 'Nome simplificado', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                            {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    Curso
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scriptjs')
    <script src="{{ mix('js/admin.js') }}"></script>
@stop
