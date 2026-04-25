<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function dashboard(): View
  {
    return view('user.dashboard');
  }

  public function profile(): View
  {
    return view('user.profile');
  }

  public function profile_update(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
    ]);

    $user = Auth::guard('web')->user();

    // update password
    if($request->password != null) {
      $request->validate([
        'password' => 'required',
        'confirm_password' => 'required|same:password',
      ]);

      $user->password = Hash::make($request->password);
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->update();

    return redirect()->back()->with('success','Profile updated successfully');
  }

  public function logout()
  {
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success','Logout is successful!');
  }

}
