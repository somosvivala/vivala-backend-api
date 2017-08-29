<?php

namespace App\DataTables;

use App\Models\ContatoGeral;
use Yajra\Datatables\Services\DataTable;

class ContatoGeralDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'contato_gerals.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $contatoGerals = ContatoGeral::query();

        return $this->applyScopes($contatoGerals);
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
        return 'contatoGerals';
    }
}
