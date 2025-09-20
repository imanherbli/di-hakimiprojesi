<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // عرض جميع الأطباء حسب اللغة المحددة في السيشن
  public function index()
{
    // نجيب اللغة الحالية من السيشن (افتراضي "ar")
    $lang = session('lang', 'ar');

    // أسماء الأعمدة حسب اللغة
    $nameColumn = "name_" . $lang;
    $specColumn = "specialization_" . $lang;
    $descColumn = "description_" . $lang;

    // نجيب كل الدكاترة
    $items = Doctor::select(
        'id',
        "$nameColumn as name",
        "$specColumn as specialization",
        "$descColumn as description",
        'image',
        
    )->get();

    return view('doctor.index', compact('items'));
}


    // صفحة إضافة طبيب جديد
    public function create()
    {
        return view('doctor.create');
    }

    // حفظ الطبيب الجديد في قاعدة البيانات
public function store(Request $request)
{
    // التحقق من صحة البيانات
    $request->validate([
        'name_ar' => 'required|string|max:255',
        'name_tr' => 'required|string|max:255',
        'name_en' => 'required|string|max:255',
        'specialization_ar' => 'required|string|max:255',
        'specialization_tr' => 'required|string|max:255',
        'specialization_en' => 'required|string|max:255',
        'description_ar' => 'nullable|string',
        'description_tr' => 'nullable|string',
        'description_en' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // جلب البيانات الأساسية
    $data = $request->only([
        'name_ar', 'name_tr', 'name_en',
        'specialization_ar', 'specialization_tr', 'specialization_en',
        'description_ar', 'description_tr', 'description_en',
    ]);

    // رفع الصورة إذا تم اختيارها
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('doctor_images'), $filename);
        $data['image'] = 'doctor_images/' . $filename;
    }

    // حفظ البيانات في قاعدة البيانات
    Doctor::create($data);

    return redirect()->route('doctor.index')->with('success', 'تمت الإضافة بنجاح');
}
public function destroy($id)
{
    $doctor = Doctor::findOrFail($id);

    // حذف الصورة إذا كانت موجودة
    if ($doctor->image && file_exists(public_path($doctor->image))) {
        unlink(public_path($doctor->image));
    }

    $doctor->delete();

    return redirect()->route('doctor.index')->with('success', 'تم حذف الطبيب بنجاح');
}


}
