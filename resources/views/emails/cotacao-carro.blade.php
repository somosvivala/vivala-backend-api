@extends('emails.template-email')

@section('titulo', 'Nova cotação de aluguel de carro!')

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
                'info1'=>'Retirada',
                'info2'=>$cotacao->cidade_retirada
            ])
            @include('emails.layouts.td', [
                'info1'=>'Devolução',
                'info2'=>$cotacao->cidade_devolucao
            ])

            <!-- 2 - Quando o cliente quer ir -->
            @include('emails.layouts.th', [
                'info1'=>'Datas'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Data de retirada',
                'info2'=>$cotacao->dataRetiradaFormatada
            ])
            @include('emails.layouts.td', [
                'info1'=>'Hora de retirada',
                'info2'=>$cotacao->hora_retirada
            ])
            @include('emails.layouts.td', [
                'info1'=>'Data de devolução',
                'info2'=>$cotacao->dataDevolucaoFormatada
            ])
            @include('emails.layouts.td', [
                'info1'=>'Hora de devolução',
                'info2'=>$cotacao->hora_devolucao
            ])

            <!-- 3 - Com quem o cliente quer ir. -->
            @include('emails.layouts.th', [
                'info1'=>'Especificações'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Categorias',
                'info2'=>$cotacao->categorias_carro
            ])
            @include('emails.layouts.td', [
                'info1'=>'Itens desejados',
                'info2'=>$cotacao->itens_carro
            ])

            <!-- 4 - Outras opções  -->
            @include('emails.layouts.th', [
                'info1'=>'Outras opções'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Preço desejado',
                'info2'=>"R$ " . $cotacao->preco_desejado_carro
            ])
            @include('emails.layouts.td', [
                'info1'=>'Solicitações',
                'info2'=>$cotacao->solicitacoes_carro
            ])


        </tbody>
        </table>

        <!-- Footer -->
        <p style="font-size:12px; padding: 10px; font-family:'Titillium Web', sans-serif; font-weight:bold; text-align: center;    ">
            * mensagem automática gerada a partir do formulário de cotação de aluguel de carros *
        </p>
    </div>
</td>

@endsection
