<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('pages.profile', [
            'title' => 'Profile',
            'user' => auth()->user()
        ]);
    }
    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui profil. ' . $e->getMessage());
        }
    }
}
