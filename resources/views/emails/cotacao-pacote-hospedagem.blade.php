@extends('emails.template-email')

@section('titulo', 'Nova cotação de Hospedagem!')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <h3 style="font-family:'Titillium Web', sans-serif;">Dados do cliente:</h3>

                    <p style="font-size:18px; font-weight:normal; margin-top:10px; text-align: left;">
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome completo: </span>
                        <br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Prefere ser chamado de: </span>
                        <br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span>
                        <br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span>
                        <br>

                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Contato enviado em: </span>
                        <br>
                    </p>

                    <p style="font-size:18px; font-weight:normal; margin-top:10px; text-align: left;">
                        <span style="font-family:'Titillium Web', sans-serif;">1 - Para onde você quer ir?</span><br>

                        <span style="font-family:'Titillium Web', sans-serif;">2 - Quando você quer ir?</span><br>

                        <span style="font-family:'Titillium Web', sans-serif;">3 - Com quem você quer ir?</span><br>

                        <span style="font-family:'Titillium Web', sans-serif;">4 - Tipo de Quarto?</span><br>

                        <span style="font-family:'Titillium Web', sans-serif;">5 - Quantidade de Quartos?</span><br>

                        <span style="font-family:'Titillium Web', sans-serif;">6 - Serviços Incluídos Desejados</span><br>
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
