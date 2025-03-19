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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();

            // Para español
            $table->string('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->string('btn_text')->nullable();

            // Para inglés
            $table->string('title_en')->nullable();
            $table->text('sub_title_en')->nullable();
            $table->string('btn_text_en')->nullable();

            $table->string('btn_url')->nullable();
            $table->text('image')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
