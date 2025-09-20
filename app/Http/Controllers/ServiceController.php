<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index(){


     $services=Service::all();
       return view('services.index', compact('services'));

    }
    // صفحة إنشاء الخدمة
    public function create()
    {
        // جلب كل الصور من مجلد public/icons
        $iconFiles = File::files(public_path('icons'));

        // نحول الملفات لأسماء فقط
        $icons = array_map(fn($file) => $file->getFilename(), $iconFiles);

        return view('services.create', compact('icons'));
    }

public function store(Request $request)
{
    // تحقق من البيانات
    $request->validate([
        'name_ar' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'name_tr' => 'required|string|max:255',
        'icon' => 'required|string|max:255',  // تعديل هنا
    ]);

    // حفظ الخدمة
    Service::create([
        'name_ar' => $request->name_ar,
        'name_tr' => $request->name_tr,
        'name_en' => $request->name_en,
        'icon_path' => 'icons/' . $request->icon,  // نستخدم قيمة الـselect
    ]);

    return redirect()->route('services.index')->with('success', 'تمت إضافة الخدمة بنجاح!');
}

public function destroy($id)
{
    $service = Service::findOrFail($id);

 
    $service->delete();

    return redirect()->route('services.index')->with('success', 'تم حذف الطبيب بنجاح');
}

}
