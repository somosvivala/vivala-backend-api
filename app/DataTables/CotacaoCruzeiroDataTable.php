<?php

namespace App\DataTables;

use App\Models\CotacaoCruzeiro;
use Yajra\Datatables\Services\DataTable;

class CotacaoCruzeiroDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cotacao_cruzeiros.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cotacaoCruzeiros = CotacaoCruzeiro::query();

        return $this->applyScopes($cotacaoCruzeiros);
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
            'origem' => ['name' => 'origem', 'data' => 'origem'],
            'destino' => ['name' => 'destino', 'data' => 'destino'],
            'data_ida' => ['name' => 'data_ida', 'data' => 'data_ida'],
            'data_volta' => ['name' => 'data_volta', 'data' => 'data_volta'],
            'datas_flexiveis' => ['name' => 'datas_flexiveis', 'data' => 'datas_flexiveis', 'title' => 'Datas Flexíveis'],
            'qnt_adultos' => ['name' => 'qnt_adultos', 'data' => 'qnt_adultos'],
            'qnt_criancas' => ['name' => 'qnt_criancas', 'data' => 'qnt_criancas', 'title' => 'Qnt Crianças'],
            'qnt_bebes' => ['name' => 'qnt_bebes', 'data' => 'qnt_bebes', 'title' => 'Qnt Bebês'],
            'preco_desejado' => ['name' => 'preco_desejado', 'data' => 'preco_desejado', 'title' => 'Preço Desejado'],
            'companias_preferenciais' => ['name' => 'companias_preferenciais', 'data' => 'companias_preferenciais', 'title' => 'Companhias Preferenciais'],
            'max_dias' => ['name' => 'max_dias', 'data' => 'max_dias'],
            'solicitacoes' => ['name' => 'solicitacoes', 'data' => 'solicitacoes', 'title' => 'Solicitações'],
            'nome_completo' => ['name' => 'nome_completo', 'data' => 'nome_completo'],
            'nome_preferencia' => ['name' => 'nome_preferencia', 'data' => 'nome_preferencia', 'title' => 'Nome Preferência'],
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
        return 'cotacaoCruzeiros';
    }
}
