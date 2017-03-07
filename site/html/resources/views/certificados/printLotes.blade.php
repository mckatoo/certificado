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
    @foreach ($certificado as $i => $cert)
        <img class="logotipo" src="{{ $logotipo }}" alt="">
        <img class="fundo" src="{{ $fundo }}" alt="">
        <div class="titulo">Certificado</div>
        <div class="texto-central">
            <p>O {{ $cert->instituto->nome }} confere o presente certificado a</p>
            <p class="destaque">{{ $cert->nome }}</p>
            <p>Por participar</p>
            <p class="destaque descricao">
                @foreach (explode("\n", $cert->titulo) as $t)
                    {{ $t }} <br>
                @endforeach
            </p>
            <p>
                Com carga horária total de {{ $cert->carga_horaria }} 
                @if ($cert->carga_horaria > 1)
                    horas.
                @else
                    hora.
                @endif
            </p>
            <p>Realizado em 
            {{ utf8_encode(ucwords(strftime('%d', strtotime($cert->realizado_em)))) }}
            de 
            {{ utf8_encode(ucwords(strftime('%B', strtotime($cert->realizado_em)))) }}
            de 
            {{ utf8_encode(ucwords(strftime('%Y', strtotime($cert->realizado_em)))) }}.
            </p>
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
        </div>
        @if ($i+1 != count($certificado))
            <div class="page-break"></div>
        @endif
    @endforeach
@endsection

@section('scriptjs')
<script src="{{ mix('js/base.js') }}"></script>
@stop
