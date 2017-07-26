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
                        {{ $cotacao_aereos->nome_completo }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Prefere ser chamado de: </span>
                        {{ $cotacao_aereos->nome_preferencia }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span>
                        {{ $cotacao_aereos->email }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span>
                        {{ $cotacao_aereos->telefone }}<br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Contato enviado em: </span>
                        {{ $cotacao_aereos->created_at->format('d/m/Y - H:i') }}<br>
                    </p>

                    <p style="font-size:18px; font-weight:normal; margin-top:10px; text-align: left;">
                        <span style="font-family:'Titillium Web', sans-serif;">1 - Para onde você quer ir?</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Origem: </span>
                        {{ $cotacao_aereos->origem }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Destino: </span>
                        {{ $cotacao_aereos->destino }}<br><br>

                        <span style="font-family:'Titillium Web', sans-serif;">2 - Quando você quer ir?</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Ida: </span>
                        {{ $cotacao_aereos->data_ida }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Volta: </span>
                        {{ $cotacao_aereos->data_volta }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Estas datas são flexíveis: </span>
                        {{ $cotacao_aereos->datas_flexiveis }}<br><br>

                        <span style="font-family:'Titillium Web', sans-serif;">3 - Com quem você quer ir?</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Adultos: </span>
                        {{ $cotacao_aereos->qnt_adultos }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Crianças: </span>
                        {{ $cotacao_aereos->qnt_criancas }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Bebês: </span>
                        {{ $cotacao_aereos->qnt_bebes }}<br><br>

                        <span style="font-family:'Titillium Web', sans-serif;">4 - Transporte Aéreo</span><br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Horário de ida: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Horário de volta: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Aeroporto de origem: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Aeroporto de retorno: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Companhias aéreas de preferência: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Número de paradas: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Tempo de vôo: </span>
                        {{ $cotacao_aereos-> }}<br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Preço desejado: </span>
                        {{ $cotacao_aereos-> }}<br>
                    </p>

                    <br><hr>
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
