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
        Schema::create('besoins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('societe_id')
                ->constrained('societes')
                ->restrictOnDelete();
            $table->foreignId('poste_id')
                ->constrained('postes')
                ->restrictOnDelete();
            $table->unsignedInteger('nombre_postes')->default(1);
            $table->string('type_contrat');
            $table->text('description')->nullable();
            $table->date('date_limite')->nullable();
            $table->string('statut')->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('besoins');
    }
};
