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
    Schema::table('doctor', function (Blueprint $table) {
        $table->string('image')->nullable()->after('description_en');
        $table->string('video')->nullable()->after('image');
    });
}

public function down(): void
{
    Schema::table('doctor', function (Blueprint $table) {
        $table->dropColumn(['image', 'video']);
    });
}

};
