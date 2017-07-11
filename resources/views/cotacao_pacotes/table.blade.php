<table class="table table-responsive" id="cotacaoPacotes-table">
    <thead>
        <th>Contato Nome Completo</th>
        <th>Contato Nome Preferencia</th>
        <th>Contato Telefone</th>
        <th>Origem</th>
        <th>Destino</th>
        <th>Data Ida</th>
        <th>Aereo Preço Des.</th>
        <th>Hotel Ou Regiao</th>
        <th>Qnt Quartos</th>
        <th>Hospedagem Preço Des.</th>
        <th>Transporte Interno Preço Des.</th>
        <th>Passeios Interesses Preço Des.</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cotacaoPacotes as $cotacaoPacote)
        <tr>
            <td>{!! $cotacaoPacote->contato_nome_completo !!}</td>
            <td>{!! $cotacaoPacote->contato_nome_preferencia !!}</td>
            <td>{!! $cotacaoPacote->contato_telefone !!}</td>
            <td>{!! $cotacaoPacote->origem !!}</td>
            <td>{!! $cotacaoPacote->destino !!}</td>
            <td>{!! $cotacaoPacote->data_ida !!}</td>
            <td>{!! $cotacaoPacote->aereo_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->hotel_ou_regiao !!}</td>
            <td>{!! $cotacaoPacote->qnt_quartos !!}</td>
            <td>{!! $cotacaoPacote->hospedagem_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->transporte_interno_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->passeios_preco_desejado !!}</td>
            <td>
                {!! Form::open(['route' => ['cotacaoPacotes.destroy', $cotacaoPacote->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cotacaoPacotes.show', [$cotacaoPacote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cotacaoPacotes.edit', [$cotacaoPacote->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
