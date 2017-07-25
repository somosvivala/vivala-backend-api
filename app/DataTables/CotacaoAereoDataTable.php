<?php

namespace App\DataTables;

use App\Models\CotacaoAereo;
use Form;
use Yajra\Datatables\Services\DataTable;

class CotacaoAereoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cotacao_aereos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cotacaoAereos = CotacaoAereo::query();

        return $this->applyScopes($cotacaoAereos);
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
            'periodo_voo_ida' => ['name' => 'periodo_voo_ida', 'data' => 'periodo_voo_ida'],
            'periodo_voo_volta' => ['name' => 'periodo_voo_volta', 'data' => 'periodo_voo_volta'],
            'aeroporto_origem' => ['name' => 'aeroporto_origem', 'data' => 'aeroporto_origem'],
            'aeroporto_retorno' => ['name' => 'aeroporto_retorno', 'data' => 'aeroporto_retorno'],
            'companias_aereas_preferenciais' => ['name' => 'companias_aereas_preferenciais', 'data' => 'companias_aereas_preferenciais'],
            'numero_paradas' => ['name' => 'numero_paradas', 'data' => 'numero_paradas'],
            'tempo_voo' => ['name' => 'tempo_voo', 'data' => 'tempo_voo'],
            'aereo_preco_desejado' => ['name' => 'aereo_preco_desejado', 'data' => 'aereo_preco_desejado'],
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
        return 'cotacaoAereos';
    }
}