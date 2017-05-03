<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoEStudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('PagoEStudiante', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('idPago');
            $table->integer('idEstudiante')->unsigned();
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
            $table->string('Matricula', 45)->nullable();
        
            $table->index('idEstudiante','fk_PagoEStudiante_Estudiante1_idx');
        
            $table->foreign('idEstudiante')
                ->references('idEstudiante')->on('Estudiante');
        
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
        Schema::drop('PagoEStudiante');
    }
}
