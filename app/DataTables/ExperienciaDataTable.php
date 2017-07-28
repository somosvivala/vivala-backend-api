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
            'titulo' => ['name' => 'titulo', 'data' => 'titulo'],
            'descricao_listagem' => ['name' => 'descricao_listagem', 'data' => 'descricao_listagem'],
            'data_inicio' => ['name' => 'data_inicio', 'data' => 'data_inicio'],
            'data_fim' => ['name' => 'data_fim', 'data' => 'data_fim'],
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
