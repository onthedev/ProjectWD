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
            $table->string('emp_id');
            $table->string('ChangWat');
            $table->string('ZipCode');
            $table->timestamps();
            $table->softDeletes();

            // แก้ไขเปลี่ยน 'personnel' เป็น 'personnels'
            $table->foreign('emp_id')->references('emp_id')->on('personnels');
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
