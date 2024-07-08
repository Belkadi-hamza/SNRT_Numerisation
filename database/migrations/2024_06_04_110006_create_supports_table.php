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
        Schema::create('supports', function (Blueprint $table) {
            $table->id('ID_support')->unsignedBigInteger();
            $table->string('Num_support', 50)->unique();
            $table->unsignedBigInteger('ID_type_support');
            $table->string('Titre', 100);
            $table->unsignedBigInteger('ID_genre');
            $table->time('Duree');
            $table->date('Date_num');
            $table->unsignedBigInteger('ID_technicien');
            $table->timestamps();

            // Ajout des contraintes de clé étrangère
            $table->foreign('ID_type_support')->references('ID_type_support')->on('type_de_supports')->onDelete('cascade');
            $table->foreign('ID_genre')->references('ID_genre')->on('genres')->onDelete('cascade');
            $table->foreign('ID_technicien')->references('ID_technicien')->on('techniciens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
