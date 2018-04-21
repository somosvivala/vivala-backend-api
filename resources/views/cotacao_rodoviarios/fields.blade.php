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

<!-- Sem Volta Field -->
<div class="form-group col-sm-12">
    {!! Form::label('sem_volta', 'Sem Volta:') !!}
    <label class="radio-inline">
        {!! Form::radio('sem_volta', "1", null) !!} Sim
    </label>

    <label class="radio-inline">
        {!! Form::radio('sem_volta', "0", null) !!} Não
    </label>

</div>

<!-- Datas Flexiveis Field -->
<div class="form-group col-sm-12">
    {!! Form::label('datas_flexiveis', 'Datas Flexiveis:') !!}
    <label class="radio-inline">
        {!! Form::radio('datas_flexiveis', "1", null) !!} Sim
    </label>

    <label class="radio-inline">
        {!! Form::radio('datas_flexiveis', "0", null) !!} Não
    </label>

</div>

<!-- Qnt Passageiros Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qnt_passageiros', 'Qnt Passageiros:') !!}
    {!! Form::text('qnt_passageiros', null, ['class' => 'form-control']) !!}
</div>

<!-- Companias Preferenciais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('companias_preferenciais', 'Companias Preferenciais:') !!}
    {!! Form::text('companias_preferenciais', null, ['class' => 'form-control']) !!}
</div>

<!-- Duracao Maxima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duracao_maxima', 'Duracao Maxima:') !!}
    {!! Form::text('duracao_maxima', null, ['class' => 'form-control']) !!}
</div>

<!-- Solicitacoes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solicitacoes', 'Solicitacoes:') !!}
    {!! Form::text('solicitacoes', null, ['class' => 'form-control']) !!}
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
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cotacaoRodoviarios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
