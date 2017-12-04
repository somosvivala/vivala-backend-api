<?php

namespace App\DataTables;

use App\Models\CotacaoRodoviario;
use Yajra\Datatables\Services\DataTable;

class CotacaoRodoviarioDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'cotacao_rodoviarios.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $cotacaoRodoviarios = CotacaoRodoviario::query();

        return $this->applyScopes($cotacaoRodoviarios);
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
            'origem' => ['name' => 'origem',  'visible' => false, 'data' => 'origem'],
            'destino' => ['name' => 'destino', 'data' => 'destino'],
            'data_ida' => ['name' => 'data_ida', 'data' => 'data_ida'],
            'data_volta' => ['name' => 'data_volta', 'data' => 'data_volta'],
            'sem_volta' => ['name' => 'sem_volta', 'data' => 'sem_volta', 'title' => 'Somente Ida?'],
            'datas_flexiveis' => ['name' => 'datas_flexiveis', 'data' => 'datas_flexiveis', 'title' => 'Datas Flexíveis'],
            'qnt_passageiros' => ['name' => 'qnt_passageiros', 'data' => 'qnt_passageiros'],
            'hora_ida' => ['name' => 'hora_ida', 'data' => 'hora_ida'],
            'hora_volta' => ['name' => 'hora_volta', 'data' => 'hora_volta'],
            'companias_preferenciais' => ['name' => 'companias_preferenciais', 'data' => 'companias_preferenciais', 'title' => 'Companhias Preferenciais'],
            'duracao_maxima' => ['name' => 'duracao_maxima', 'data' => 'duracao_maxima', 'title' => 'Duração Máxima'],
            'solicitacoes' => ['name' => 'solicitacoes', 'data' => 'solicitacoes', 'title' => 'Solicitações'],
            'nome_completo' => ['name' => 'nome_completo', 'data' => 'nome_completo'],
            'nome_preferencia' => ['name' => 'nome_preferencia', 'data' => 'nome_preferencia', 'title' => 'Nome Preferência'],
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
        return 'cotacaoRodoviarios';
    }
}
