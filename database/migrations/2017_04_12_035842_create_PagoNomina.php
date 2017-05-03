<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoNomina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('PagoNomina', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idPagoNomina');
            $table->integer('idEmpleado')->unsigned();
            $table->integer('ReciboNomina_idReciboNomina')->unsigned();
            $table->string('Enero', 45)->nullable();
            $table->string('Febrero', 45)->nullable();
            $table->string('Marzo', 45)->nullable();
            $table->string('Abril', 45)->nullable();
            $table->string('Mayo', 45)->nullable();
            $table->string('Junio', 45)->nullable();
            $table->string('Julio', 45)->nullable();
            $table->string('Agosto', 45)->nullable();
            $table->string('Septiembre', 45)->nullable();
            $table->string('Octubre', 45)->nullable();
            $table->string('Noviembre', 45)->nullable();
            $table->string('Diciembre', 45)->nullable();
        
            $table->index('idEmpleado','fk_PagoNomina_Empleado1_idx');
            $table->index('ReciboNomina_idReciboNomina','fk_PagoNomina_ReciboNomina1_idx');
        
            $table->foreign('idEmpleado')
                ->references('idEmpleado')->on('Empleado');
        
            $table->foreign('ReciboNomina_idReciboNomina')
                ->references('idReciboNomina')->on('ReciboNomina');
        
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
        Schema::drop('PagoNomina');
    }
}
