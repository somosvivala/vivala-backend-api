@extends('emails.template-email')

@section('titulo', 'Nova cotação de Seguro Viagem!')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display: block; margin: 0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0;">
        <tbody>
            <!-- Informações preenchidas pelo formulário do site. -->
            @include('emails.layouts.th', [
                'info1'=>'Informações do contato'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Nome completo',
                'info2'=>$cotacao->nome_completo
            ])
            @include('emails.layouts.td', [
                'info1'=>'Prefere ser chamado de',
                'info2'=>$cotacao->nome_preferencia
            ])
            @include('emails.layouts.td', [
                'info1'=>'Email',
                'info2'=>$cotacao->email
            ])
            @include('emails.layouts.td', [
                'info1'=>'Telefone',
                'info2'=>$cotacao->telefone
            ])
            @include('emails.layouts.td', [
                'info1'=>'Pedido de cotação criado em',
                'info2'=>$cotacao->created_at->format('d/m/Y - H:i')
            ])

            <!-- 1 - Para onde o cliente quer ir -->
            @include('emails.layouts.th', [
                'info1'=>'Locais'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Origem',
                'info2'=>$cotacao->origem
            ])
            @include('emails.layouts.td', [
                'info1'=>'Destino',
                'info2'=>$cotacao->destino
            ])

            <!-- 2 - Quando o cliente quer ir -->
            @include('emails.layouts.th', [
                'info1'=>'Datas'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Data de ida',
                'info2'=>$cotacao->dataIdaFormatada
            ])
            @include('emails.layouts.td', [
                'info1'=>'Data de volta',
                'info2'=>$cotacao->dataVoltaFormatada
            ])

            <!-- 3 - Com quem o cliente quer ir. -->
            @include('emails.layouts.th', [
                'info1'=>'Pessoas'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Datas de nascimento',
                'info2'=>$cotacao->datas_nascimento_seguro_viagem
            ])

            <!-- 4 - Outras opções  -->
            @include('emails.layouts.th', [
                'info1'=>'Especificações'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Envolve esportes radicais',
                'info2'=>$cotacao->envolveEsportesRadicais
            ])
            @include('emails.layouts.td', [
                'info1'=>'Solicitações',
                'info2'=>$cotacao->solicitacoes
            ])

        </tbody>
        </table>

        <!-- Footer -->
        <p style="font-size:12px; padding: 10px; font-family:'Titillium Web', sans-serif; font-weight:bold; text-align: center;    ">
            * mensagem automática gerada a partir do formulário de cotação de seguro viagem *
        </p>
    </div>
</td>

@endsection
