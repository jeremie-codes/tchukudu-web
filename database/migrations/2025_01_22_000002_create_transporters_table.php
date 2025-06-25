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
        Schema::create('transporters', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('numero_telephone', 20);
            $table->text('adresse');
            $table->string('numero_permis_conduire')->unique();
            $table->enum('type_permis', ['A', 'B', 'C', 'D', 'E']);
            $table->date('date_expiration_permis');
            $table->integer('experience_conduite'); // en années
            $table->string('mot_de_passe');
            $table->enum('statut', ['en_attente', 'actif', 'disponible', 'en_course', 'suspendu', 'inactif'])->default('en_attente');
            $table->foreignId('owner_id')->nullable()->constrained('owners')->onDelete('set null');
            $table->string('photo_profil')->nullable();
            $table->string('document_identite')->nullable();
            $table->string('document_permis')->nullable();
            $table->string('casier_judiciaire')->nullable();
            $table->text('references')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transporters');
    }
};