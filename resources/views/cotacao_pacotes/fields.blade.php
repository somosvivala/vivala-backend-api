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

<!-- Periodo Voo Ida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_voo_ida', 'Periodo Voo Ida:') !!}
    {!! Form::select('periodo_voo_ida', ['Manhã' => 'Manhã', 'Tarde' => 'Tarde', 'Noite' => 'Noite'], null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Voo Volta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_voo_volta', 'Periodo Voo Volta:') !!}
    {!! Form::select('periodo_voo_volta', ['Manhã' => 'Manhã', 'Tarde' => 'Tarde', 'Noite' => 'Noite'], null, ['class' => 'form-control']) !!}
</div>

<!-- Aeroporto Origem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aeroporto_origem', 'Aeroporto Origem:') !!}
    {!! Form::text('aeroporto_origem', null, ['class' => 'form-control']) !!}
</div>

<!-- Aeroporto Retorno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aeroporto_retorno', 'Aeroporto Retorno:') !!}
    {!! Form::text('aeroporto_retorno', null, ['class' => 'form-control']) !!}
</div>

<!-- Companias Aereas Preferenciais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('companias_aereas_preferenciais', 'Companias Aereas Preferenciais:') !!}
    {!! Form::text('companias_aereas_preferenciais', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Paradas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_paradas', 'Numero Paradas:') !!}
    {!! Form::text('numero_paradas', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempo Voo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempo_voo', 'Tempo Voo:') !!}
    {!! Form::text('tempo_voo', null, ['class' => 'form-control']) !!}
</div>

<!-- Aereo Preco Desejado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aereo_preco_desejado', 'Aereo Preco Desejado:') !!}
    {!! Form::text('aereo_preco_desejado', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Ou Regiao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hotel_ou_regiao', 'Hotel Ou Regiao:') !!}
    {!! Form::text('hotel_ou_regiao', null, ['class' => 'form-control']) !!}
</div>

<!-- Qnt Quartos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qnt_quartos', 'Qnt Quartos:') !!}
    {!! Form::text('qnt_quartos', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Quarto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_quarto', 'Tipo Quarto:') !!}
    {!! Form::select('tipo_quarto', ['1' => 'INDIVIDUAL', '2' => 'CASAL', '3' => 'TRIPLO', '4' => 'QUADRUPLO', '5' => 'CASA/AP COMPLETO'], null, ['class' => 'form-control']) !!}
</div>

<!-- Hospedagem Servicos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hospedagem_servicos', 'Hospedagem Servicos:') !!}
    {!! Form::text('hospedagem_servicos', null, ['class' => 'form-control']) !!}
</div>

<!-- Hospedagem Solicitacoes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hospedagem_solicitacoes', 'Hospedagem Solicitacoes:') !!}
    {!! Form::text('hospedagem_solicitacoes', null, ['class' => 'form-control']) !!}
</div>

<!-- Hospedagem Preco Desejado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hospedagem_preco_desejado', 'Hospedagem Preco Desejado:') !!}
    {!! Form::text('hospedagem_preco_desejado', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorias Carro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorias_carro', 'Categorias Carro:') !!}
    {!! Form::text('categorias_carro', null, ['class' => 'form-control']) !!}
</div>

<!-- Itens Carro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('itens_carro', 'Itens Carro:') !!}
    {!! Form::text('itens_carro', null, ['class' => 'form-control']) !!}
</div>

<!-- Transporte Interno Solicitacoes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transporte_interno_solicitacoes', 'Transporte Interno Solicitacoes:') !!}
    {!! Form::text('transporte_interno_solicitacoes', null, ['class' => 'form-control']) !!}
</div>

<!-- Transporte Interno Preco Desejado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transporte_interno_preco_desejado', 'Transporte Interno Preco Desejado:') !!}
    {!! Form::text('transporte_interno_preco_desejado', null, ['class' => 'form-control']) !!}
</div>

<!-- Passeios Interesses Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passeios_interesses', 'Passeios Interesses:') !!}
    {!! Form::text('passeios_interesses', null, ['class' => 'form-control']) !!}
</div>

<!-- Passeios Outros Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passeios_outros', 'Passeios Outros:') !!}
    {!! Form::text('passeios_outros', null, ['class' => 'form-control']) !!}
</div>

<!-- Passeios Preco Desejado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passeios_preco_desejado', 'Passeios Preco Desejado:') !!}
    {!! Form::text('passeios_preco_desejado', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomes Seguro Viagem Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomes_seguro_viagem', 'Nomes Seguro Viagem:') !!}
    {!! Form::text('nomes_seguro_viagem', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('cotacaoPacotes.index') !!}" class="btn btn-default">Cancel</a>
</div>
