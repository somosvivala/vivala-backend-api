@extends('emails.template-email')

@section('titulo', 'Nova cotação de Pacote Completo!')

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

            <!-- 1 - Para onde o cliente quer ir -->
            @include('emails.layouts.th', [
                'info1'=>'1 - Para onde o cliente quer ir.'
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
            @include('emails.layouts.td', [
                'info1'=>'As datas são flexíveis',
                'info2'=>$cotacao->temDatasFlexiveis
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

            <!-- 4 - Transporte Aéreo -->
            @include('emails.layouts.th', [
                'info1'=>'4 - Transporte Aéreo'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Horário de ida',
                'info2'=>$cotacao->periodo_voo_ida
            ])
            @include('emails.layouts.td', [
                'info1'=>'Horário de volta',
                'info2'=>$cotacao->periodo_voo_volta
            ])
            @include('emails.layouts.td', [
                'info1'=>'Aeroporto de origem',
                'info2'=>$cotacao->aeroporto_origem
            ])
            @include('emails.layouts.td', [
                'info1'=>'Aeroporto de retorno',
                'info2'=>$cotacao->aeroporto_destino
            ])
            @include('emails.layouts.td', [
                'info1'=>'Companhias aéreas de preferência',
                'info2'=>$cotacao->companias_aereas_preferenciais
            ])
            @include('emails.layouts.td', [
                'info1'=>'Número de paradas',
                'info2'=>$cotacao->numero_paradas
            ])
            @include('emails.layouts.td', [
                'info1'=>'Tempo de vôo',
                'info2'=>$cotacao->tempo_voo.' Horas'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Preço desejado',
                'info2'=>'R$ '.$cotacao->aereo_preco_desejado
            ])

            <!-- 5 - Hospedagem -->
            @include('emails.layouts.th', [
                'info1'=>'5 - Hospedagem'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Hotel ou região de preferência',
                'info2'=>$cotacao->hotel_ou_regiao
            ])
            @include('emails.layouts.td', [
                'info1'=>'Quantidade de quartos',
                'info2'=>$cotacao->qnt_quartos
            ])
            @include('emails.layouts.td', [
                'info1'=>'Tipo de quarto',
                'info2'=>$cotacao->tipo_quarto
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
                'info1'=>'Solicitações especiais',
                'info2'=>$cotacao->hospedagem_solicitacoes
            ])
            @include('emails.layouts.td', [
                'info1'=>'Preço desejado',
                'info2'=>'R$ '.$cotacao->hospedagem_preco_desejado
            ])

            <!-- 6 - Transporte Interno -->
            @if ($cotacao->transporte_interno !== null)
                @include('emails.layouts.th', [
                    'info1'=>'6 - Transporte Interno'
                ])

                @if (! $cotacao->transporte_interno)
                    @include('emails.layouts.td', [
                        'info1'=>'Transfer para o hotel',
                        'info2'=>$cotacao->tipos_transfer
                    ])
                @else
                    @include('emails.layouts.td', [
                        'info1'=>'Aluguel de carro categoria',
                        'info2'=>$cotacao->categorias_carro
                    ])
                    @include('emails.layouts.td', [
                        'info1'=>'Itens desejados',
                        'info2'=>$cotacao->itens_carro
                    ])
                    @include('emails.layouts.td', [
                        'info1'=>'Solicitações especiais',
                        'info2'=>$cotacao->transporte_interno_solicitacoes
                    ])
                    @include('emails.layouts.td', [
                        'info1'=>'Preço desejado',
                        'info2'=>'R$ '.$cotacao->transporte_interno_preco_desejado
                    ])
                @endif
            @endif

            <!-- 7 - Passeios e Experiências -->
            @include('emails.layouts.th', [
                'info1'=>'7 - Passeios e Experiências'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Interesses',
                'info2'=>$cotacao->passeios_interesses
            ])
            @include('emails.layouts.td', [
                'info1'=>'Outros passeios desejados',
                'info2'=>$cotacao->passeios_outros
            ])
            @include('emails.layouts.td', [
                'info1'=>'Preço desejado',
                'info2'=>'R$ '.$cotacao->passeios_preco_desejado
            ])

            <!-- 8 - Seguro Viagem -->
            @include('emails.layouts.th', [
                'info1'=>'8 - Seguro Viagem'
            ])
            @include('emails.layouts.td', [
                'info1'=>'Nomes dos segurados',
                'info2'=>$cotacao->nomes_seguro_viagem
            ])
            @include('emails.layouts.td', [
                'info1'=>'',
                'info2'=>$cotacao->datas_nascimento_seguro_viagem
            ])
        </tbody>
        </table>

        <!-- Footer -->
        <p style="font-size:12px; padding: 10px; font-family:'Titillium Web', sans-serif; font-weight:bold; text-align: center;    ">
            * mensagem automática gerada a partir do formulário de cotação de pacote completo *
        </p>
    </div>
</td>

@endsection
