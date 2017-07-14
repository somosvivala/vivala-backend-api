<table class="table table-responsive" id="experiencias-table">
    <thead>
        <th>Titulo</th>
        <th>Descricao Listagem</th>
        <th>Data Inicio</th>
        <th>Data Fim</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($experiencias as $experiencia)
        <tr>
            <td>{!! $experiencia->titulo !!}</td>
            <td>{!! $experiencia->descricao_listagem !!}</td>
            <td>{!! $experiencia->data_inicio !!}</td>
            <td>{!! $experiencia->data_fim !!}</td>
            <td>
                {!! Form::open(['route' => ['experiencias.destroy', $experiencia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('experiencias.show', [$experiencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('experiencias.edit', [$experiencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>