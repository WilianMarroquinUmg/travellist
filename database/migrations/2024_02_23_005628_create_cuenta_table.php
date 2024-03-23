<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_Cliente');
            $table->float('Saldo', 0, 0);
            $table->date('Fecha_Apertura');
            $table->unsignedBigInteger('tipo_cuenta_id');
            $table->enum('Estado', ['Activo', 'Inactivo']);
            $table->unsignedBigInteger('moneda_id');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
            $table->string('no_cuenta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta');
    }
};
