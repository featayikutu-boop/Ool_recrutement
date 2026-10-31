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
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offre_id')
                ->constrained('offres')
                ->restrictOnDelete();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone', 20)->nullable();
            $table->string('cv')->nullable();
            $table->string('lettre_motivation')->nullable();
            $table->text('message')->nullable();
            $table->string('statut')->default('en_attente');
            $table->dateTime('date_candidature')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
