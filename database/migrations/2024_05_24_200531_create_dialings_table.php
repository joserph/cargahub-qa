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
        Schema::create('dialings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('address')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('zip_code')->nullable();
            // $table->string('phone')->nullable();
            // $table->string('cell_phone')->nullable();
            // $table->string('email')->nullable();
            $table->enum('status', ['activa', 'suspendida', 'cerrada']); // Active, Suspended, Closed
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dialings');
    }
};
