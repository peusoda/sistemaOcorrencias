<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ocorrencia_id');
            $table->foreign('ocorrencia_id')
                ->references('id')
                ->on('ocorrencias')
                ->onDelete('cascade');
            $table->string('image1', 10);
            $table->string('image2', 10)->nullable($value = true);
            $table->string('image3', 10)->nullable($value = true);
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
        Schema::dropIfExists('images');
    }
}
