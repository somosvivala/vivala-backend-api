@extends('emails.template-email')

@section('titulo', 'Nova cotação de pacote completo!')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <h3>Dados do cliente:</h3>
<p style="font-size:14px; font-weight:normal; margin-top:10px;">

<span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome completo: </span> {{ $cotacao->nome_completo }} <br>
<span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Prefere ser chamado de: </span> {{ $cotacao->nome_preferencia }} <br>
<span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span> {{ $cotacao->email }} <br>
<span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span> {{ $cotacao->telefone }} <br>
<span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Contato enviado em: </span> {{ $cotacao->created_at->format('d/m/Y - H:i') }} <br>
</p>

<span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">origem</span> {{ $cotacao->origem }} <br>
'destino',
'data_ida',
'data_volta',
'datas_flexiveis',
'qnt_adultos',
'qnt_criancas',
'qnt_bebes',
'periodo_voo_ida',
'periodo_voo_volta',
'aeroporto_origem',
'aeroporto_retorno',
'companias_aereas_preferenciais',
'numero_paradas',
'tempo_voo',
'aereo_preco_desejado',
'hotel_ou_regiao',
'qnt_quartos',
'tipo_quarto',
'hospedagem_servicos',
'hospedagem_tipo',
'hospedagem_solicitacoes',
'hospedagem_preco_desejado',
'transporte_interno',
'tipos_transfer',
'categorias_carro',
'itens_carro',
'transporte_interno_solicitacoes',
'transporte_interno_preco_desejado',
'passeios_interesses',
'passeios_outros',
'passeios_preco_desejado',
'nomes_seguro_viagem',
'datas_nascimento_seguro_viagem',
'nome_completo',
'nome_preferencia',
'email',
'telefone'



                    <br> <hr>
                    <p style="font-size:12px; font-family:'Titillium Web', sans-serif; font-weight:bold; margin-top:0px;">
                        * mensagem automática gerada a partir do formulário de contato de agentes*
                    </p>

                </td>
            </tr>
        </tbody>
        </table>
    </div>
</td>

@endsection
