<?php

namespace App\Http\Controllers;

use App\Models\Videolar;
use Illuminate\Http\Request;

class VideolarController extends Controller
{
    public function index() {
        $videos = Videolar::all();
        return view('videolar.index', compact('videos'));
    }

    public function create() {
        return view('videolar.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'url' => 'required|url',
        'thumbnail' => 'required|image|max:2048',
    ]);

    // رفع الصورة لمجلد public/thumbnails
    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('thumbnails'), $filename);
    }

    // حفظ البيانات في قاعدة البيانات
    Videolar::create([
        'title' => $request->title,
        'url' => $request->url,
        'thumbnail' => 'thumbnails/' . $filename,
    ]);

    return redirect()->route('videolar.index')->with('success', 'تم إضافة الفيديو بنجاح');
}
public function destroy($id)
{
    $video = Videolar::findOrFail($id);

    // حذف الصورة إذا كانت موجودة
    if ($video->thumbnail && file_exists(public_path($video->thumbnail))) {
        unlink(public_path($video->thumbnail));
    }

    $video->delete();

    return redirect()->route('videolar.index')->with('success', 'تم حذف الطبيب بنجاح');
}
}
