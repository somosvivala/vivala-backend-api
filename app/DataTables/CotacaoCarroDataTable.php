<?php

namespace App\DataTables;

use App\Models\CotacaoCarro;
use Form;
use Yajra\Datatables\Services\DataTable;

class CotacaoCarroDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cotacao_carros.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cotacaoCarros = CotacaoCarro::query();

        return $this->applyScopes($cotacaoCarros);
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
            ->ajax('')
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
                    'colvis'
                ]
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
            'cidade_retirada' => ['name' => 'cidade_retirada', 'data' => 'cidade_retirada'],
            'cidade_devolucao' => ['name' => 'cidade_devolucao', 'data' => 'cidade_devolucao'],
            'data_retirada' => ['name' => 'data_retirada', 'data' => 'data_retirada'],
            'data_devolucao' => ['name' => 'data_devolucao', 'data' => 'data_devolucao'],
            'categorias_carro' => ['name' => 'categorias_carro', 'data' => 'categorias_carro'],
            'itens_carro' => ['name' => 'itens_carro', 'data' => 'itens_carro'],
            'solicitacoes_carro' => ['name' => 'solicitacoes_carro', 'data' => 'solicitacoes_carro'],
            'preco_desejado_carro' => ['name' => 'preco_desejado_carro', 'data' => 'preco_desejado_carro'],
            'nome_completo' => ['name' => 'nome_completo', 'data' => 'nome_completo'],
            'nome_preferencia' => ['name' => 'nome_preferencia', 'data' => 'nome_preferencia'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'telefone' => ['name' => 'telefone', 'data' => 'telefone']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cotacaoCarros';
    }
}
