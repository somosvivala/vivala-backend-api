<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
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

<!-- Cod Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_status', 'Cod Status:') !!}
    {!! Form::text('cod_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Nome Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome_status', 'Nome Status:') !!}
    {!! Form::text('nome_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Expedicao Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expedicao_id', 'Expedicao Id:') !!}
    {!! Form::text('expedicao_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inscricaoExpedicaos.index') !!}" class="btn btn-default">Cancel</a>
</div>
