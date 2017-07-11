@extends('emails.template-email')

@section('titulo', 'Novo interessado no programa de Agentes')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <p style="font-size:14px; font-weight:normal; margin-top:10px;">
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome completo: </span> {{ $contatoAgente->nome_completo }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Prefere ser chamado de: </span> {{ $contatoAgente->nome_preferencia }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span> {{ $contatoAgente->email }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span> {{ $contatoAgente->telefone }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Criado em: </span> {{ $contatoAgente->created_at->format('d/m/Y - H:i') }} <br>
                    </p>
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
