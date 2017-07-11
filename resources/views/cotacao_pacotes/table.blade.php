<table class="table table-responsive" id="cotacaoPacotes-table">
    <thead>
        <th>Origem</th>
        <th>Destino</th>
        <th>Data Ida</th>
        <th>Data Volta</th>
        <th>Datas Flexiveis</th>
        <th>Qnt Adultos</th>
        <th>Qnt Criancas</th>
        <th>Qnt Bebes</th>
        <th>Periodo Voo Ida</th>
        <th>Periodo Voo Volta</th>
        <th>Aeroporto Origem</th>
        <th>Aeroporto Retorno</th>
        <th>Companias Aereas Preferenciais</th>
        <th>Numero Paradas</th>
        <th>Tempo Voo</th>
        <th>Aereo Preco Desejado</th>
        <th>Hotel Ou Regiao</th>
        <th>Qnt Quartos</th>
        <th>Tipo Quarto</th>
        <th>Hospedagem Servicos</th>
        <th>Hospedagem Tipo</th>
        <th>Hospedagem Solicitacoes</th>
        <th>Hospedagem Preco Desejado</th>
        <th>Transporte Interno</th>
        <th>Tipos Transfer</th>
        <th>Categorias Carro</th>
        <th>Itens Carro</th>
        <th>Transporte Interno Solicitacoes</th>
        <th>Transporte Interno Preco Desejado</th>
        <th>Passeios Interesses</th>
        <th>Passeios Outros</th>
        <th>Passeios Preco Desejado</th>
        <th>Nomes Seguro Viagem</th>
        <th>Datas Nascimento Seguro Viagem</th>
        <th>Contato Nome Completo</th>
        <th>Contato Nome Preferencia</th>
        <th>Contato Email</th>
        <th>Contato Telefone</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cotacaoPacotes as $cotacaoPacote)
        <tr>
            <td>{!! $cotacaoPacote->origem !!}</td>
            <td>{!! $cotacaoPacote->destino !!}</td>
            <td>{!! $cotacaoPacote->data_ida !!}</td>
            <td>{!! $cotacaoPacote->data_volta !!}</td>
            <td>{!! $cotacaoPacote->datas_flexiveis !!}</td>
            <td>{!! $cotacaoPacote->qnt_adultos !!}</td>
            <td>{!! $cotacaoPacote->qnt_criancas !!}</td>
            <td>{!! $cotacaoPacote->qnt_bebes !!}</td>
            <td>{!! $cotacaoPacote->periodo_voo_ida !!}</td>
            <td>{!! $cotacaoPacote->periodo_voo_volta !!}</td>
            <td>{!! $cotacaoPacote->aeroporto_origem !!}</td>
            <td>{!! $cotacaoPacote->aeroporto_retorno !!}</td>
            <td>{!! $cotacaoPacote->companias_aereas_preferenciais !!}</td>
            <td>{!! $cotacaoPacote->numero_paradas !!}</td>
            <td>{!! $cotacaoPacote->tempo_voo !!}</td>
            <td>{!! $cotacaoPacote->aereo_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->hotel_ou_regiao !!}</td>
            <td>{!! $cotacaoPacote->qnt_quartos !!}</td>
            <td>{!! $cotacaoPacote->tipo_quarto !!}</td>
            <td>{!! $cotacaoPacote->hospedagem_servicos !!}</td>
            <td>{!! $cotacaoPacote->hospedagem_tipo !!}</td>
            <td>{!! $cotacaoPacote->hospedagem_solicitacoes !!}</td>
            <td>{!! $cotacaoPacote->hospedagem_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->transporte_interno !!}</td>
            <td>{!! $cotacaoPacote->tipos_transfer !!}</td>
            <td>{!! $cotacaoPacote->categorias_carro !!}</td>
            <td>{!! $cotacaoPacote->itens_carro !!}</td>
            <td>{!! $cotacaoPacote->transporte_interno_solicitacoes !!}</td>
            <td>{!! $cotacaoPacote->transporte_interno_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->passeios_interesses !!}</td>
            <td>{!! $cotacaoPacote->passeios_outros !!}</td>
            <td>{!! $cotacaoPacote->passeios_preco_desejado !!}</td>
            <td>{!! $cotacaoPacote->nomes_seguro_viagem !!}</td>
            <td>{!! $cotacaoPacote->datas_nascimento_seguro_viagem !!}</td>
            <td>{!! $cotacaoPacote->contato_nome_completo !!}</td>
            <td>{!! $cotacaoPacote->contato_nome_preferencia !!}</td>
            <td>{!! $cotacaoPacote->contato_email !!}</td>
            <td>{!! $cotacaoPacote->contato_telefone !!}</td>
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