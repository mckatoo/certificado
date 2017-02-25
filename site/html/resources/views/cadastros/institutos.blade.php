            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-institution fa-fw"></i> Instituto
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-instituto'>Novo</a>
                            <div class="modal fade" id="modal-instituto">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Instituto</h4>
                                        </div>
                                        <div class="modal-body">
                                            <br>
                                            {!! Form::open(['route' => 'instituto.salvar', 'method' => 'POST', 'id' => 'frminstituto', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group">
                                            {!! Form::label('diretor', 'Diretor', ['class' => 'control-label']) !!}
                                            {!! Form::select('diretor', $professores->pluck('professor','id'), old('diretor'), ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('logotipo', 'Logotipo', ['class' => 'control-label']) !!}
                                            {!! Form::file('logotipo', old('logotipo'), ['class' => 'form-control', 'required' => 'required', 'accept' => 'image/*', 'data-max-size' =>'100']) !!}
                                            <div id="uploaded-file" class="img-thumbnail hidden"></div>
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                            {!! Form::text('nome', old('nome'), ['placeholder' => 'Nome simplificado', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default cancelar', 'data-dismiss' => 'modal', 'data-form-id' => '#frminstituto']) !!}
                                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
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
                                    <th>Nome</th>
                                    <th>Diretor</th>
                                    <th>Logotipo</th>
                                    <th colspan="2" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institutos as $i)
                                    <tr>
                                        <td>{{ $i->nome }}</td>
                                        <td>{{ $i->diretor()->first()->tratamento }} {{ $i->diretor()->first()->professor }}</td>
                                        <td class="text-center"><a class="btn btn-xs btn-primary" data-toggle="modal" href='#modal-logo'>Ver</a>
                                            <div class="modal fade" id="modal-logo">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">{{ $i->nome }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ route('instituto.showLogo', $i->id) }}" class="img-responsive" alt="Image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center"><a class="btn btn-xs btn-primary" data-toggle="modal" href='#editaInstituto{{ $i->id }}'>Editar</a>
                                            <div class="modal fade" id="editaInstituto{{ $i->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Editar {{ $i->nome }}</h4>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <br>
                                                            {!! Form::open(['name' => $i->id,'route' => 'instituto.salvar', 'method' => 'POST', 'id' => $i->id, 'enctype' => 'multipart/form-data']) !!}
                                                            <div class="form-group">
                                                            {!! Form::hidden('id', $i->id) !!}
                                                            {!! Form::label('diretor', 'Diretor', ['class' => 'control-label']) !!}
                                                            {!! Form::select('diretor', $professores->pluck('professor','id'), $i->diretor, ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="form-group">
                                                            {!! Form::label('logotipo', 'Logotipo', ['class' => 'control-label']) !!}
                                                            {!! Form::file('logotipo', null, ['class' => 'form-control', 'required' => 'required', 'accept' => 'image/*', 'data-max-size' =>'100']) !!}
                                                            <div id="uploaded-file" class="img-thumbnail hidden"></div>
                                                            </div>
                                                            <div class="form-group">
                                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                                            {!! Form::text('nome', $i->nome, ['placeholder' => 'Nome simplificado', 'class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::reset('Cancelar', ['class' => 'btn btn-default cancelar', 'data-dismiss' => 'modal', 'data-form-id' => '#frminstituto']) !!}
                                                                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                                                            </div>
                                                                {!! Form::close(['name' => $i->id]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center"><a class="btn btn-xs btn-danger" data-toggle="modal" href='#frmInstitutoApagar{{ $i->id }}'>Apagar</a>
                                            <div class="modal fade" id="frmInstitutoApagar{{ $i->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <br>
                                                            {!! Form::open(['name' => $i->id,'route' => 'instituto.apagar', 'method' => 'POST', 'id' => $i->id, 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $i->id) !!}
                                                            <div class="alert-danger">
                                                                <div class="panel-body">
                                                                    <h3>Tem certeza que deseja apagar o Instituto {{ $i->nome }}?</h3>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::reset('Cancelar', ['class' => 'btn btn-default cancelar', 'data-dismiss' => 'modal', 'data-form-id' => '#frminstituto']) !!}
                                                                {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}
                                                            </div>
                                                                {!! Form::close(['name' => $i->id]) !!}
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