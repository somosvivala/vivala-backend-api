<?php

namespace App\DataTables;

use App\Models\CotacaoPacote;
use Yajra\Datatables\Services\DataTable;

class CotacaoPacoteDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cotacao_pacotes.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cotacaoPacotes = CotacaoPacote::query();

        return $this->applyScopes($cotacaoPacotes);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax(['type' => 'POST', 'data' => '{"_method":"GET"}'])
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'origem' => ['name' => 'origem', 'data' => 'origem'],
            'destino' => ['name' => 'destino', 'data' => 'destino'],
            'data_ida' => ['name' => 'data_ida', 'data' => 'data_ida'],
            'data_volta' => ['name' => 'data_volta', 'data' => 'data_volta'],
            'datas_flexiveis' => ['name' => 'datas_flexiveis', 'data' => 'datas_flexiveis'],
            'qnt_adultos' => ['name' => 'qnt_adultos', 'data' => 'qnt_adultos'],
            'qnt_criancas' => ['name' => 'qnt_criancas', 'data' => 'qnt_criancas'],
            'qnt_bebes' => ['name' => 'qnt_bebes', 'data' => 'qnt_bebes'],
            'periodo_voo_ida' => ['name' => 'periodo_voo_ida', 'data' => 'periodo_voo_ida'],
            'periodo_voo_volta' => ['name' => 'periodo_voo_volta', 'data' => 'periodo_voo_volta'],
            'aeroporto_origem' => ['name' => 'aeroporto_origem', 'data' => 'aeroporto_origem'],
            'aeroporto_destino' => ['name' => 'aeroporto_destino', 'data' => 'aeroporto_destino'],
            'companias_aereas_preferenciais' => ['name' => 'companias_aereas_preferenciais', 'data' => 'companias_aereas_preferenciais'],
            'numero_paradas' => ['name' => 'numero_paradas', 'data' => 'numero_paradas'],
            'tempo_voo' => ['name' => 'tempo_voo', 'data' => 'tempo_voo'],
            'aereo_preco_desejado' => ['name' => 'aereo_preco_desejado', 'data' => 'aereo_preco_desejado'],
            'hotel_ou_regiao' => ['name' => 'hotel_ou_regiao', 'data' => 'hotel_ou_regiao'],
            'qnt_quartos' => ['name' => 'qnt_quartos', 'data' => 'qnt_quartos'],
            'tipo_quarto' => ['name' => 'tipo_quarto', 'data' => 'tipo_quarto'],
            'hospedagem_servicos' => ['name' => 'hospedagem_servicos', 'data' => 'hospedagem_servicos'],
            'hospedagem_tipo' => ['name' => 'hospedagem_tipo', 'data' => 'hospedagem_tipo'],
            'hospedagem_solicitacoes' => ['name' => 'hospedagem_solicitacoes', 'data' => 'hospedagem_solicitacoes'],
            'hospedagem_preco_desejado' => ['name' => 'hospedagem_preco_desejado', 'data' => 'hospedagem_preco_desejado'],
            'tipos_transfer' => ['name' => 'tipos_transfer', 'data' => 'tipos_transfer'],
            'categorias_carro' => ['name' => 'categorias_carro', 'data' => 'categorias_carro'],
            'itens_carro' => ['name' => 'itens_carro', 'data' => 'itens_carro'],
            'transporte_interno_solicitacoes' => ['name' => 'transporte_interno_solicitacoes', 'data' => 'transporte_interno_solicitacoes'],
            'transporte_interno_preco_desejado' => ['name' => 'transporte_interno_preco_desejado', 'data' => 'transporte_interno_preco_desejado'],
            'passeios_interesses' => ['name' => 'passeios_interesses', 'data' => 'passeios_interesses'],
            'passeios_outros' => ['name' => 'passeios_outros', 'data' => 'passeios_outros'],
            'passeios_preco_desejado' => ['name' => 'passeios_preco_desejado', 'data' => 'passeios_preco_desejado'],
            'datas_nascimento_seguro_viagem' => ['name' => 'datas_nascimento_seguro_viagem', 'data' => 'datas_nascimento_seguro_viagem'],

            'nome_completo' => ['name' => 'nome_completo', 'data' => 'nome_completo', 'title'=>'Nome'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'telefone' => ['name' => 'telefone', 'data' => 'telefone'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Data de Envio'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cotacaoPacotes';
    }
}
