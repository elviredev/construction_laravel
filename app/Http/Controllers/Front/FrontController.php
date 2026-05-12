<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\AboutItem;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Photo;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class FrontController extends Controller
{
  public function home(): View
  {
    $sliders = Slider::latest()->take(3)->get();
    $testimonials = Testimonial::latest()->take(3)->get();
    $aboutItem = AboutItem::first();
    $services = Service::where('show_on_home', 1)->get();
    $events = Event::where('show_on_home', 1)->get();

    return view('front.home', compact(
      'sliders',
      'testimonials',
      'aboutItem',
      'services',
      'events'
    ));
  }

  public function about(): View
  {
    $testimonials = Testimonial::latest()->take(3)->get();
    $aboutItem = AboutItem::first();
    return view('front.about', compact('testimonials', 'aboutItem'));
  }

  public function login()
  {
    if(Auth::guard('web')->check()) {
      return redirect()->route('dashboard');
    }
    return view('front.login');
  }


  public function login_submit(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    $data = $request->only('email', 'password');

    if(Auth::guard('web')->attempt($data)) {
      if(Auth::guard('web')->user()->email_verified_at == null) {
        Auth::guard('web')->logout();

        return redirect()->route('login')
          ->with('error','The information you entered is incorrect!');
      }
      return redirect()->route('dashboard')
        ->with('success','Your are logged in successfully!');
    } else {
      return redirect()->route('login')
        ->with('error','The information you entered is incorrect! Please try again!');
    }
  }


  public function register()
  {
    if(Auth::guard('web')->check()) {
      return redirect()->route('dashboard');
    }

    return view('front.register');
  }

  public function register_submit(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required'],
      'confirm_password' => ['required','same:password'],
    ]);

    // Créer user en BDD
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $token = Str::random(64);
    $user->email_verification_token = $token;
    $user->save();

    // Envoyer email de verification
    $verification_link = url('register_verify/'.$token.'/'.$request->email);
    $subject = "Registration Verification";
    $message = "To complete registration, please click on the link below:<br>";
    $message .= "<a href='".$verification_link."'>".$verification_link."</a>";

    Mail::to($request->email)->send(new Websitemail($subject,$message));

    return redirect()->back()->with('success','Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
  }

  public function register_verify($token,$email)
  {
    $user = User::where('email',$email)
                ->where('email_verification_token',$token)
                ->first();
    if(!$user) {
      return redirect()->route('login');
    }

    $user->email_verified_at = now();
    $user->email_verification_token = null;
    $user->save();

    return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
  }


  public function forget_password()
  {
    if(Auth::guard('web')->check()) {
      return redirect()->route('dashboard');
    }

    return view('front.forget-password');
  }

  public function forget_password_submit(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
    ]);

    $user = User::where('email',$request->email)->first();
    if(!$user) {
      return redirect()->back()->with('error','Email is not found');
    }

    $token = Str::random(64);
    $user->password_reset_token = $token;
    $user->save();

    $reset_link = url('reset-password/'.$token.'/'.urlencode($request->email));
    $subject = "Password Reset";
    $message = "To reset password, please click on the link below:<br>";
    $message .= "<a href='".$reset_link."'>".$reset_link."</a>";

    Mail::to($request->email)->send(new Websitemail($subject,$message));

    return redirect()->back()->with('success','We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');
  }

  public function reset_password($token,$email)
  {
    $user = User::where('email',$email)
                ->where('password_reset_token',$token)
                ->first();
    if(!$user) {
      return redirect()->route('login')->with('error','Token or email is not correct');
    }
    return view('front.reset-password', compact('token','email'));
  }

  public function reset_password_submit(Request $request, $token, $email)
  {
    $request->validate([
      'password' => ['required'],
      'confirm_password' => ['required','same:password'],
    ]);

    $user = User::where('email',$email)->where('password_reset_token',$token)->first();
    if (!$user) {
      return redirect()->route('login')->with('error', 'Invalid token');
    }
    $user->password = Hash::make($request->password);
    $user->password_reset_token = "";
    $user->save();

    return redirect()->route('login')->with('success','Password reset is successful. You can login now.');
  }

  public function gallery(): View
  {
    $photos = Photo::latest()->take(8)->get();
    return view('front.gallery', compact('photos'));
  }

  public function faq(): View
  {
    $faqs = Faq::latest()->take(4)->get();
    return view('front.faq', compact('faqs'));
  }

  public function services(): View
  {
    $services = Service::latest()->get();
    return view('front.services', compact('services'));
  }

  public function service($slug): View
  {
    $service = Service::with('faqs')
      ->where('slug', $slug)
      ->firstOrFail();

    $allServices = Service::orderBy('title', 'asc')->get();

    return view('front.service', compact('service', 'allServices'));
  }

  public function service_contact(Request $request): RedirectResponse
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required'
    ]);

    $subject = "New Service Contact Message";
    $message = "<b>Service Title:</b> ".$request->service_title."<br>";
    $message .= "<b>Name:</b> ".$request->name."<br>";
    $message .= "<b>Email:</b> ".$request->email."<br>";
    $message .= "<b>Message:</b> ".$request->message;

    $admin_data = Admin::first();
    $admin_email = $admin_data->email;

    Mail::to($admin_email)->send(new Websitemail($subject,$message));

    return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you soon.');
  }

  public function events(): View
  {
    $events = Event::latest()->get();
    return view('front.events', compact('events'));
  }

  public function event($slug): View
  {
     $event = Event::where('slug', $slug)->firstOrFail();

     return view('front.event', compact('event'));
  }

}
