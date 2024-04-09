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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
<<<<<<< HEAD
         
=======
            $table->string('profession')->nullable()->after('email');
            $table->string('address')->nullable()->after('email');
>>>>>>> 1c8fc5becd1de79aa92641d21eb77b208990e4d5
        });
      
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }
};
