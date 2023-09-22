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
        Schema::create('addrs', function (Blueprint $table) {
            $table->id();
            $table->string('homeID');
            $table->string('villagename');
            $table->string('Tambon');
            $table->string('Amphoe');
            $table->string('ChangWat');
            $table->string('ZipCode');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id')->references('id')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addrs');
    }
};
