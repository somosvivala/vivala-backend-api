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

<!-- Passeios Interesses Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passeios_interesses', 'Passeios Interesses:') !!}
    {!! Form::text('passeios_interesses', null, ['class' => 'form-control']) !!}
</div>

<!-- Solicitacoes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solicitacoes', 'Solicitacoes:') !!}
    {!! Form::text('solicitacoes', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Desejado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco_desejado', 'Preco Desejado:') !!}
    {!! Form::text('preco_desejado', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('cotacaoPasseios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
