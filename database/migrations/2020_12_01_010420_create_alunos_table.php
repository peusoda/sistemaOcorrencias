<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nascimento');
            $table->enum('sexo', ['m', 'f', 's']);
            $table->string('naturalidade', 45);
            $table->string('municipio', 45);
            $table->enum('transporte', ['onibus', 'familiar', 'bicicleta', 'pe', 'outros']);
            $table->string('cpf', 15)->nullable($value = true);
            $table->string('tipo_sanguineo', 3)->nullable($value = true);
            $table->string('apelido', 45)->nullable($value = true);
            $table->string('obs_napne', 200)->nullable($value = true);
            $table->string('obs_medica', 200)->nullable($value = true);
            $table->string('obs_pedagogica', 200)->nullable($value = true);
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')
                ->references('id')
                ->on('turmas')
                ->onDelete('cascade');
            $table->unsignedBigInteger('responsavel_id');
            $table->foreign('responsavel_id')
                ->references('id')
                ->on('responsavels')
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
        Schema::dropIfExists('alunos');
    }
}
