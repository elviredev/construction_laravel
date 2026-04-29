<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Slider;

class AdminSliderController extends Controller
{
  public function index(): View
  {
    $sliders = Slider::orderBy('id', 'asc')->get();
    return view('admin.slider.index', compact('sliders'));
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'title' => 'required|string|max:255',
      'text' => 'required|string',
      'button_text' => 'nullable|string|max:255',
      'button_link' => 'nullable|string|max:255'
    ]);

    $slider = new Slider();

    if($request->hasFile('image')) {
      $final_name = 'slider_'.uniqid().'.'.$request->image->extension();
      $request->image->move(public_path('uploads/admin/'), $final_name);
      $slider->image = $final_name;
    }
    $slider->title = $request->title;
    $slider->text = $request->text;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->save();

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $request->validate([
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      'title' => 'required|string|max:255',
      'text' => 'required|string',
      'button_text' => 'nullable|string|max:255',
      'button_link' => 'nullable|string|max:255'
    ]);

    $slider = Slider::findOrFail($id);

    if($request->hasFile('image')) {
      if($slider->image && file_exists(public_path('uploads/admin/'.$slider->image))) {
        unlink(public_path('uploads/admin/'.$slider->image));
      }
      $file = $request->file('image');
      $final_name = 'slider_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $slider->image = $final_name;
    }

    $slider->title = $request->title;
    $slider->text = $request->text;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $slider = Slider::findOrFail($id);
    if($slider->image && file_exists(public_path('uploads/admin/'.$slider->image))) {
      unlink(public_path('uploads/admin/'.$slider->image));
    }
    $slider->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }
}
