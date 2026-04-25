<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Mail\Websitemail;
use Illuminate\Support\Str;
use Mail;

class AdminController extends Controller
{
  public function dashboard(): View
  {
    return view('admin.dashboard');
  }

  public function login()
  {
    if(Auth::guard('admin')->check()){
      return redirect()->route('admin_dashboard');
    }
    return view('admin.login');
  }

  public function login_submit(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required', 'min:8', 'confirmed'],
    ]);

    $data = $request->only('email', 'password');

    if(Auth::guard('admin')->attempt($data)) {
      $request->session()->regenerate();
      return redirect()
        ->route('admin_dashboard')
        ->with('success', 'Login successfully');
    } else {
      return redirect()
        ->route('admin_login')
        ->with('error','The information you entered is incorrect! Please try again!');
    }
  }

  public function logout(Request $request)
  {
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
      ->route('admin_login')
      ->with('success','Logout is successful!');
  }

  public function forget_password(): View
  {
    return view('admin.forget-password');
  }

  public function forget_password_submit(Request $request)
  {
    $request->validate([
      'email' => ['required', 'email'],
    ]);

    $admin = Admin::where('email',$request->email)->first();

    if($admin) {
      // Envoyé par mail
      $plainToken = Str::random(64);
      // Stocké en base
      $admin->reset_token = hash('sha256',$plainToken);
      $admin->reset_token_expires_at = now()->addMinutes(60);
      $admin->save();

      $reset_link = url('admin/reset-password/'.$plainToken.'/'.$request->email);
      $subject = "Password Reset";
      $message = "To reset password, please click on the link below:<br>";
      $message .= "<a href='".$reset_link."'>".$reset_link."</a>";

      Mail::to($request->email)->send(new Websitemail($subject,$message));
    }
    // même réponse dans tous les cas
    return redirect()
      ->back()
      ->with(
        'success',
        'If the email exists, a reset link has been sent.'
      );
  }

  /**
   * Vérification du lien
   */
  public function reset_password($token,$email)
  {
    $admin = Admin::where('email',$email)
      ->where('reset_token', hash('sha256',$token))
      ->where('reset_token_expires_at', '>', now())
      ->first();

    if(!$admin) {
      return redirect()
        ->route('admin_login')
        ->with('error','Token or email is not correct');
    }
    return view('admin.reset-password', compact('token','email'));
  }

  public function reset_password_submit(Request $request, $token, $email)
  {
    $request->validate([
      'password' => ['required', 'min:8'],
      'confirm_password' => ['required','same:password'],
    ]);

    $admin = Admin::where('email',$email)
                  ->where('reset_token',hash('sha256',$token))
                  ->where('reset_token_expires_at', '>', now())
                  ->first();

    if(!$admin) {
      return redirect()
        ->route('admin_login')
        ->with('error','Token or email is not correct');
    }

    $admin->password = Hash::make($request->password);
    $admin->reset_token = null;
    $admin->reset_token_expires_at = null;
    $admin->save();

    return redirect()->route('admin_login')
      ->with('success','Password reset is successful. You can login now.');
  }

  public function profile(): View
  {
    return view('admin.profile');
  }

  public function profile_update(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
    ]);

    $admin = Auth::guard('admin')->user();

    // upload photo
    if($request->hasFile('photo')) {
      $request->validate([
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
      ]);

      // delete old photo
      if($admin->photo != null && file_exists(public_path('uploads/admin/'.$admin->photo))) {
        unlink(public_path('uploads/admin/'.$admin->photo));
      }

      // upload new photo
      $final_name = 'admin_'.uniqid().'.'.$request->photo->extension();
      $request->photo->move(public_path('uploads/admin'),$final_name);
      $admin->photo = $final_name;
    }

    // update password
    if($request->password != null) {
      $request->validate([
        'password' => 'required|min:8',
        'confirm_password' => 'required|same:password',
      ]);

      $admin->password = Hash::make($request->password);
    }

    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->update();

    return redirect()->back()->with('success','Profile updated successfully');
  }

}
