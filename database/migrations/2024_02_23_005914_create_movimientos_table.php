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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Id_Cuenta');
            $table->float('Saldo_Inicial', 0, 0);
            $table->float('Saldo_Final', 0, 0);
            $table->float('Monto', 0, 0);
            $table->date('Fecha_Mov');
            $table->unsignedBigInteger('Id_TipoMov');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
};
