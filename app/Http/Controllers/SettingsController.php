<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        return view('back.Settings.index', compact('settings'));
    }

    public function update(SettingsRequest $request)
    {
        // dd($request);
        $request->validated($request->all());
        $logo = $request->logo;

        $setting = Settings::where('id', 1)->first();

        if ($setting->logo) {
            Storage::disk('public')->delete($setting->logo);
        }

        if ($logo != null && !$logo->getError()) {
            $logo = $request->logo->store('assets', 'public');
        }

        if ($setting) {
            $setting->update([
                'web_site_name' => $request->web_site_name,
                'logo' => $logo,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'about' => $request->about,
            ]);
        } else {
            Settings::create([
                'web_site_name' => $request->web_site_name,
                'logo' => $logo,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'about' => $request->about,
            ]);
        }

        return to_route('settings.index')->with('success', 'les informations du site ont ete mise a jour avec success');
    }
}
