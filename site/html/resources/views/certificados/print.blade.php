@extends('layouts.base')

@section('linkcss')
<link rel="stylesheet" href="{{ asset('css/base.css') }}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @stop

        @section('content')
        <div class="container">
            <div class="row nao-imprimir">
                <div class="col-lg-12">
                    <h1 class="page-header">Relatório de Professores</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="certificado">
                <!-- /.row -->
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading relatorio-titulo">
                            <h4><b>Professor TESTE</b> <br> <small class="text-muted">Dados Pessoais</small></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td rowspan="4" class="col-xs-2">
                                            </td>
                                            <td class="active col-xs-2"><b>CPF</b></td>
                                            <td class="col-xs-10">65476546547</td>
                                        </tr>
                                        <tr>
                                            <td class="active col-xs-2"><b>Endereço</b></td>
                                            <td class="col-xs-10">LFJSDL F, 15</td>
                                        </tr>
                                        <tr>
                                            <td class="active col-xs-2"><b>E-Mail</b></td>
                                            <td class="col-xs-10">teste@teste.com</td>
                                        </tr>
                                        <tr>
                                            <td class="active col-xs-2"><b>Data de Adminissão</b></td>
                                            <td class="col-xs-10">30/11/0001</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="active col-xs-4"><b>Nome do Pai</b></td>
                                                <td class="col-xs-8">LKJAS DÇLFJSLÇF D</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-4"><b>Nome da Mãe</b></td>
                                                <td class="col-xs-8">KSADFKJSJDLF SDLFJSL</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-4" rowspan="1"><b>Telefones</b></td>
                                                <td class="col-xs-4">
                                                    (19) 3863-5510<br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>CARGA HORÁRIA E EXPERIÊNCIA</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>CARGA HORÁRIA SEMANAL ATUAL TOTAL EM TODOS OS CURSOS (Aula Teórica, Prática, PIM)</b></td>
                                                <td class="col-xs-3">1 HORAS</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>CARGA HORÁRIA DE COORDENAÇÃO</b></td>
                                                <td class="col-xs-3">1 HORAS</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>NRO. ATUAL DE DISCIPLINAS DO DOCENTE</b></td>
                                                <td class="col-xs-3">21</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>TEMPO NO MAGISTÉRIO SUPERIOR COMPROVADO EM ANOS</b></td>
                                                <td class="col-xs-3">2 ANOS</td>
                                            </tr>
                                            <tr>
                                                <td class="active col-xs-9 wrap"><b>TEMPO EXPERIÊNCIA PROFISSIONAL COMPROVADA (EM ANOS - FORA O MAGISTÉRIO)</b></td>
                                                <td class="col-xs-3">3 ANOS</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>TITULAÇÃO</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-lg-9 active wrap">TÍTULO</th>
                                                <th class="col-lg-3">CURSO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-lg-9 active wrap">GRADUAÇÃO</td>
                                                <td class="col-lg-3">CURSO GRAD</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>CURSOS</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>CURSOS QUE MINISTRA AULA ATUALMENTE.</b>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="col-xs-9 active wrap">CURSO</th>
                                                        <th class="col-xs-3">MESES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>CURSOS QUE JÁ MINISTROU AULA.</b>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="col-xs-9 active wrap">CURSO</th>
                                                        <th class="col-xs-3">MESES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-xs-9 active wrap">Administração</td>
                                                        <td class="col-xs-3">4</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>PUBLICAÇÕES</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b>Livro ou Capítulo <br>
                                            Cursos relacionados a esta publicação: </b>
                                            <small class="text-muted">
                                                Arquitetura e Urbanismo - 
                                                Ciência da Computação
                                            </small>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-lg-12">
                                                gdfgdfgsdfgd
                                                sdfgdsfg
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>PRODUÇÕES</h4>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <b>Projeto e/ou Produção Técnica Artística e Cultural <br>
                                                Cursos relacionados a esta produção: </b>
                                                <small class="text-muted">
                                                    Administração
                                                </small>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-lg-12">
                                                    sdfsdfsadfsdf
                                                    asfdf
                                                    sdf
                                                    sad
                                                    fsd
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rodape nao-imprimir text-center">
                        <a href="javascript:window.print()" class="btn btn-primary"><i class="fa fa-print fa-2x"></i>
                            <div class="text-center">
                                <b> IMPRIMIR</b>
                            </div>
                        </a>
                    </div>
                </div>
                @endsection

                @section('scriptjs')
                <script src="{{ mix('js/base.js') }}"></script>
                @stop
