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
        Schema::create('shopcarts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('quantity');
            $table->integer('imgshop_id');
            $table->integer('customer_id');
            $table->unique(['imgshop_id', 'customer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopcarts');
    }
};
