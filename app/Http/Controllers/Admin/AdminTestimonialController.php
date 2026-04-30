<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
  public function index(): View
  {
    $testimonials = Testimonial::orderBy('id', 'desc')->get();
    return view('admin.testimonial.index', compact('testimonials'));
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'name' => 'required|string|max:255',
      'designation' => 'required|string|max:255',
      'comment' => 'required|string'
    ]);

    $testimonials = new Testimonial();

    if($request->hasFile('image')) {
      $final_name = 'testimonial_'.uniqid().'.'.$request->image->extension();
      $request->image->move(public_path('uploads/admin/'), $final_name);
      $testimonials->image = $final_name;
    }
    $testimonials->name = $request->name;
    $testimonials->designation = $request->designation;
    $testimonials->comment = $request->comment;
    $testimonials->save();

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $request->validate([
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
      'name' => 'required|string|max:255',
      'designation' => 'required|string|max:255',
      'comment' => 'required|string'
    ]);

    $testimonial = Testimonial::findOrFail($id);

    if($request->hasFile('image')) {
      if($testimonial->image && file_exists(public_path('uploads/admin/'.$testimonial->image))) {
        unlink(public_path('uploads/admin/'.$testimonial->image));
      }
      $file = $request->file('image');
      $final_name = 'testimonial_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $testimonial->image = $final_name;
    }

    $testimonial->name = $request->name;
    $testimonial->designation = $request->designation;
    $testimonial->comment = $request->comment;
    $testimonial->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $testimonial = Testimonial::findOrFail($id);
    if($testimonial->image && file_exists(public_path('uploads/admin/'.$testimonial->image))) {
      unlink(public_path('uploads/admin/'.$testimonial->image));
    }
    $testimonial->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }
}
