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
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();

            $table->text('image')->nullable();
            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();

            $table->string('title')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->string('client')->nullable();
            $table->text('website')->nullable();
            $table->text('local_website')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_items');
    }
};
