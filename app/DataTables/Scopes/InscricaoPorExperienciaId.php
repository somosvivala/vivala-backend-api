<?php

namespace App\DataTables\Scopes;

use Yajra\Datatables\Contracts\DataTableScopeContract;

class InscricaoPorExperienciaId implements DataTableScopeContract
{
    public $experienciaId;

    public function __construct($idExperiencia)
    {
        $this->experienciaId = $idExperiencia;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('experiencia_id', $this->experienciaId);
    }
}
