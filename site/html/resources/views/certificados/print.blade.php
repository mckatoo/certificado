@extends('layouts.print')

@section('linkcss')
<link rel="stylesheet" href="css/print.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@stop

@section('content')
    <img class="logotipo" src="{{ $logotipo }}" alt="">
    <img class="fundo" src="{{ $fundo }}" alt="">
    <div class="titulo">Certificado</div>
    <div class="texto-central">
        <p>O {{ $certificado->instituto->nome }} confere o presente certificado a</p>
        <p class="destaque">{{ $certificado->nome }}</p>
        <p>Por participar</p>
        {{-- <p class="destaque"><textarea class="descricao" readonly="readonly" rows='{{ count(explode("\n", $certificado->titulo)) }}'>{{$certificado->titulo}}</textarea></p> --}}
        <p class="destaque descricao">
            @foreach (explode("\n", $certificado->titulo) as $t)
                {{ $t }} <br>
            @endforeach
        </p>
        <p>
            Com carga horária total de {{ $certificado->carga_horaria }} 
            @if ($certificado->carga_horaria > 1)
                horas.
            @else
                hora.
            @endif
        </p>
        <p>Realizado em {{ strftime('%d de %B de %Y', strtotime($certificado->realizado_em)) }}.</p>
    </div>
    <div class="ass-diretor">
        <div class="assinatura"></div>
        <div class="nome-cargo">
            {{ $instituto->diretor()->first()->tratamento }}. {{ $instituto->diretor()->first()->professor }}
            <br>
            Diretor
        </div>
    </div>
    <div class="ass-coordenador">
        <div class="assinatura"></div>
        <div class="nome-cargo">
            {{ $curso->coordenador()->first()->tratamento }}. {{ $curso->coordenador()->first()->professor }}
            <br>
            Coordenador de {{ $curso->curso }}
        </div>
    </div>
@endsection

@section('scriptjs')
<script src="{{ mix('js/base.js') }}"></script>
@stop
