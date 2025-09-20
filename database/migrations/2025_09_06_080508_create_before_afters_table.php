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
    Schema::create('before_afters', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable(); // عنوان الحالة
        $table->string('before_image'); // صورة قبل
        $table->string('after_image');  // صورة بعد
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('before_afters');
    }
};
