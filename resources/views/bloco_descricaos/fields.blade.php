<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Texto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texto', 'Texto:') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control textarea-ck' ]) !!}
</div>

<!-- Campos hidden identificando a relação -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::hidden('owner_id', isset($owner_id) ? $owner_id : '') !!}
    {!! Form::hidden('owner_type', isset($owner_type) ? $owner_type : '') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('blocoDescricaos.index') !!}" class="btn btn-default">Cancel</a>
</div>

