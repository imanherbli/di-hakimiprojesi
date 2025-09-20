<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;      // جدول الخدمات
use App\Models\Doctor;       // جدول الدكات       //  
use App\Models\BeforeAfter; // تأكد من إضافة الموديل
use App\Models\Videolar; // <- هذا السطر مهم
use App\Models\Translation;

class HomeController extends Controller
{
       public function index()
    {
        // جلب البيانات من قاعدة البيانات
        $services = Service::all();
        $items = BeforeAfter::all();
        $videos=Videolar::all();
        $doctors = Doctor::all();

        // إرسالها للـ view
        return view('home', compact('services',  'items', 'doctors','videos'));
    }
 
}
