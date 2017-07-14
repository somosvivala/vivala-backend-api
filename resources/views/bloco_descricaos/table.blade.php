<table class="table table-responsive" id="blocoDescricaos-table">
    <thead>
        <th>Titulo</th>
        <th>Texto</th>
        <th>Owner Id</th>
        <th>Owner Type</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($blocoDescricaos as $blocoDescricao)
        <tr>
            <td>{!! $blocoDescricao->titulo !!}</td>
            <td>{!! $blocoDescricao->texto !!}</td>
            <td>{!! $blocoDescricao->owner_id !!}</td>
            <td>{!! $blocoDescricao->owner_type !!}</td>
            <td>
                {!! Form::open(['route' => ['blocoDescricaos.destroy', $blocoDescricao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('blocoDescricaos.show', [$blocoDescricao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('blocoDescricaos.edit', [$blocoDescricao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>