<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller {
  public function inbox() {
    $messages = Message::orderByRaw("FIELD(status, 'Pending', 'Completed', 'Cancelled')")
      ->orderBy('created_at', 'DESC')
      ->paginate(5);
    return view('admin.inbox', compact('messages'));
  }

  public function profile(User $user) {
    return view('admin.profile', compact('user'));
  }

  public function users() {
    $users = User::where('user_type', 'user')
      ->paginate(5);
    return view('admin.user', compact('users'));
  }

  public function incharges() {
    $users = User::where('user_type', 'incharge')
      ->paginate(5);
    return view('admin.incharge', compact('users'));
  } 
}
