<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null; 
        }

        $fullname = Auth::user()->name;
        $name = preg_split('/[.-@ ]/', $fullname);

        //Ajout le prenoms des utilisateurs avant de les envoyer en base de donnee
        $request->user()->name = $request->name . ' ' . $request->prenoms;

        //section of file uploaded 
        if ($request->hasFile('image')) {
            if (file_exists(public_path('back_auth/assets/img/profiles/' . $request->user()->image)) and !empty($request->user()->image)) {
                unlink(public_path('back_auth/assets/img/profiles' . $request->user()->image));
            }
        }

        //pour nommer le fichier qui sera telecharger et stoker dans la base de donnee
        $extension = $request->file('image')->extension();
        $fileName = $name[0].'-'.date('YmdHms') . '.' . $extension;

        //pour stocker le fichier de l'image de profile dans une base de donnee on la deplace
        $request->file('image')->move(public_path('back_auth/assets/img/profiles'), $fileName);
        $request->user()->image = $fileName;

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'Les modifications de votre profile ont ete effectue avec success');
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

        return Redirect::to('/');
    }
}
