<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavels', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 11)->unique();
            $table->string('email', 45)->unique();
            $table->string('contato_1', 12);
            $table->string('contato_2', 12)->nullable();
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
        Schema::dropIfExists('responsavels');
    }
}
