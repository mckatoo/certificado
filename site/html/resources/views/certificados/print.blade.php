@extends('layouts.base')

@section('linkcss')
<link rel="stylesheet" href="{{ mix('css/base.css') }}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @stop

        @section('content')
            <div class="certificado">
                <div class="logotipo">
                    <img src="{{ route('instituto.showLogo', $certificado->instituto_id) }}" alt="">
                </div>
                <div class="fundo">
                    <img src="{{ asset('images/fundo.svg') }}" alt="">
                </div>
                <div class="titulo">Certificado</div>
                <div class="texto-central">
                    <p>O {{ $certificado->instituto->nome }} confere o presente certificado a</p>
                    <p class="destaque">{{ $certificado->nome }}</p>
                    <p>Por participar</p>
                    <p class="destaque"><textarea class="descricao" readonly="readonly" rows='{{ count(explode("\n", $certificado->titulo)) }}'>{{$certificado->titulo}}</textarea></p>
                    <p>
                        Com carga horária total de {{ $certificado->carga_horaria }} 
                        @if ($certificado->carga_horaria > 1)
                            horas.
                        @else
                            hora.
                        @endif
                    </p>
                    @php
                        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');
                    @endphp
                    <p>Realizado em {{ strftime('%d de %B de %Y', strtotime($certificado->realizado_em)) }}</p>
                </div>
            </div>
        @endsection

        @section('scriptjs')
        <script src="{{ mix('js/base.js') }}"></script>
        @stop
