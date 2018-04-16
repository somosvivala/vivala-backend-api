<div class='btn-group'>
    @if ( !$expedicao->ativo_listagem )
    {!! Form::open(['url' => '/expedicaos/'.$id.'/ativa-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-up"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-info btn-xs',
            'onclick' => "return confirm('Ativar a exibição dessa expedicao?')"
        ]) !!}
    {!! Form::close() !!}
    @else
    {!! Form::open(['url' => '/expedicaos/'.$id.'/remove-listagem']) !!}
        {!! Form::button('<i class="fa fa-arrow-down"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-warning btn-xs',
            'onclick' => "return confirm('Parar a exibição dessa expedicao?')"
        ]) !!}
    {!! Form::close() !!}
@endif
</div>
<div class='btn-group'>
    <a href="{{ route('expedicaos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
</div>
<div class='btn-group'>
{!! Form::open(['route' => ['expedicaos.destroy', $id], 'method' => 'delete']) !!}
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Tem certeza?')"
    ]) !!}
{!! Form::close() !!}
</div>
