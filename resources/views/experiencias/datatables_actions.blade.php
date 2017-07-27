{!! Form::open(['route' => ['experiencias.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="/experiencias/{{$id}}/inscricoes" class='btn btn-default btn-xs'>
        <i class="fa fa-group"></i>
    </a>
    <a href="{{ route('experiencias.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
