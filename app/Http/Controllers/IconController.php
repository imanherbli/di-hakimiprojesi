<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icon;

class IconController extends Controller
{
    // عرض جميع الأيقونات + زر إضافة
    public function index()
    {
        $icons = Icon::all();
        return view('icons.index', compact('icons'));
    }
    // عرض صفحة إضافة أيقونة جديدة
    public function create()
    {
        return view('icons.create');
    }
    // حفظ أيقونة جديدة
   
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'icon_path' => 'required|string',
    ]);

    Service::create([
        'name' => $request->name,
        'icon_path' => $request->icon_path,
    ]);

    return redirect()->route('services.index')->with('success', 'تمت إضافة الخدمة بنجاح');
}
}
