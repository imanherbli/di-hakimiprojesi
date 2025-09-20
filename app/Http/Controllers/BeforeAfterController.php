<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\BeforeAfter;
use Illuminate\Http\Request;
class BeforeAfterController extends Controller
{
      public function index()
    {
        $items = BeforeAfter::all();
        return view('before_after.index', compact('items'));
    }

    public function create()
    {
        return view('before_after.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'before_image' => 'required|image|mimes:jpg,jpeg,png',
            'after_image'  => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $beforePath = $request->file('before_image')->store('before_after', 'public');
        $afterPath  = $request->file('after_image')->store('before_after', 'public');

        BeforeAfter::create([
            'title'        => $request->title,
            'before_image' => $beforePath,
            'after_image'  => $afterPath,
        ]);

        return redirect()->route('before_after')->with('success', 'تمت الإضافة بنجاح');
    }
         
public function destroy($id)
{
    $item = BeforeAfter::findOrFail($id);

    // حذف الصور من التخزين
    Storage::delete([$item->before_image, $item->after_image]);

    $item->delete();

    return redirect()->route('before_after')->with('success', 'تم');
}


}
