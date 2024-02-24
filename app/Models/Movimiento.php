<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    public $table = 'movimientos';

    public $fillable = [
        'Id_Cuenta',
        'Saldo_Inicial',
        'Saldo_Final',
        'Monto',
        'Fecha_Mov',
        'Id_TipoMov'
    ];

    protected $casts = [
        'Saldo_Inicial' => 'float',
        'Saldo_Final' => 'float',
        'Monto' => 'float',
        'Fecha_Mov' => 'date'
    ];

    public static array $rules = [
        'Id_Cuenta' => 'required',
        'Saldo_Inicial' => 'required|numeric',
        'Saldo_Final' => 'required|numeric',
        'Monto' => 'required|numeric',
        'Fecha_Mov' => 'required',
        'Id_TipoMov' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function idTipomov(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoMovimiento::class, 'Id_TipoMov');
    }

    public function idCuenta(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cuentum::class, 'Id_Cuenta');
    }
}
