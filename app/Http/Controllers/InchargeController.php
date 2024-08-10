<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class InchargeController extends Controller {
  public function inbox() {
    $messages = Message::orderByRaw("FIELD(status, 'Pending', 'Completed', 'Cancelled')")
      ->orderBy('created_at', 'DESC')
      ->paginate(5);
    return view('incharge.inbox', compact('messages'));
  }

  public function profile(User $user) {
    return view('incharge.profile', compact('user'));
  }

  public function users() {
    $users = User::where('user_type', 'user')
      ->paginate(5);
    return view('incharge.user', compact('users'));
  }
}
