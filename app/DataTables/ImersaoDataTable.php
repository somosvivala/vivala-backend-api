<?php

namespace App\DataTables;

use App\Models\Imersao;
use Yajra\Datatables\Services\DataTable;

class ImersaoDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($model) {
                return view('imersaos.datatables_actions')->with(['imersao' => $model, 'id' => $model->id]);
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $imersaos = Imersao::query();

        return $this->applyScopes($imersaos);
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
            ->addAction(['width' => '15%'])
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
            'link_destino' => ['name' => 'link_destino', 'data' => 'link_destino', 'title' => 'Link de destino'],
            'ativo_listagem' =>  ['name' => 'ativo_listagem', 'data' => 'stringAtivoListagem', 'title' => 'Aparece na listagem'],
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
        return 'imersaos';
    }
}
