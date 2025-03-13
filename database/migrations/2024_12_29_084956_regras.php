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
        Schema::create('regras', function (Blueprint $table) {
            $table->id('id_regra');
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('regra_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_user')->on('users');
            $table->unsignedBigInteger('id_regra');
            $table->foreign('id_regra')->references('id_regra')->on('regras');
            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regras');
        Schema::dropIfExists('regra_user');
    }
};
