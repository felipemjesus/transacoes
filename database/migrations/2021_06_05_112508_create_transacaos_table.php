<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacaos', function (Blueprint $table) {
            $table->id();
            $table->decimal('valor', 10, 2);
            $table->tinyInteger('situacao');
            $table->bigInteger('pagador_id')->unsigned();
            $table->bigInteger('beneficiario_id')->unsigned();

            $table->foreign('pagador_id')
                ->references('id')
                ->on('contas');

            $table->foreign('beneficiario_id')
                ->references('id')
                ->on('contas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacaos');
    }
}
