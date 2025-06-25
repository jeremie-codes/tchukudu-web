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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('numero_telephone', 20);
            $table->text('adresse');
            $table->enum('type_vehicule', ['camion', 'camionnette', 'fourgon', 'remorque', 'semi-remorque', 'autre']);
            $table->string('marque_vehicule');
            $table->string('modele_vehicule');
            $table->year('annee_vehicule');
            $table->string('plaque_immatriculation')->unique();
            $table->decimal('capacite_charge', 8, 2); // en tonnes
            $table->string('mot_de_passe');
            $table->enum('statut', ['en_attente', 'actif', 'suspendu', 'inactif'])->default('en_attente');
            $table->string('document_identite')->nullable(); // chemin vers le fichier
            $table->string('document_vehicule')->nullable(); // carte grise
            $table->string('assurance_vehicule')->nullable();
            $table->date('date_expiration_assurance')->nullable();
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
        Schema::dropIfExists('owners');
    }
};