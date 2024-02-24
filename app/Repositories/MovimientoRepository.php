<?php

namespace App\Repositories;

use App\Models\Movimiento;
use App\Repositories\BaseRepository;

class MovimientoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'Id_Cuenta',
        'Saldo_Inicial',
        'Saldo_Final',
        'Monto',
        'Fecha_Mov',
        'Id_TipoMov'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Movimiento::class;
    }
}
