@extends('emails.template-email')

@section('titulo', 'Nova cotação de Aéreo!')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <h3 style="font-family:'Titillium Web', sans-serif;">Informações preenchidas pelo formulário do site.</h3>

                    <p style="font-size:18px; font-weight:normal; margin-top:10px; text-align: left;">
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome completo: </span>
                        {{ $cotacao->nome_completo }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Prefere ser chamado de: </span>
                        {{ $cotacao->nome_preferencia }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span>
                        {{ $cotacao->email }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span>
                        {{ $cotacao->telefone }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Contato enviado em: </span>
                        {{ $cotacao->created_at->format('d/m/Y - H:i') }}<br>
                    </p>

                    <p style="font-size:18px; font-weight:normal; margin-top:10px; text-align: left;">
                        <span style="font-family:'Titillium Web', sans-serif;">1 - Para onde você quer ir?</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Origem: </span>
                        {{ $cotacao->origem }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Destino: </span>
                        {{ $cotacao->destino }}<br><br>

                        <span style="font-family:'Titillium Web', sans-serif;">2 - Quando você quer ir?</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Ida: </span>
                        {{ $cotacao->data_ida }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Volta: </span>
                        {{ $cotacao->data_volta }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Estas datas são flexíveis: </span>
                        {{ $cotacao->datas_flexiveis }}<br><br>

                        <span style="font-family:'Titillium Web', sans-serif;">3 - Com quem você quer ir?</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Adultos: </span>
                        {{ $cotacao->qnt_adultos }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Crianças: </span>
                        {{ $cotacao->qnt_criancas }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Bebês: </span>
                        {{ $cotacao->qnt_bebes }}<br><br>

                        <span style="font-family:'Titillium Web', sans-serif;">4 - Transporte Aéreo</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Horário de ida: </span>
                        {{ $cotacao->periodo_voo_ida }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Horário de volta: </span>
                        {{ $cotacao->periodo_voo_volta }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Aeroporto de origem: </span>
                        {{ $cotacao->aeroporto_origem }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Aeroporto de retorno: </span>
                        {{ $cotacao->aeroporto_retorno }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Companhias aéreas de preferência: </span>
                        {{ $cotacao->companias_aereas_preferenciais }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Número de paradas: </span>
                        {{ $cotacao->numero_paradas }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Tempo de vôo: </span>
                        {{ $cotacao->tempo_voo }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Preço desejado: </span>
                        {{ $cotacao->aereo_preco_desejado }}<br>
                    </p>

                    <br><hr>
                    <p style="font-size:12px; font-family:'Titillium Web', sans-serif; font-weight:bold; margin-top:0px;">
                        * mensagem automática gerada a partir do formulário de cotação de aéreo *
                    </p>

                </td>
            </tr>
        </tbody>
        </table>
    </div>
</td>

@endsection
