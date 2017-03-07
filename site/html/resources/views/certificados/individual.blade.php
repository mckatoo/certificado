            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user"></i> Certificado Individual
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class="btn btn-primary btn-xs" data-toggle="modal" href='#modal-certificado'>Novo</a>
                            <div class="modal fade" id="modal-certificado">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Certificado Individual</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => 'certificados.salvar', 'method' => 'POST', 'id' => 'frmcertificado', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('instituto', 'Instituto', ['class' => 'control-label']) !!}
                                            {!! Form::select('instituto', $institutos->pluck('nome','id'), old('instituto'), ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                            {!! Form::text('nome', old('nome'), ['class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                            <div class="form-group col-lg-12">
                                            {!! Form::label('titulo', 'Título', ['class' => 'control-label']) !!}
                                            {!! Form::textarea('titulo', old('titulo'), ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'data-limit-rows' => 'true']) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                                {!! Form::label('carga_horaria', 'Carga Horária', ['class' => 'control-label']) !!}
                                                {!! Form::number('carga_horaria', old('carga_horaria'), ['class' => 'form-control', 'required' => 'required','step' => '1']) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                                {!! Form::label('nota', 'Nota', ['class' => 'control-label']) !!}
                                                {!! Form::number('nota', old('nota'), ['class' => 'form-control','step' => '0.01']) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                            {!! Form::label('realizado_em', 'Realizado em', ['class' => 'control-label']) !!}
                                            {!! Form::text('realizado_em', old('realizado_em', date('d/m/Y')), ['class' => 'form-control', 'required' => 'required', 'id' => 'datepicker']) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('curso', 'Curso', ['class' => 'control-label']) !!}
                                            {!! Form::select('curso', $cursos->pluck('curso','id'), old('curso'), ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'data-form-id' => '#frmcertificado']) !!}
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
                                    <th>Nome</th>
                                    <th>Curso</th>
                                    <th>Realizado em</th>
                                    <td colspan="2" class="text-center"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($certificados->where('lote_id','=','') as $c)
                                    <tr>
                                        <td>
                                            <a href="{{ route('certificados.print', $c->id) }}" target="_blank">
                                                {{ $c->nome }}</td>
                                            </a>
                                        <td>{{ $c->cursos->curso }}</td>
                                        <td>{{ date('d/m/Y', strtotime($c->realizado_em)) }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-primary" data-toggle="modal" href='#modalEditaCertificado{{ $c->id }}'>Editar</a>
                                            <div class="modal fade" id="modalEditaCertificado{{ $c->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Editar Certificado {{ $c->curso }}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                                {!! Form::open(['route' => 'certificados.salvar', 'method' => 'POST', 'id' => 'frmcertificado', 'enctype' => 'multipart/form-data']) !!}
                                                                {!! Form::hidden('id', $c->id) !!}
                                                            <div class="form-group col-lg-12">
                                                                {!! Form::label('instituto', 'Instituto', ['class' => 'control-label']) !!}
                                                                {!! Form::select('instituto', $institutos->pluck('nome','id'), old('instituto',$c->instituto_id), ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                                                {!! Form::text('nome', old('nome',$c->nome), ['class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                {!! Form::label('titulo', 'Título', ['class' => 'control-label']) !!}
                                                                {!! Form::textarea('titulo', old('titulo',$c->titulo), ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'data-limit-rows' => 'true']) !!}
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                {!! Form::label('carga_horaria', 'Carga Horária', ['class' => 'control-label']) !!}
                                                                {!! Form::number('carga_horaria', old('carga_horaria',$c->carga_horaria), ['class' => 'form-control', 'required' => 'required','step' => '1']) !!}
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                {!! Form::label('nota', 'Nota', ['class' => 'control-label']) !!}
                                                                {!! Form::number('nota', old('nota',$c->nota), ['class' => 'form-control','step' => '0.01']) !!}
                                                            </div>
                                                            <div class="form-group col-lg-4">
                                                                {!! Form::label('realizado_em', 'Realizado em', ['class' => 'control-label']) !!}
                                                                {!! Form::text('realizado_em', old('realizado_em', date('d/m/Y',strtotime($c->realizado_em))), ['class' => 'form-control', 'required' => 'required', 'id' => 'datepicker']) !!}
                                                            </div>
                                                            <div class="form-group">
                                                                {!! Form::label('curso', 'Curso', ['class' => 'control-label']) !!}
                                                                {!! Form::select('curso', $cursos->pluck('curso','id'), old('curso',$c->curso_id), ['placeholder' => 'Selecione ...', 'class' => 'form-control', 'required' => 'required']) !!}
                                                            </div>
                                                            <div class="modal-footer">
                                                                {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                                                {!! Form::submit('Salvar', ['class' => 'btn btn-primary cancelar']) !!}
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modalApagarCertificado{{ $c->id }}'>Apagar</a>
                                            <div class="modal fade" id="modalApagarCertificado{{ $c->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <br>
                                                            {!! Form::open(['route' => 'certificados.apagar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $c->id) !!}
                                                            <div class="alert-danger">
                                                                <div class="panel-body">
                                                                    <h3>Tem certeza que deseja apagar o Certificado de {{ $c->nome }} referente ao curso de {{ $c->cursos->curso }} realizado em {{ $c->realizado_em }}?</h3>
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