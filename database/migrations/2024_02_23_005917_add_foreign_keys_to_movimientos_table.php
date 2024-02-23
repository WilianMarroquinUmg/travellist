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
        Schema::table('movimientos', function (Blueprint $table) {
            $table->foreign(['Id_TipoMov'])->references(['id'])->on('tipo_movimiento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Id_Cuenta'])->references(['id'])->on('cuenta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropForeign('movimientos_id_tipomov_foreign');
            $table->dropForeign('movimientos_id_cuenta_foreign');
        });
    }
};
