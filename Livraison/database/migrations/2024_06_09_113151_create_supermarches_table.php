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
        Schema::create('supermarches', function (Blueprint $table) {
            $table->id();
            $table->string('nom_sup');
            $table->string('email_sup');
            $table->string('adresse_sup');
            $table->string('image_sup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supermarches');
    }
};
