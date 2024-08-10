<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
  public function update(User $user) {
    if (request()->has('password')) {
      $validated = request()->validate([
        'password' => 'required'
      ]);
    } else {
      $validated = request()->validate([
        'profile_image' => 'image|nullable',
        'first_name' => 'required|min:2|max:50',
        'last_name' => 'required|min:2|max:50',
        'address' => 'required|min:3|max:50',
        'gender' => 'required|min:3|max:50',
        'email' => [
          'required',
          'email',
          Rule::unique('users', 'email')->ignore(auth()->user()->id),
        ],
        'contact_number' => 'required|min:11|max:11',
      ]);

      if (request()->hasFile('profile_image')) {
        $profilePath = request()->file('profile_image')->store('profile', 'public');
        $validated['profile_image'] = $profilePath;

        Storage::disk('public')->delete($user->profile_image ?? '');
      }
    }

    $user->update($validated);

    if (auth()->user()->user_type === 'user') {
      return redirect()->route('clients.profile', $user->id)->with('success', 'Profile updated');
    } else if (auth()->user()->user_type === 'incharge') {
      return redirect()->route('incharges.profile', $user->id)->with('success', 'Profile updated');
    } else if (auth()->user()->user_type === 'admin') {
      return redirect()->route('admins.profile', $user->id)->with('success', 'Profile updated');
    }
  }

  public function diffUpdate(User $user) {
    $validated = request()->validate([
      'profile_image' => 'image|nullable',
      'first_name' => 'required|min:2|max:50',
      'last_name' => 'required|min:2|max:50',
      'address' => 'required|min:3|max:50',
      'gender' => 'required|min:3|max:50',
      'email' => [
        'required',
        'email',
        Rule::unique('users', 'email')->ignore($user->id),
      ],
      'contact_number' => 'required|min:11|max:11',
    ]);

    if (request()->hasFile('profile_image')) {
      $profilePath = request()->file('profile_image')->store('profile', 'public');
      $validated['profile_image'] = $profilePath;

      Storage::disk('public')->delete($user->profile_image ?? '');
    }

    if (request()->get('password') !== null) {
      $validated['password'] = request()->get('password');
    }

    $user->update($validated);

    if (request()->has('update_incharge')) {
      return redirect()->route('admins.incharges')->with('success', 'Incharge updated');
    }
    if (auth()->user()->user_type === 'incharge') {
      return redirect()->route('incharges.users')->with('success', 'User updated');
    } else if (auth()->user()->user_type === 'admin') {
      return redirect()->route('admins.users')->with('success', 'User updated');
    }
  }

  public function store() {
    $validated = request()->validate([
      'profile_image' => 'image|nullable',
      'first_name' => 'required|min:2|max:50',
      'last_name' => 'required|min:2|max:50',
      'address' => 'required|min:3|max:50',
      'gender' => 'required|min:3|max:50',
      'email' => 'required|email|unique:users,email',
      'contact_number' => 'required|min:11|max:11',
      'password' => 'required',
    ]);

    $validated['user_type'] = 'user';
    if (request()->has('add_incharge')) {
      $validated['user_type'] = 'incharge';
    }

    if (request()->hasFile('profile_image')) {
      $profilePath = request()->file('profile_image')->store('profile', 'public');
      $validated['profile_image'] = $profilePath;
    }

    User::create($validated);

    if (request()->has('add_incharge')) {
      return redirect()->route('admins.incharges')->with('success', 'Incharge added');
    }
    if (auth()->user()->user_type === 'incharge') {
      return redirect()->route('incharges.users')->with('success', 'User added');
    } else if (auth()->user()->user_type === 'admin') {
      return redirect()->route('admins.users')->with('success', 'User added');
    }
  }

  public function destroy(User $user) {
    $user->delete();
    if (request()->has('delete_incharge')) {
      return redirect()->route('admins.incharges')->with('success', 'Incharge deleted');
    }
    if (auth()->user()->user_type === 'incharge') {
      return redirect()->route('incharges.users')->with('success', 'User deleted');
    } else if (auth()->user()->user_type === 'admin') {
      return redirect()->route('admins.users')->with('success', 'User deleted');
    }
  }
}
