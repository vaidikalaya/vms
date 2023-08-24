<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->integer('student_id');
            $table->id('class_id');
            $table->id('section_id')->nullable();
            $table->enum('status',['current','passed','failed']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_classes');
    }
};
