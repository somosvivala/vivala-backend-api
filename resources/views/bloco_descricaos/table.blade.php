<table class="table table-responsive" id="blocoDescricaos-table">
    <thead>
        <th>Titulo</th>
        <th>Texto</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($blocoDescricaos as $blocoDescricao)
        <tr>
            <td style="width:15%">{!! $blocoDescricao->titulo !!}</td>
            <td style="width:80%">{!! $blocoDescricao->texto !!}</td>
            <td style="width:5%">
                {!! Form::open(['route' => ['blocoDescricaos.destroy', $blocoDescricao->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('blocoDescricaos.edit', [$blocoDescricao->id]) !!}" class='btn btn-default btn-small'><i class="glyphicon glyphicon-pencil"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-small', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

