<!-- Nome Contato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_contato', 'Nome Contato:') !!}
    {!! Form::text('nome_contato', null, ['class' => 'form-control']) !!}
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

<!-- Nome Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_empresa', 'Nome Empresa:') !!}
    {!! Form::text('nome_empresa', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Funcionarios Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_funcionarios', 'Numero Funcionarios:') !!}
    {!! Form::text('numero_funcionarios', null, ['class' => 'form-control']) !!}
</div>

<!-- Mensagem Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mensagem', 'Mensagem:') !!}
    {!! Form::textarea('mensagem', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contatoCorporativo.index') !!}" class="btn btn-default">Cancelar</a>
</div>
