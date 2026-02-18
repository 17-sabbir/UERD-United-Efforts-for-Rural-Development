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
        Schema::table('ongoing_project', function (Blueprint $table) {
            $table->integer('priority')->default(0)->after('description')->comment('Higher value means higher priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ongoing_project', function (Blueprint $table) {
            $table->dropColumn('priority');
        });
    }
};
