<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
  public function index(): View
  {
    $faqs = Faq::orderBy('id', 'desc')->get();
    return view('admin.faq.index', compact('faqs'));
  }

  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'question' => 'required|string|max:255',
      'answer' => 'required|string'
    ]);

    $faqs = new Faq();
    $faqs->question = $request->question;
    $faqs->answer = $request->answer;
    $faqs->save();

    return redirect()->back()->with('success', 'Item added successfully');
  }

  public function update(Request $request, $id): RedirectResponse
  {
    $request->validate([
      'question' => 'required|string|max:255',
      'answer' => 'required|string'
    ]);

    $faq = Faq::findOrFail($id);

    $faq->question = $request->question;
    $faq->answer = $request->answer;
    $faq->save();

    return redirect()->back()->with('success', 'Item updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    $faq = Faq::findOrFail($id);

    $faq->delete();
    return redirect()->back()->with('success', 'Item deleted successfully');
  }
}
