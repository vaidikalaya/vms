<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes_fee_structures', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->integer('admission_fee');
            $table->integer('tution_fee');
            $table->integer('examination_fee');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes_fee_structures');
    }
};
