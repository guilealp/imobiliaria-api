<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 80)-> nullable(false);
            $table->string('cpf', 11)->unique()->nullable(false);
            $table->string('celular', 15)-> nullable(true);
            $table->string('email', 100)->unique()-> nullable(false);
            $table->string('data de nacimento', 8)-> nullable(false);
            $table->string('cep' ,8)-> nullable(false);
            $table->string('endereço')-> nullable(false);
            $table->string('bairro')-> nullable(false);
            $table->string('password')-> nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
