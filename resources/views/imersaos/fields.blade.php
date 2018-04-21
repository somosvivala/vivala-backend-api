<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- Link destino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link_destino', 'Link de destino:') !!}
    {!! Form::text('link_destino', isset($experiencia) ? $experiencia->link_destino : '' , ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('imersaos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
