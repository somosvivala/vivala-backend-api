<?php

namespace App\DataTables;

use App\Models\InscricaoExperiencia;
use Yajra\Datatables\Services\DataTable;

class InscricaoExperienciaDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'inscricao_experiencias.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $inscricaoExperiencias = InscricaoExperiencia::query();

        return $this->applyScopes($inscricaoExperiencias);
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
            'nome_status' => ['name' => 'nome_status', 'title' => 'Status', 'data' => 'nome_status'],
            'nome' => ['name' => 'nome', 'data' => 'nome'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'telefone' => ['name' => 'telefone', 'data' => 'telefone'],
            'created_at' => ['name' => 'created_at', 'title' => 'Data inscrição', 'data' => 'created_at'],
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
        return 'inscricaoExperiencias';
    }
}
