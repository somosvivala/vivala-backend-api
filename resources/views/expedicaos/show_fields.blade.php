<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $expedicao->id !!}</p>
</div>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $expedicao->titulo !!}</p>
</div>

<!-- Descricao Listagem Field -->
<div class="form-group">
    {!! Form::label('descricao_listagem', 'Descricao Listagem:') !!}
    <p>{!! $expedicao->descricao_listagem !!}</p>
</div>

<!-- Data Inicio Field -->
<div class="form-group">
    {!! Form::label('data_inicio', 'Data Inicio:') !!}
    <p>{!! $expedicao->data_inicio !!}</p>
</div>

<!-- Data Fim Field -->
<div class="form-group">
    {!! Form::label('data_fim', 'Data Fim:') !!}
    <p>{!! $expedicao->data_fim !!}</p>
</div>

<!-- Media Listagem Id Field -->
<div class="form-group">
    {!! Form::label('media_listagem_id', 'Media Listagem Id:') !!}
    <p>{!! $expedicao->media_listagem_id !!}</p>
</div>

<!-- Media Listagem Type Field -->
<div class="form-group">
    {!! Form::label('media_listagem_type', 'Media Listagem Type:') !!}
    <p>{!! $expedicao->media_listagem_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $expedicao->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $expedicao->updated_at !!}</p>
</div>

