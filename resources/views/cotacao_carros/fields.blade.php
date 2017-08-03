<!-- Cidade Retirada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade_retirada', 'Cidade Retirada:') !!}
    {!! Form::text('cidade_retirada', null, ['class' => 'form-control']) !!}
</div>

<!-- Cidade Devolucao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade_devolucao', 'Cidade Devolucao:') !!}
    {!! Form::text('cidade_devolucao', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Retirada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_retirada', 'Data Retirada:') !!}
    {!! Form::date('data_retirada', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Devolucao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_devolucao', 'Data Devolucao:') !!}
    {!! Form::date('data_devolucao', null, ['class' => 'form-control']) !!}
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

<!-- Solicitacoes Carro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('solicitacoes_carro', 'Solicitacoes Carro:') !!}
    {!! Form::text('solicitacoes_carro', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Desejado Carro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco_desejado_carro', 'Preco Desejado Carro:') !!}
    {!! Form::text('preco_desejado_carro', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('cotacaoCarros.index') !!}" class="btn btn-default">Cancel</a>
</div>
