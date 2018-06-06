<div class='btn-group'>
    @if ( !$imersao->ativo_listagem )
    {!! Form::open(['url' => '/imersaos/'.$id.'/ativa-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-up"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-info btn-xs',
            'onclick' => "return confirm('Ativar a exibição dessa imersao?')"
        ]) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/imersaos/'.$id.'/remove-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-down"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-warning btn-xs',
            'onclick' => "return confirm('Parar a exibição dessa imersao?')"
        ]) !!}
    {!! Form::close() !!}
@endif
</div>
<div class='btn-group'>
    <a href="{{ route('imersaos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
<div class='btn-group'>
{!! Form::open(['route' => ['imersaos.destroy', $id], 'method' => 'delete']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Tem certeza?')"
    ]) !!}
{!! Form::close() !!}
</div>
