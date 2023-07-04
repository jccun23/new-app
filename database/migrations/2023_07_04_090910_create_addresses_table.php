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
        Schema::create('t_addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->boolean('primary');
            $table->index('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('t_customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_addresses');
    }
};
