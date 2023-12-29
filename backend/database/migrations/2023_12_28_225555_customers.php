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
        Schema::create('Customer', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('phone_no')->unique()->nullable(false);
            $table->string('address_line_one')->nullable(false);
            $table->string('address_line_two')->nullable(false);
            $table->string('postal_code')->nullable(false);
            $table->string('city')->nullable(false);
            $table->timestamps();
        });
    }
   


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
