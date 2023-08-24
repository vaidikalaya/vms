<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('registration_number');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob');
            $table->enum('gender',['male','female','other']);
            $table->string('aadhaar_number');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo');
            $table->string('aadhaar_copy');
            $table->json('previous_qualification');
            $table->string('last_marksheet');
            $table->string('transfer_certificate');
            $table->date('date_of_join');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
