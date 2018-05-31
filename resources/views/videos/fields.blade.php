<!-- Partial Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('partial_url', 'Código do video no youtube:') !!}
    {!! Form::text('partial_url', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Campos hidden identificando a relação -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::hidden('owner_id', isset($owner_id) ? $owner_id : '') !!}
    {!! Form::hidden('owner_type', isset($owner_type) ? $owner_type : '') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary btn-confirmar">Confirmar</button>
    <a href="{!! route('videos.index') !!}" class="btn btn-default">Cancel</a>
</div>
