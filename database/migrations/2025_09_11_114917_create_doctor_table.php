<?php
// database/migrations/2025_09_11_xxxx_create_doctor_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_tr');
            $table->string('name_en');
            $table->string('specialization_ar')->nullable();
            $table->string('specialization_tr')->nullable();
            $table->string('specialization_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_tr')->nullable();
            $table->text('description_en')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor');
    }
};
