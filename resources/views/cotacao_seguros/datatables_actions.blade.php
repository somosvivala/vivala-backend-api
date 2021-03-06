{!! Form::open(['route' => ['cotacaoSeguros.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('cotacaoSeguros.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
