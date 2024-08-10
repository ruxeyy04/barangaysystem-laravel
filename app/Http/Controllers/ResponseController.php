<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller {
  public function store(Message $message) {
    $validated = request()->validate([
      'response' => 'required|min:3|max:255',
      'status' => 'required|in:Completed,Cancelled',
    ]);
    $validated['message_id'] = $message->id;
    $validated['user_id'] = auth()->id();

    Response::create([
      'message_id' => $validated['message_id'],
      'user_id' => $validated['user_id'],
      'response' => $validated['response'],
    ]);

    $message->update([
      'status' => $validated['status'],
    ]);

    if (auth()->user()->user_type === 'incharge') {
      return redirect()->route('incharges.inbox')->with('success', 'Response sent!');
    } else if (auth()->user()->user_type === 'admin') {
      return redirect()->route('admins.inbox')->with('success', 'Response sent!');
    }
  }
}
