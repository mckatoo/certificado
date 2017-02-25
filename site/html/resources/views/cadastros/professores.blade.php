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
                                            {!! Form::open(['route' => 'professor.salvar', 'method' => 'POST', 'id' => 'frmprofessor', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group">
                                            {!! Form::label('tratamento', 'Tratamento', ['class' => 'control-label']) !!}
                                            {!! Form::text('tratamento', old('tratamento'), ['class' => 'form-control','size' => '5','maxlength' => '20', 'required' => 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('professor', 'Nome', ['class' => 'control-label']) !!}
                                            {!! Form::text('professor', old('professor'), ['placeholder' => 'Nome completo', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'data-form-id' => '#frmprofessor']) !!}
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
                                    <th>Tratamento</th>
                                    <th>Nome</th>
                                    <th colspan="2" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professores as $p)
                                    <tr>
                                        <td>{{ $p->tratamento }}</td>
                                        <td>{{ $p->professor }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-primary" data-toggle="modal" href='#editaProfessor{{ $p->id }}'>Editar</a>
                                            <div class="modal fade" id="editaProfessor{{ $p->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Editar Professor {{ $p->professor }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['route' => 'professor.salvar', 'method' => 'POST', 'id' => 'frmEditaProfessor'.$p->id, 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $p->id, []) !!}
                                                            <div class="form-group">
                                                                {!! Form::label('tratamento', 'Tratamento', ['class' => 'control-label']) !!}
                                                                {!! Form::text('tratamento', $p->tratamento, ['class' => 'form-control','size' => '5','maxlength' => '20', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                {!! Form::label('professor', 'Nome', ['class' => 'control-label']) !!}
                                                                {!! Form::text('professor', $p->professor, ['placeholder' => 'Nome completo', 'class' => 'form-control', 'required' => 'required']) !!}
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
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modalApagaProfessor{{ $p->id }}'>Apagar</a>
                                            <div class="modal fade" id="modalApagaProfessor{{ $p->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! Form::open(['route' => 'professor.apagar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $p->id) !!}
                                                            <div class="alert-danger">
                                                                <div class="panel-body">
                                                                    <h3>Tem certeza que deseja apagar {{ $p->tratamento }} {{ $p->professor }}?</h3>
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