<table class="table table-responsive" id="imersaos-table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($imersaos as $imersao)
        <tr>
            <td>{!! $imersao->titulo !!}</td>
            <td>
                {!! Form::open(['route' => ['imersaos.destroy', $imersao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('imersaos.show', [$imersao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('imersaos.edit', [$imersao->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>