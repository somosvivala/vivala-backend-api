<?php

namespace App\DataTables;

use App\Models\CotacaoCruzeiro;
use Form;
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
            'origem' => ['name' => 'origem', 'data' => 'origem'],
            'destino' => ['name' => 'destino', 'data' => 'destino'],
            'data_ida' => ['name' => 'data_ida', 'data' => 'data_ida'],
            'data_volta' => ['name' => 'data_volta', 'data' => 'data_volta'],
            'datas_flexiveis' => ['name' => 'datas_flexiveis', 'data' => 'datas_flexiveis'],
            'qnt_adultos' => ['name' => 'qnt_adultos', 'data' => 'qnt_adultos'],
            'qnt_criancas' => ['name' => 'qnt_criancas', 'data' => 'qnt_criancas'],
            'qnt_bebes' => ['name' => 'qnt_bebes', 'data' => 'qnt_bebes'],
            'preco_desejado' => ['name' => 'preco_desejado', 'data' => 'preco_desejado'],
            'companias_preferenciais' => ['name' => 'companias_preferenciais', 'data' => 'companias_preferenciais'],
            'max_dias' => ['name' => 'max_dias', 'data' => 'max_dias'],
            'solicitacoes' => ['name' => 'solicitacoes', 'data' => 'solicitacoes'],
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
        return 'cotacaoCruzeiros';
    }
}
