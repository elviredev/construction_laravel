<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
  public function index(): View
  {
    $services = Service::orderBy('id', 'asc')->get();
    return view('admin.service.index', compact('services'));
  }

  public function store(StoreServiceRequest $request): RedirectResponse
  {
    $data = $request->validated();

    $service = new Service();

    if($request->hasFile('icon')) {
      $final_name = 'service_icon_'.uniqid().'.'.$request->icon->extension();
      $request->icon->move(public_path('uploads/admin/'), $final_name);
      $service->icon = $final_name;
    }
    if($request->hasFile('image')) {
      $final_name = 'service_image_'.uniqid().'.'.$request->image->extension();
      $request->image->move(public_path('uploads/admin/'), $final_name);
      $service->image = $final_name;
    }

    $data['slug'] = Str::slug($data['title']);
    $service->fill($data);

    $service->save();

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
  {
    $data = $request->validated();

    if($request->hasFile('icon')) {
      if($service->icon && file_exists(public_path('uploads/admin/'.$service->icon))) {
        unlink(public_path('uploads/admin/'.$service->icon));
      }
      $file = $request->file('icon');
      $final_name = 'service_icon_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $service->icon = $final_name;
    }

    if($request->hasFile('image')) {
      if($service->image && file_exists(public_path('uploads/admin/'.$service->image))) {
        unlink(public_path('uploads/admin/'.$service->image));
      }
      $file = $request->file('image');
      $final_name = 'service_image_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $service->image = $final_name;
    }

    $data['slug'] = Str::slug($data['title']);
    $service->fill($data);

    $service->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $service = Service::findOrFail($id);

    if($service->image && file_exists(public_path('uploads/admin/'.$service->image))) {
      unlink(public_path('uploads/admin/'.$service->image));
    }
    if($service->icon && file_exists(public_path('uploads/admin/'.$service->icon))) {
      unlink(public_path('uploads/admin/'.$service->icon));
    }

    $service->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }
  
  
  /************* Service FAQS *************/

  /**
   * Retrieves frequently asked questions (FAQs) for a specific service by its ID.
   * Fetches the service instance and its associated FAQs, ordered by ID in ascending order.
   * Returns a view displaying the FAQs for the service.
   *
   * @param Service $service
   * @return \Illuminate\View\View The view displaying the service FAQs.
   */
  public function faqs(Service $service): View
  {
    $faqs = $service->faqs()->orderBy('id', 'asc')->get();

    return view('admin.service.faq', compact('service', 'faqs'));
  }

  /**
   * Store a new FAQ for a specific service.
   *
   * @param Request $request
   * @param Service $service
   * @return RedirectResponse
   */
  public function faq_store(Request $request, Service $service): RedirectResponse
  {
    $validated = $request->validate([
      'question' => 'required|string|max:255',
      'answer' => 'required|string'
    ]);

    $service->faqs()->create($validated);

    return redirect()->back()->with('success', 'Item added successfully');
  }

  /**
   * Update an existing FAQ for a specific service.
   *
   * @param Request $request
   * @param ServiceFaq $faq
   * @return RedirectResponse
   */
  public function faq_update(Request $request, ServiceFaq $faq): RedirectResponse
  {
    $validated = $request->validate([
      'question' => 'required|string|max:255',
      'answer' => 'required|string'
    ]);

    $faq->update($validated);

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  /**
   * Delete an existing FAQ for a specific service.
   * @param ServiceFaq $faq
   * @return RedirectResponse
   */
  public function faq_destroy(ServiceFaq $faq): RedirectResponse
  {
    $faq->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }
}
