<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('usuarios', function (Blueprint $table) {
            // 0 => Administrador
            // 1 => Cliente
            $table->tinyInteger("atividade")->default(0);
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->date("ultimo_acesso")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
