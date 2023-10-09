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
        Schema::create('checkstocks', function (Blueprint $table) {
            $table->unsignedBigInteger('checkstock_id');
            $table->string("name_eng");
            $table->string("name_th");
            $table->integer('total_stock');
            $table->integer('bringout_stock');
            $table->integer('sendback_stock');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkstocks');
    }
};
