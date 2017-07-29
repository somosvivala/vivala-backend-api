@extends('emails.template-email')

@section('titulo', 'Nova cotação de Hospedagem!')

@section('conteudo')

<td bgcolor="#FFFFFF" style="clear:both!important; display:block!important; margin:0 auto!important; max-width:600px!important; padding:20px 30px 0 30px;">
    <div style="display: block; margin: 0 auto; max-width:600px;">
        <table style="width: 100%; padding-bottom:0;">
        <tbody>
            <!-- Informações preenchidas pelo formulário do site. -->
            @include('emails.layouts.th', [
                'info1'=>'Informações preenchidas pelo formulário do site.'
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
                'info1'=>'Contato enviado em',
                'info2'=>$cotacao->created_at->format('d/m/Y - H:i')
            ])

            <!-- 2 - Quando o cliente quer ir. -->
            @include('emails.layouts.th', [
                'info1'=>'2 - Quando o cliente quer ir.'
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
                'info1'=>'3 - Com quem o cliente quer ir.'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Número de adultos:',
                'info2'=>$cotacao->qnt_adultos
            ])
            @include('emails.layouts.td', [
                'info1'=>'Número de crianças:',
                'info2'=>$cotacao->qnt_criancas
            ])
            @include('emails.layouts.td', [
                'info1'=>'Número de bebês:',
                'info2'=>$cotacao->qnt_bebes
            ])

            <!-- 4 - Tipo de Quarto -->
            @include('emails.layouts.th', [
                'info1'=>'5 - Hospedagem'
            ])
            @include('emails.layouts.td', [
                'info1'=>'4 - Tipo de Quarto',
                'info2'=>$cotacao->tipo_quarto
            ])

            <!-- 5 - Quantidade de Quartos -->
            @include('emails.layouts.th', [
                'info1'=>'5 - Quantidade de Quartos'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Quantidade de quartos',
                'info2'=>$cotacao->qnt_quartos
            ])

            <!-- 6 - Serviços Incluídos Desejados -->
            @include('emails.layouts.th', [
                'info1'=>'6 - Serviços Incluídos Desejados'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Serviços incluídos desejados',
                'info2'=>$cotacao->hospedagem_servicos
            ])
            @include('emails.layouts.td', [
                'info1'=>'Tipo de hospedagem',
                'info2'=>$cotacao->hospedagem_tipo
            ])
            @include('emails.layouts.td', [
                'info1'=>'Preço desejado',
                'info2'=>'R$ '.$cotacao->hospedagem_preco_desejado
            ])
            @include('emails.layouts.td', [
                'info1'=>'Solicitações especiais',
                'info2'=>$cotacao->hospedagem_solicitacoes
            ])

        </tbody>
        </table>

        <!-- Footer -->
        <p style="font-size:12px; padding: 10px; font-family:'Titillium Web', sans-serif; font-weight:bold; text-align: center;    ">
            * mensagem automática gerada a partir do formulário de cotação de hospedagem *
        </p>
    </div>
</td>

@endsection
