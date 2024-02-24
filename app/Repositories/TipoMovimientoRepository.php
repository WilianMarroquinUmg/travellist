<?php

namespace App\Repositories;

use App\Models\TipoMovimiento;
use App\Repositories\BaseRepository;

class TipoMovimientoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'Descripcion'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TipoMovimiento::class;
    }
}
