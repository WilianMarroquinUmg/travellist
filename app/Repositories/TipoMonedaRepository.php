<?php

namespace App\Repositories;

use App\Models\TipoMoneda;
use App\Repositories\BaseRepository;

class TipoMonedaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'estado',
        'simbolo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TipoMoneda::class;
    }
}
