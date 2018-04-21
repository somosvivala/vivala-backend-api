<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>


<!-- Link destino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link_destino', 'Link de destino:') !!}
    {!! Form::text('link_destino', isset($experiencia) ? $experiencia->link_destino : '' , ['class' => 'form-control']) !!}
</div>

{{-- Escondendo para v3
<!-- Descricao Listagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao_listagem', 'Subtitulo:') !!}
    {!! Form::text('descricao_listagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_inicio', 'Data Inicio:') !!}
    {!! Form::date('data_inicio', isset($experiencia) ? $experiencia->data_inicio : '' , ['class' => 'form-control']) !!}
</div>

<!-- Data Fim Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_fim', 'Data Fim:') !!}
    {!! Form::date('data_fim', isset($experiencia) ? $experiencia->data_fim : '' , ['class' => 'form-control']) !!}
</div>

<!-- Link pagamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_pagamento', 'Link do Pagseguro:') !!}
    {!! Form::text('url_pagamento', isset($experiencia) ? $experiencia->url_pagamento : '' , ['class' => 'form-control']) !!}
</div>
--}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="/experiencias" class="btn btn-default">Cancelar</a>
</div>


