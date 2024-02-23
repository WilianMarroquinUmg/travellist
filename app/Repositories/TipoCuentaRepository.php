<?php

namespace App\Repositories;

use App\Models\TipoCuenta;
use App\Repositories\BaseRepository;

class TipoCuentaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'descripcion'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TipoCuenta::class;
    }
}
