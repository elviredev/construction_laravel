<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventFaq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Http\Requests\Admin\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
  public function index(): View
  {
    $events = Event::orderBy('id', 'asc')->get();
    return view('admin.event.index', compact('events'));
  }

  public function store(StoreEventRequest $request): RedirectResponse
  {
    $data = $request->validated();

    $event = new Event();

    if($request->hasFile('image')) {
      $final_name = 'event_image_'.uniqid().'.'.$request->image->extension();
      $request->image->move(public_path('uploads/admin/'), $final_name);
      $event->image = $final_name;
    }

    $event->fill($data);

    $event->save();

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function update(UpdateEventRequest $request, Event $event): RedirectResponse
  {
    $data = $request->validated();

    if($request->hasFile('image')) {
      if($event->image && file_exists(public_path('uploads/admin/'.$event->image))) {
        unlink(public_path('uploads/admin/'.$event->image));
      }
      $file = $request->file('image');
      $final_name = 'event_image_'.uniqid().'.'.$file->extension();

      $file->move(public_path('uploads/admin/'), $final_name);
      $event->image = $final_name;
    }

    $event->fill($data);

    $event->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $event = Event::findOrFail($id);

    if($event->image && file_exists(public_path('uploads/admin/'.$event->image))) {
      unlink(public_path('uploads/admin/'.$event->image));
    }

    $event->delete();

    return redirect()->back()->with('success', 'Item deleted successfully');
  }

  /*========== FAQs ==========*/

  public function faqs(Event $event): View
  {
    $faqs = $event->eventFaqs()->orderBy('id', 'asc')->get();
    return view('admin.event.faq', compact('event', 'faqs'));
  }

  public function faq_store(Request $request, Event $event): RedirectResponse
  {
    $validated = $request->validate([
      'question' => 'required|string|max:255',
      'answer' => 'required|string'
    ]);

    $event->eventFaqs()->create($validated);

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function faq_update(Request $request, EventFaq $faq): RedirectResponse
  {
    $validated = $request->validate([
      'question' => 'required|string|max:255',
      'answer' => 'required|string'
    ]);

    $faq->update($validated);

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function faq_destroy(EventFaq $faq): RedirectResponse
  {
    $faq->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }

}
