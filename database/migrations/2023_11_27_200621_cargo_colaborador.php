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
        Schema::create('cargo_colaborador', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cargo_id');
            $table->uuid('colaborador_id');
            $table->integer('nota_desempenho')->unsigned();
            $table->timestamps();

            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('colaborador_id')->references('id')->on('colaboradores');
        });

        DB::statement('ALTER TABLE cargo_colaborador ADD CONSTRAINT nota_desempenho_range CHECK (nota_desempenho >= 0 AND nota_desempenho <= 10)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_colaborador');
    }
};
