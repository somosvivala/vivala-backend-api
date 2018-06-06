<!-- Hotel Ou Regiao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hotel_ou_regiao', 'Hotel Ou Regiao:') !!}
    {!! Form::text('hotel_ou_regiao', null, ['class' => 'form-control']) !!}
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

<!-- Tipo Quarto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_quarto', 'Tipo Quarto:') !!}
    {!! Form::select('tipo_quarto', ['1' => 'INDIVIDUAL', '2' => 'CASAL', '3' => 'TRIPLO', '4' => 'QUADRUPLO', '5' => 'CASA/AP COMPLETO'], null, ['class' => 'form-control']) !!}
</div>

<!-- Qnt Quartos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qnt_quartos', 'Qnt Quartos:') !!}
    {!! Form::text('qnt_quartos', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('cotacaoHospedagems.index') !!}" class="btn btn-default">Cancelar</a>
</div>
