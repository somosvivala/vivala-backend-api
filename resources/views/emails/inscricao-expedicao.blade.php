@extends('emails.template-email')

@section('titulo', 'Nova inscrição na '.$inscricao->expedicao->titulo)

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display:block; margin:0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0; margin-top:10px;">
        <tbody>
            <tr align="center">
                <td align="center" style="text-align:center;">
                    <p style="font-size:14px; font-weight:normal; margin-top:10px;">
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Nome do inscrito: </span> {{ $inscricao->nome }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Email: </span> {{ $inscricao->email }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Telefone: </span> {{ $inscricao->telefone }} <br>
                        <span style="font-family:'Titillium Web', sans-serif; font-weight:bold;">Data de inscrição: </span> {{ $inscricao->created_at->format('d/m/Y - H:i') }} <br>
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
