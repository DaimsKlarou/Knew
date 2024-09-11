<?php

namespace App\Http\Controllers\SocialMedia;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMedia\StoreSocialMediaRequest;
use App\Http\Requests\SocialMedia\UpdateSocialMediaRequest;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedias = SocialMedia::all();
        return view('back.SocialMedia.index', compact('socialMedias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.SocialMedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialMediaRequest $request)
    {
        $request->validated($request->all());
        SocialMedia::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'link' => $request->link,
        ]);

        return to_route('socialMedia.index')->with('success', 'le social Media a bien ete ajoute !!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedia)
    {
        return view('back.SocialMedia.create', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        $request->validated($request->all());
        $socialMedia->update($request->all());
        return to_route('socialMedia.index')->with('success', 'Le media social a bien ete modifie !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();
        return to_route('socialMedia.index')->with('success', 'Le social Media a bien ete supprime !!');
    }
}
