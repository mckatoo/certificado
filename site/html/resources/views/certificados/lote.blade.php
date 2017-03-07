            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users"></i> Certificados em Lote
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
                                            {!! Form::open(['route' => 'lotes.salvarLote', 'method' => 'POST', 'id' => 'frmcertificadolote', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="form-group">
                                                {!! Form::label('descricao', 'Lote', ['class' => 'control-label']) !!}
                                                {!! Form::textarea('descricao', old('descricao'),
                                                [
                                                    'class' => 'form-control',
                                                    'required' => 'required',
                                                    'maxlenght' => '200',
                                                    'resize' => 'false',
                                                    'rows' => '3',
                                                    'placeholder' => 'Descrição necessária para identificar o lote no confeccionamento dos certificados.'
                                                ]) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('titulo', 'Título', ['class' => 'control-label']) !!}
                                                {!! Form::textarea('titulo', old('titulo'),
                                                [
                                                    'class' => 'form-control',
                                                    'required' => 'required',
                                                    'rows' => '3',
                                                    'data-limit-rows' => 'true'
                                                ]) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                                {!! Form::label('carga_horaria', 'Carga Horária', ['class' => 'control-label']) !!}
                                                {!! Form::number('carga_horaria', old('carga_horaria'),
                                                [
                                                    'class' => 'form-control',
                                                    'required' => 'required',
                                                    'step' => '1'
                                                ]) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                                {!! Form::label('instituto', 'Instituto', ['class' => 'control-label']) !!}
                                                {!! Form::select('instituto', $institutos->pluck('nome','id'), old('instituto'),
                                                [
                                                    'placeholder' => 'Selecione ...',
                                                    'class' => 'form-control',
                                                    'required' => 'required'
                                                ]) !!}
                                            </div>
                                            <div class="form-group col-lg-4">
                                            {!! Form::label('realizado_em', 'Realizado em', ['class' => 'control-label']) !!}
                                            {!! Form::text('realizado_em', old('realizado_em', date('d/m/Y')),
                                            [
                                                'class' => 'form-control',
                                                'required' => 'required',
                                                'id' => 'datepicker'
                                            ]) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('curso', 'Curso', ['class' => 'control-label']) !!}
                                            {!! Form::select('curso', $cursos->pluck('curso','id'), old('curso'),
                                            [
                                                'placeholder' => 'Selecione ...',
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]) !!}
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
                                    <th>Certificados</th>
                                    <th>Realizado em</th>
                                    <td class="text-center"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lotes as $l)
                                    <tr>
                                        <td>
                                            <a href="{{ route('lotes.print',$l->id) }}" target="_blank">{{ $l->descricao }}</a>
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-xs btn-success" data-toggle="modal" href='#modal-add-certificados{{ $l->id }}'>{{ count($certificados->where('lote_id',$l->id)) }}</a>
                                            <div class="modal fade" id="modal-add-certificados{{ $l->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Adicionar Certificados no Lote {{ $l->id }}</h4>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    {!! Form::open(['route' => 'lotes.salvar', 'method' => 'POST', 'id' => 'frmcertificadolote', 'enctype' => 'multipart/form-data']) !!}
                                                                    {!! Form::hidden('lote', $l->id) !!}
                                                                    {!! Form::hidden('id') !!}
                                                                    <div class="form-group">
                                                                    {!! Form::label('nome', 'Nome', ['class' => 'control-label']) !!}
                                                                    {!! Form::text('nome', old('nome'),
                                                                    [
                                                                        'class' => 'form-control',
                                                                        'required' => 'required',
                                                                        'placeholder' => 'Nome Completo do Aluno'
                                                                    ]) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="panel-footer">
                                                                    {!! Form::reset('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                                                                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary pull-right cancelar']) !!}
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                            <div class="table-responsive" id="certificados-lote">
                                                                <table class="table table-hover table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nome</th>
                                                                            <th colspan="2"></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($certificados->where('lote_id',$l->id) as $c)
                                                                            <tr>
                                                                                <td>{{ $c->nome }}</td>
                                                                                <td></td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{ $l->created_at->format('d/m/Y') }}</td>

                                        <td class="text-center">
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" href='#modal-apagar-certificado-lote{{ $l->id }}'>Apagar</a>
                                            <div class="modal fade" id="modal-apagar-certificado-lote{{ $l->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">Apagar Certificado</h4>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <br>
                                                            {!! Form::open(['route' => 'lotes.apagar', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                            {!! Form::hidden('id', $l->id) !!}
                                                            <div class="alert-danger">
                                                                <div class="panel-body">
                                                                    <h3>Tem certeza que deseja apagar o Lote com descrição "{{ $l->descricao }}" contendo {{ count($certificados->where('lote_id',$l->id)) }} certificados?</h3>
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