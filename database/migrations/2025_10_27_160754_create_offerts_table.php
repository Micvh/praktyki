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
            $table->string('number')->unique();
            $table->text('description');
            $table->string('size')->nullable();
            $table->string('agent_name');
            $table->string('agent_phone')->nullable();
            $table->string('type')->nullable(); 
            $table->json('photos')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offerts');
    }
};
