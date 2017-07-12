@extends('emails.template-email')

@section('titulo', 'Novo contato pelo formulário corporativo')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <p style="font-size:14px; font-weight:normal; margin-top:10px;">
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome do contato: </span> {{ $contatoCorporativo->nome_contato }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome da empresa: </span> {{ $contatoCorporativo->nome_empresa }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Numero de funcionários: </span> {{ $contatoCorporativo->numero_funcionarios }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span> {{ $contatoCorporativo->email }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span> {{ $contatoCorporativo->telefone }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Mensagem: </span> {{ $contatoCorporativo->mensagem }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Contato enviado em: </span> {{ $contatoCorporativo->created_at->format('d/m/Y - H:i') }} <br>
                    </p>
                    <br> <hr>
                    <p style="font-size:12px; font-family:'Titillium Web', sans-serif; font-weight:bold; margin-top:0px;">
                        * mensagem automática gerada a partir do formulário de contato corporativo*
                    </p>

                </td>
            </tr>
        </tbody>
        </table>
    </div>
</td>

@endsection
