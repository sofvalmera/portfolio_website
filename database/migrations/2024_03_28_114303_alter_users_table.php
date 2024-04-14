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
            // $table->string('role')->default("admin")->after('email');
            // $table->enum('role',['Admin','Spectator'])->default('Admin')->after('email');
             $table->string('address')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
        });
    }
};
