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
    <a href="{!! route('contatoAgentes.index') !!}" class="btn btn-default">Cancel</a>
</div>