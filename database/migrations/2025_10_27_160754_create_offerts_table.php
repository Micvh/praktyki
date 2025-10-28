<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offerts', function (Blueprint $table) {
            $table->id();
            $table->string('OffertNumber')->unique();
            $table->text('OffertDescription');
            $table->string('OffertSize')->nullable();
            $table->string('AgentName');
            $table->string('AgentPhone')->nullable();
            $table->json('Photos')->nullable();      // przechowujemy zdjęcia w JSON
            $table->json('OffertType')->nullable();  // checkboxy zapisane jako JSON
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offerts');
    }
};
