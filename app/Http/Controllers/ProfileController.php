<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('landing.pages.profile.edit', [
            'user' => $request->user(),
            'param' => Parameter::data()
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
      $request->validate([
        'nama_user' => 'required|string|max:255',
        'email_user' => 'required|string|email|max:255|unique:app_user,email_user,' . $request->user()->id,
        'password_user' => 'nullable|string|min:8|confirmed',
      ]);

      $user = $request->user();
      $user->nama_user = $request->input('nama_user');
      $user->email_user = $request->input('email_user');

      if ($request->has('password_user')) {
        $user->password_user = bcrypt($request->input('password_user'));
      }

      $user->save();

      return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password_user' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password_user' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        $user->password_user = bcrypt($request->input('password_user'));
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'password-updated');
    }
}