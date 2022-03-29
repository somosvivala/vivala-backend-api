<?php

namespace App\DataTables\Scopes;

use Yajra\Datatables\Contracts\DataTableScopeContract;

class InscricaoPorExpedicaoId implements DataTableScopeContract
{
    public $expedicaoId;

    public function __construct($idExpedicao)
    {
        $this->expedicaoId = $idExpedicao;
    }

    /**
     * Apply a query scope.
     *
     * @param  \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('expedicao_id', $this->expedicaoId);
    }
}
