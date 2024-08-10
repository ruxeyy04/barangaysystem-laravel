<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {
  public function authenticate() {
    $validated = request()->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (auth()->attempt($validated)) {
      request()->session()->regenerate();

      if (auth()->user()->user_type === 'user') {
        return redirect()->route('clients.index')->with('success', 'User logged in!');
      } else if (auth()->user()->user_type === 'incharge') {
        return redirect()->route('incharges.inbox')->with('success', 'User logged in!');
      } else if (auth()->user()->user_type === 'admin') {
        return redirect()->route('admins.inbox')->with('success', 'User logged in!');
      }

      // if (auth()->user()->usertype === 'admin') {
      //   return redirect()->route('admins.index')->with('success', 'Admin logged in!');
      // } else if (auth()->user()->usertype === 'in-charge') {
      //   return redirect()->route('in-charges.index')->with('success', 'Incharge logged in!');
      // } else if (auth()->user()->usertype === 'patient') {
      //   return redirect()->route('users.index')->with('success', 'User logged in!');
      // } else {
      //   return redirect()->route('login')->with('success', 'Invalid email or password');
      // }
    }

    return redirect()->route('login')->with('failed', 'User doesn\'t exist');
  }

  public function logout() {
    auth()->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Logged out successfully');
  }
}
