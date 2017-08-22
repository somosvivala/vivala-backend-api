<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Cidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade', 'Cidade:') !!}
    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Destaque Field -->
<div class="form-group col-sm-12">
    {!! Form::label('destaque', 'Destaque:') !!}
    <label class="radio-inline">
        {!! Form::radio('destaque', "1", null) !!} Sim
    </label>

    <label class="radio-inline">
        {!! Form::radio('destaque', "0", null) !!} Não
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agentes.index') !!}" class="btn btn-default">Cancel</a>
</div>
