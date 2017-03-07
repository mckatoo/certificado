            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-certificate"></i> Certificados em Lote
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-certificado-lote'>Novo</a>
                            <div class="modal fade" id="modal-certificado-lote">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Certificados em Lote</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'lotes.salvar', 'method' => 'POST', 'id' => 'frmcertificadolote', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group">
                                                {!! Form::label('descricao', 'Lote', ['class' => 'control-label']) !!}
                                                {!! Form::textarea('descricao', old('descricao'), ['class' => 'form-control', 'required' => 'required', 'maxlenght' => '200', 'resize' => 'false', 'rows' => '3']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary pull-right cancelar']) !!}
                                            {!! Form::close() !!}
                                        </div>
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
                                    <th>Descrição</th>
                                    <th>Qtd</th>
                                    <th>Realizado em</th>
                                    <td class="text-center"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lotes as $l)
                                    <tr>
                                        <td><a data-toggle="modal" href='#modal-edita-lote'>{{ $l->descricao }}</a>
                                        <div class="modal fade" id="modal-edita-lote">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Editar Lote {{ $l->id }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                {!! Form::open(['route' => 'lotes.salvar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                                <div class="form-group col-lg-12">
                                                                    {!! Form::hidden('id', $l->id) !!}
                                                                    {!! Form::label('descricao', 'Lote', ['class' => 'control-label']) !!}
                                                                    {!! Form::textarea('descricao', old('descricao',$l->descricao), ['class' => 'form-control', 'required' => 'required', 'maxlenght' => '200', 'resize' => 'false', 'rows' => '3']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="panel-footer">
                                                                {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                                                {!! Form::submit('Salvar', ['class' => 'btn btn-primary pull-right cancelar']) !!}
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                        <button type="button" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></td>
                                        <td class="text-center">{{ count($l->descricao) }}</td>
                                        <td>{{ $l->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center"><a href="#" class="btn btn-xs btn-danger">Apagar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>