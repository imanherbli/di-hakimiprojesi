<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        Translation::create([
            'key' => 'services',
            'ar' => 'الخدمات',
            'en' => 'Services',
            'tr' => 'Hizmetler'
        ]);

        Translation::create([
            'key' => 'doctors',
            'ar' => 'الأطباء',
            'en' => 'Doctors',
            'tr' => 'Doktorlar'
        ]);

        // ممكن تضيف كل الكلمات اللي بدك تترجمها
    }
}
