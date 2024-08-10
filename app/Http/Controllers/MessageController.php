<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {
  public function store() {
    $validated = request()->validate([
      'subject' => 'required|min:3|max:50',
      'message' => 'required|min:3|max:255'
    ]);
    $validated['user_id'] = auth()->id();

    Message::create($validated);

    return redirect()->route('clients.index')->with('success', 'Message sent!');
  }
}
