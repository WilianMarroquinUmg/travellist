<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'cliente';

    public $fillable = [
        'Nombre',
        'Apellido',
        'Direccion',
        'Telefono',
        'Fecha_Nac',
        'Estado',
        'dpi'
    ];

    protected $casts = [
        'Nombre' => 'string',
        'Apellido' => 'string',
        'Direccion' => 'string',
        'Fecha_Nac' => 'date',
        'Estado' => 'string'
    ];

    public static array $rules = [
        'Nombre' => 'required|string|max:255',
        'Apellido' => 'required|string|max:255',
        'Direccion' => 'required|string|max:255',
        'Telefono' => 'required',
        'Fecha_Nac' => 'required',
        'Estado' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'dpi' => 'nullable'
    ];

    public function cuenta(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Cuentum::class, 'Id_Cliente');
    }
}
