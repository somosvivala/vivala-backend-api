<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $expedicao->titulo !!}</p>
</div>

<!-- Descricao Listagem Field -->
<div class="form-group">
    {!! Form::label('descricao_listagem', 'Subtitulo') !!}
    <p>{!! $expedicao->descricao_listagem !!}</p>
</div>

<!-- Link de destino Field -->
<div class="form-group">
    {!! Form::label('link_destino', 'Link de destino') !!}
<p> <a href="{!! $expedicao->link_destino !!}">{!! $expedicao->link_destino !!}</a> </p>
</div>

<!-- Ativo na listagem -->
<div class="form-group">
    {!! Form::label('ativo_listagem', 'Aparece na listagem: ') !!}
    <span> {{ $expedicao->ativo_listagem ? 'Sim' : 'Não' }} </span>
    @if ( !$expedicao->ativo_listagem )
    {!! Form::open(['url' => '/expedicaos/'.$expedicao->id.'/ativa-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-up"></i> Mostrar na listagem', [
            'type' => 'submit',
            'class' => 'btn btn-info btn-xs',
            'onclick' => "return confirm('Ativar a exibição dessa expedicao?')"
        ]) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/expedicaos/'.$expedicao->id.'/remove-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-down"></i> Remover da listagem', [
            'type' => 'submit',
            'class' => 'btn btn-warning btn-xs',
            'onclick' => "return confirm('Parar a exibição dessa expedicao?')"
        ]) !!}
    {!! Form::close() !!}
    @endif

</div>

<div class="form-group">
    {!! Form::label('foto_listagem', 'Foto da listagem') !!}
    <p> <img src="//res.cloudinary.com/{{ env('CLOUDINARY_CLOUD_NAME') }}/image/upload/{{ $expedicao->mediaListagem ? $expedicao->mediaListagem->cloudinary_id : '' }}" alt="Foto da {{ $expedicao->titulo }}" width="500px"> </p>

</div>

<hr>

