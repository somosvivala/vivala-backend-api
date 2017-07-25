<?php

namespace App\DataTables;

use App\Models\ContatoCorporativo;
use Form;
use Yajra\Datatables\Services\DataTable;

class ContatoCorporativoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'contato_corporativos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $contatoCorporativos = ContatoCorporativo::query();

        return $this->applyScopes($contatoCorporativos);
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
            'nome_contato' => ['name' => 'nome_contato', 'data' => 'nome_contato'],
            'email' => ['name' => 'email', 'data' => 'email'],
            'telefone' => ['name' => 'telefone', 'data' => 'telefone'],
            'nome_empresa' => ['name' => 'nome_empresa', 'data' => 'nome_empresa'],
            'numero_funcionarios' => ['name' => 'numero_funcionarios', 'data' => 'numero_funcionarios'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at', 'title' => 'Data de envio']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contatoCorporativos';
    }
}
