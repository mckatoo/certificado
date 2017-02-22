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
            <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Certificados em Lotes</div>

                <div class="panel-body">
                    Certificados
                </div>
            </div>
        </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('scriptjs')
    <script src="{{ mix('js/admin.js') }}"></script>
@stop
