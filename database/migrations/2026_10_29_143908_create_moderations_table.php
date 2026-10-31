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
        Schema::create('moderations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('besoin_id')
                ->nullable()
                ->constrained('besoins')
                ->restrictOnDelete();
            $table->foreignId('offre_id')
                ->nullable()
                ->constrained('offres')
                ->restrictOnDelete();
            $table->foreignId('moderateur_id')
                ->constrained('users')
                ->restrictOnDelete();
            $table->string('type');
            $table->string('decision');
            $table->text('commentaire')->nullable();
            $table->dateTime('date_moderation')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderations');
    }
};
