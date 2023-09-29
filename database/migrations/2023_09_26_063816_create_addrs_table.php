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
                $table->string('addr');
                $table->string('Tambon');
                $table->string('Amphoe');
                $table->string('ChangWat');
                $table->string('ZipCode');
                $table->timestamps();
                $table->softDeletes();
                $table->string('emp_id');
                $table->unsignedBigInteger('employee_id');
                $table->foreign('employee_id')->references('id')->on('personnels');
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
