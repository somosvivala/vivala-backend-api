<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $experiencia->titulo !!}</p>
</div>

<!-- Link de destino Field -->
<div class="form-group">
    {!! Form::label('link_destino', 'Link de destino') !!}
<p> <a href="{!! $experiencia->link_destino !!}">{!! $experiencia->link_destino !!}</a> </p>
</div>

<!-- Ativo na listagem -->
<div class="form-group">
    {!! Form::label('ativo_listagem', 'Aparece na listagem: ') !!}
    <span> {{ $experiencia->ativo_listagem ? 'Sim' : 'Não' }} </span>
    @if ( !$experiencia->ativo_listagem )
    {!! Form::open(['url' => '/experiencias/'.$experiencia->id.'/ativa-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-up"></i> Mostrar na listagem', [
            'type' => 'submit',
            'class' => 'btn btn-info btn-xs',
            'onclick' => "return confirm('Ativar a exibição dessa experiencia?')"
        ]) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/experiencias/'.$experiencia->id.'/remove-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-down"></i> Remover da listagem', [
            'type' => 'submit',
            'class' => 'btn btn-warning btn-xs',
            'onclick' => "return confirm('Parar a exibição dessa experiencia?')"
        ]) !!}
    {!! Form::close() !!}
    @endif

</div>

<div class="form-group">
    {!! Form::label('foto_listagem', 'Foto da listagem') !!}
    <p> <img src="//res.cloudinary.com/{{ env('CLOUDINARY_CLOUD_NAME') }}/image/upload/{{ $experiencia->mediaListagem ? $experiencia->mediaListagem->cloudinary_id : '' }}" alt="Foto da {{ $experiencia->titulo }}" width="500px"> </p>
</div>
<hr>

