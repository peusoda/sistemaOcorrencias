<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoHasOcorrenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_has_ocorrencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')
                ->references('id')
                ->on('alunos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ocorrencia_id');
            $table->foreign('ocorrencia_id')
                ->references('id')
                ->on('ocorrencias')
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
        Schema::dropIfExists('aluno_has_ocorrencia');
    }
}
