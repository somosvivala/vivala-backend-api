<?php

namespace App\DataTables\Scopes;

use Yajra\Datatables\Contracts\DataTableScopeContract;

class PorIdExpedicao implements DataTableScopeContract
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        $id_experiencia = request('id_experiencia');
        return $query->where('expedicao_id', $id_experiencia);
    }
}
