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
        Schema::create('t_customer_capabilities_link', function (Blueprint $table) {
            $table->id('capabilities_link_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('capability_id');
            $table->index(['customer_id', 'capability_id']);
            $table->foreign('customer_id')->references('customer_id')->on('t_customers');
            $table->foreign('capability_id')->references('capability_id')->on('t_capabilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_customer_capabilities_link');
    }
};
