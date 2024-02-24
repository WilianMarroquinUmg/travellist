<?php

namespace App\Repositories;

use App\Models\Cuenta;
use App\Repositories\BaseRepository;

class CuentaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'Id_Cliente',
        'Saldo',
        'Fecha_Apertura',
        'tipo_cuenta_id',
        'Estado',
        'moneda_id',
        'no_cuenta'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cuenta::class;
    }
}
