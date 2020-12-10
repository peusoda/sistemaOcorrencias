<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciaHasMotivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_has_motivo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_ocorrencia_id');
            $table->foreign('tipo_ocorrencia_id')
                ->references('id')
                ->on('tipo_ocorrencia')
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
        Schema::dropIfExists('ocorrencia_has_motivo');
    }
}
