<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('services', function (Blueprint $table) {
        $table->string('name_ar')->nullable();
        $table->string('name_tr')->nullable();
        $table->string('name_en')->nullable();
        $table->string('icon_path')->nullable();
    });
}

public function down()
{
    Schema::table('services', function (Blueprint $table) {
        $table->dropColumn(['name_ar', 'name_tr', 'name_en', 'icon_path']);
    });
}

};
