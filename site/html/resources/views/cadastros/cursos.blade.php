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
                                        <td class="text-center"><a href="#" class="btn btn-xs btn-primary">Editar</a></td>
                                        <td class="text-center"><a href="{{ route('instituto.apagar') }}" class="btn btn-xs btn-danger">Apagar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>