<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    public $table = 'cuenta';

    public $fillable = [
        'Id_Cliente',
        'Saldo',
        'Fecha_Apertura',
        'tipo_cuenta_id',
        'Estado',
        'moneda_id',
        'no_cuenta'
    ];

    protected $casts = [
        'Saldo' => 'float',
        'Fecha_Apertura' => 'date',
        'Estado' => 'string',
        'no_cuenta' => 'string'
    ];

    public static array $rules = [
        'Id_Cliente' => 'required',
        'Saldo' => 'required|numeric',
        'Fecha_Apertura' => 'required',
        'tipo_cuenta_id' => 'required',
        'Estado' => 'required|string|max:255',
        'moneda_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'no_cuenta' => 'required|string|max:255'
    ];

    public function tipoCuenta(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoCuentum::class, 'tipo_cuenta_id');
    }

    public function moneda(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoMoneda::class, 'moneda_id');
    }

    public function idCliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'Id_Cliente');
    }

    public function movimientos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Movimiento::class, 'Id_Cuenta');
    }
}
