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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();

            $table->text('logo')->nullable();
            $table->text('favicon')->nullable();
            $table->text('footer_logo')->nullable();

            $table->string('locale_general_user')->default('es');
            $table->string('time_zone')->default('America/Tijuana');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
