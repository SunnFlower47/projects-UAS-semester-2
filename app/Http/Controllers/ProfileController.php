<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Isi data dari validasi (name, email, dll)
    $user->fill($request->validated());

    // Cek jika ada file foto di request
    if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada (optional)
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        // Simpan file baru di storage/app/public/profile-photos
        $path = $request->file('photo')->store('profile-photos', 'public');
        $user->photo = $path;
    }

    // Reset verifikasi email jika email diubah
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'profile-deleted');
    }
    public function destroyPhoto(Request $request)
{
    $user = $request->user();

    if ($user->photo && Storage::disk('public')->exists($user->photo)) {
        Storage::disk('public')->delete($user->photo);
    }

    $user->photo = null;
    $user->save();

    return back()->with('status', 'profile-updated');
}

}
