<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->enum('categoria', ['punitiva', 'elogio']);
            $table->string('disciplina', 45)->nullable();
            $table->string('relato', 5000)->nullable();
            $table->date('data_ocorrencia');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id')->nullable()
                ->references('id')
                ->on('turmas')
                ->onDelete('cascade');
            $table->unsignedBigInteger('servidor_id')->nullable();
            $table->foreign('servidor_id')
                ->references('id')
                ->on('servers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('ocorrencias');
    }
}
