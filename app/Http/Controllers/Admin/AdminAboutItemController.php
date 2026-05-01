<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminAboutItemController extends Controller
{
  public function index(): View
  {
    $aboutItem = AboutItem::first();
    if(!$aboutItem) {
      $aboutItem = new AboutItem();
    }

    return view('admin.about_item.index', compact('aboutItem'));
  }

  public function update(Request $request): RedirectResponse
  {
    $request->validate([
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'title' => 'required|string|max:255',
      'subtitle' => 'required|string|max:255',
      'text' => 'required|string',

      'experience_year' => 'nullable|string|max:50',
      'experience_text' => 'nullable|string|max:255',
      'youtube_id' => 'nullable|string|max:255',
      'phone_number' => 'nullable|string|max:50',
      'phone_text' => 'nullable|string|max:255',
      'button_text' => 'nullable|string|max:255',
      'button_link' => 'nullable|string|max:255',
    ]);

    $obj = AboutItem::first() ?? new AboutItem();

    if($request->hasFile('image')) {
      if($obj->image && file_exists(public_path('uploads/admin/'.$obj->image))) {
        unlink(public_path('uploads/admin/'.$obj->image));
      }
      $file = $request->file('image');
      $final_name = 'about_item_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $obj->image = $final_name;
    }

    $obj->title = $request->title;
    $obj->subtitle = $request->subtitle;
    $obj->text = $request->text;
    $obj->experience_year = $request->experience_year;
    $obj->experience_text = $request->experience_text;
    $obj->youtube_id = $request->youtube_id;
    $obj->phone_number = $request->phone_number;
    $obj->phone_text = $request->phone_text;
    $obj->button_text = $request->button_text;
    $obj->button_link = $request->button_link;
    $obj->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }
}
