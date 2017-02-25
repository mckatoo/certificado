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

        <div class="col-lg-6 col-sm-12">
            @include('cadastros.institutos')
        </div>

        <div class="col-lg-6 col-sm-12">
            @include('cadastros.professores')
        </div>

        <div class="col-lg-6 col-sm-12">
            @include('cadastros.cursos', ['some' => 'data'])
        </div>

    </div>
@endsection

@section('scriptjs')
    <script src="{{ mix('js/admin.js') }}"></script>
@stop
