            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-certificate"></i> Certificados em Lote
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-curso'>Novo</a>
                            <div class="modal fade" id="modal-curso">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Certificados em Lote</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'curso.salvar', 'method' => 'POST', 'id' => 'frmcurso', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group">
                                            {!! Form::label('coordenador', 'Coordenador', ['class' => 'control-label']) !!}
                                            {!! Form::select('coordenador', $professores->pluck('professor','id'), old('coordenador'), ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('curso', 'Curso', ['class' => 'control-label']) !!}
                                            {!! Form::text('curso', old('curso'), ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'data-form-id' => '#frmcurso']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary cancelar']) !!}
                                        </div>
                                            {!! Form::close() !!}
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
                                    <th>Coordenador</th>
                                    <th>Curso</th>
                                    <td colspan="2" class="text-center"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $c)
                                    <tr>
                                        <td>{{ $c->curso }}</td>
                                        <td>{{ $c->coordenador()->first()->tratamento }} {{ $c->coordenador()->first()->professor }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-primary" data-toggle="modal" href='#modalEditaCurso{{ $c->id }}'>Editar</a>
                                            <div class="modal fade" id="modalEditaCurso{{ $c->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Editar Curso {{ $c->curso }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['route' => 'curso.salvar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $c->id) !!}
                                                            <div class="form-group">
                                                            {!! Form::label('coordenador', 'Coordenador', ['class' => 'control-label']) !!}
                                                            {!! Form::select('coordenador', $professores->pluck('professor','id'), $c->coordenador, ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="form-group">
                                                            {!! Form::label('curso', 'Curso', ['class' => 'control-label']) !!}
                                                            {!! Form::text('curso', $c->curso, ['class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default cancelar', 'data-dismiss' => 'modal']) !!}
                                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                                        </div>
                                                            {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modalApagarCurso{{ $c->id }}'>Apagar</a>
                                            <div class="modal fade" id="modalApagarCurso{{ $c->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <br>
                                                            {!! Form::open(['route' => 'curso.apagar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $c->id) !!}
                                                            <div class="alert-danger">
                                                                <div class="panel-body">
                                                                    <h3>Tem certeza que deseja apagar o Curso {{ $c->curso }}?</h3>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                                                {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}
                                                            </div>
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