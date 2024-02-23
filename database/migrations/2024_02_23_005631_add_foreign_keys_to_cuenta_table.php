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
        Schema::table('cuenta', function (Blueprint $table) {
            $table->foreign(['tipo_cuenta_id'])->references(['id'])->on('tipo_cuenta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['moneda_id'])->references(['id'])->on('tipo_moneda')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['Id_Cliente'])->references(['id'])->on('cliente')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cuenta', function (Blueprint $table) {
            $table->dropForeign('cuenta_tipo_cuenta_id_foreign');
            $table->dropForeign('cuenta_moneda_id_foreign');
            $table->dropForeign('cuenta_id_cliente_foreign');
        });
    }
};
