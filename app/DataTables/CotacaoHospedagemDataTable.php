<?php

namespace App\DataTables;

use App\Models\CotacaoHospedagem;
use Yajra\Datatables\Services\DataTable;

class CotacaoHospedagemDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cotacao_hospedagems.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cotacaoHospedagems = CotacaoHospedagem::query();

        return $this->applyScopes($cotacaoHospedagems);
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
                    [
                        'extend' => 'print',
                        'text'    => '<i class="fa fa-print"></i> Imprimir',
                    ],

                    [
                        'extend' => 'reload',
                        'text'    => '<i class="fa fa-refresh"></i> Atualizar',
                    ],
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Exportar',
                         'buttons' => [
                             'csv',
                             'excel',
                         ],
                    ],
                    [
                        'extend' => 'colvis',
                        'text'    => 'Filtrar Colunas',
                    ],
                ],
                'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'],
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
            'hotel_ou_regiao' => ['name' => 'hotel_ou_regiao', 'data' => 'hotel_ou_regiao', 'title' => 'Hotel ou Região'],
            'data_ida' => ['name' => 'data_ida', 'data' => 'data_ida'],
            'data_volta' => ['name' => 'data_volta', 'data' => 'data_volta'],
            'qnt_adultos' => ['name' => 'qnt_adultos', 'data' => 'qnt_adultos'],
            'qnt_criancas' => ['name' => 'qnt_criancas', 'data' => 'qnt_criancas'],
            'qnt_bebes' => ['name' => 'qnt_bebes', 'data' => 'qnt_bebes'],
            'tipo_quarto' => ['name' => 'tipo_quarto', 'data' => 'tipo_quarto'],
            'qnt_quartos' => ['name' => 'qnt_quartos', 'data' => 'qnt_quartos'],
            'hospedagem_servicos' => ['name' => 'hospedagem_servicos', 'data' => 'hospedagem_servicos'],
            'hospedagem_tipo' => ['name' => 'hospedagem_tipo', 'data' => 'hospedagem_tipo'],
            'hospedagem_solicitacoes' => ['name' => 'hospedagem_solicitacoes', 'data' => 'hospedagem_solicitacoes'],
            'hospedagem_preco_desejado' => ['name' => 'hospedagem_preco_desejado', 'data' => 'hospedagem_preco_desejado', 'title' => 'Preço Desejado'],
            'nome_completo' => ['name' => 'nome_completo', 'data' => 'nome_completo', 'title' => 'Nome'],
            'nome_preferencia' => ['name' => 'nome_preferencia', 'data' => 'nome_preferencia'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'telefone' => ['name' => 'telefone', 'data' => 'telefone'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Data Envio'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cotacaoHospedagems';
    }
}
