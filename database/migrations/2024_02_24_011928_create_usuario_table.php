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
        Schema::create('usuario', function (Blueprint $table) {
            
            $table->integer('idpasta')->autoIncrement();
            $table->string('nick', 255);
            $table->string('senha', 255);
            $table->string('autentificacao', 556);
            $table->integer('dados_utilizados');
            $table->string('plano', 255);
            $table->string('validade', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
