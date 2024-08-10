<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller {
  public function index() {
    return view('client.index');
  }

  public function inbox(User $user) {
    $messages = $user->messages()->paginate(5);
    return view('client.inbox', compact('messages'));
  }

  public function profile(User $user) {
    return view('client.profile', compact('user'));
  }
}
