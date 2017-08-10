<!-- Origem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origem', 'Origem:') !!}
    {!! Form::text('origem', null, ['class' => 'form-control']) !!}
</div>

<!-- Destino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destino', 'Destino:') !!}
    {!! Form::text('destino', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Ida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_ida', 'Data Ida:') !!}
    {!! Form::date('data_ida', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Volta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_volta', 'Data Volta:') !!}
    {!! Form::date('data_volta', null, ['class' => 'form-control']) !!}
</div>

<!-- Esportes Radicais Field -->
<div class="form-group col-sm-12">
    {!! Form::label('esportes_radicais', 'Esportes Radicais:') !!}
    <label class="radio-inline">
        {!! Form::radio('esportes_radicais', "1", null) !!} Sim
    </label>

    <label class="radio-inline">
        {!! Form::radio('esportes_radicais', "0", null) !!} Não
    </label>

</div>

<!-- Solicitacoes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solicitacoes', 'Solicitacoes:') !!}
    {!! Form::text('solicitacoes', null, ['class' => 'form-control']) !!}
</div>

<!-- Datas Nascimento Seguro Viagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datas_nascimento_seguro_viagem', 'Datas Nascimento Seguro Viagem:') !!}
    {!! Form::text('datas_nascimento_seguro_viagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Completo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_completo', 'Nome Completo:') !!}
    {!! Form::text('nome_completo', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Preferencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_preferencia', 'Nome Preferencia:') !!}
    {!! Form::text('nome_preferencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cotacaoSeguros.index') !!}" class="btn btn-default">Cancel</a>
</div>
