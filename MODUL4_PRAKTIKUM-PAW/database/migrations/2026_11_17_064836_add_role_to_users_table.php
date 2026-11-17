<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->enum('role', ['admin', 'mahasiswa'])->default('mahasiswa')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->where('role', 'mahasiswa')->update(['role' => 'admin']);

        Schema::table('users', function (Blueprint $table) {
            //
            $table->enum('role', ['admin'])->default('admin')->change();
        });
    }
};
