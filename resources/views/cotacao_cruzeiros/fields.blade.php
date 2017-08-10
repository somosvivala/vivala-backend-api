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

<!-- Qnt Adultos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qnt_adultos', 'Qnt Adultos:') !!}
    {!! Form::text('qnt_adultos', null, ['class' => 'form-control']) !!}
</div>

<!-- Qnt Criancas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qnt_criancas', 'Qnt Criancas:') !!}
    {!! Form::text('qnt_criancas', null, ['class' => 'form-control']) !!}
</div>

<!-- Qnt Bebes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qnt_bebes', 'Qnt Bebes:') !!}
    {!! Form::text('qnt_bebes', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Desejado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco_desejado', 'Preco Desejado:') !!}
    {!! Form::text('preco_desejado', null, ['class' => 'form-control']) !!}
</div>

<!-- Companias Preferenciais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('companias_preferenciais', 'Companias Preferenciais:') !!}
    {!! Form::text('companias_preferenciais', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Dias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_dias', 'Max Dias:') !!}
    {!! Form::text('max_dias', null, ['class' => 'form-control']) !!}
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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cotacaoCruzeiros.index') !!}" class="btn btn-default">Cancel</a>
</div>
