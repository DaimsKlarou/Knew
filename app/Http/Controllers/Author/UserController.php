<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = User::where('role_id', 2)->paginate(10);
        return view('back.Author.index', compact('authors')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.Author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $request->validated($request->all());

        User::create([
            'name' => $request->name.' '.$request->prenoms,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role_id' => 2,
        ]); 

        return to_route('author.index')->with('success', 'felicitation un auteur a ete ajoute avec success!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $author)
    {
        return view('back.Author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $author)
    {
        return view('back.Author.create', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $author)
    {
        $author->update(
            [
                'name' => $request->name.' '.$request->prenoms,
                'email' => $request->email,
            ]
        );
        return to_route('author.index')->with('success', 'Les informations de l\'auteur ont ete modifier avec success!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        $author->delete();
        return to_route('author.index')->with('success', "cette auteur a ete supprime avec success !!"); 
    }
}
