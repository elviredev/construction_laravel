<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
  public function index(): View
  {
    $photos = Photo::orderBy('id', 'desc')->get();
    return view('admin.photo.index', compact('photos'));
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'caption' => 'nullable|string|max:255'
    ]);

    $photo = new Photo();

    if($request->hasFile('image')) {
      $final_name = 'photo_'.uniqid().'.'.$request->image->extension();
      $request->image->move(public_path('uploads/admin/'), $final_name);
      $photo->image = $final_name;
    }
    $photo->caption = $request->caption;
    $photo->save();

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $request->validate([
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'caption' => 'nullable|string|max:255'
    ]);

    $photo = Photo::findOrFail($id);

    if($request->hasFile('image')) {
      if($photo->image && file_exists(public_path('uploads/admin/'.$photo->image))) {
        unlink(public_path('uploads/admin/'.$photo->image));
      }
      $file = $request->file('image');
      $final_name = 'photo_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $photo->image = $final_name;
    }

    $photo->caption = $request->caption;
    $photo->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $photo = Photo::findOrFail($id);
    if($photo->image && file_exists(public_path('uploads/admin/'.$photo->image))) {
      unlink(public_path('uploads/admin/'.$photo->image));
    }
    $photo->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }
}
