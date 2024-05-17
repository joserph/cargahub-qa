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
        Schema::create('logistics', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('ruc')->unique();
            // $table->string('phone');
            $table->text('address');
            $table->string('country_id');
            $table->string('state_id');
            $table->string('city_id');
            // $table->string('email');
            $table->string('image_url')->nullable();
            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistics');
    }
};
