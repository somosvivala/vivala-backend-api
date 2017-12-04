<?php

namespace App\DataTables;

use App\Models\Experiencia;
use Yajra\Datatables\Services\DataTable;

class ExperienciaDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'experiencias.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $experiencias = Experiencia::query();

        return $this->applyScopes($experiencias);
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
            'titulo' => ['name' => 'titulo', 'data' => 'titulo', 'title' => 'Título'],
            'descricao_listagem' => ['name' => 'descricao_listagem', 'data' => 'descricao_listagem', 'title' => 'Descrição Listagem'],
            'data_inicio' => ['name' => 'data_inicio', 'data' => 'data_inicio', 'title' => 'Data Início'],
            'data_fim' => ['name' => 'data_fim', 'data' => 'data_fim'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Criada em'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'experiencias';
    }
}
