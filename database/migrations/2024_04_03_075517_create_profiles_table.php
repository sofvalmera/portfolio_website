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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('textlogo');
            $table->string('fullname',255);
            $table->string('role');
            // $table->string('description',255)->nullable();
            $table->integer('age');
            $table->string('degree');
            $table->string('birthday');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('barangay');
            $table->string('province');
            $table->integer('zipcode');
            $table->string('country');
            $table->string('religion');
            $table->string('municipality');
            $table->enum('status',['Single','Married','Widowed'])->default('Single');
            $table->enum('gender',['Male','Female'])->default('Male');
           
            $table->string('image')->nullable();
           
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
