<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if(Auth::user()->role == 'admin'){
            $articles = Article::with('category', 'author')->paginate(10);
        }else{
            $articles = Article::with('category', 'author')->where('author_id', Auth::user()->id)->get();
        }

        return view('back.Article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('isActive', true)->orderBy('name', 'asc')->get();
        return view('back.Article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validated($request->all());

        $image = $request->image;

        if ($image != null && !$image->getError()) {
            $image = $request->image->store('assets/articles', 'public');
        }

        $tags = explode(',', $request->tags);

        $article = Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'isActive' => $request->isActive,
            'isSharable' => $request->isSharable,
            'isComment' => $request->isComment,
            'category_id' => $request->category_id,
            'author_id' => Auth::user()->id,
            'image' => $image,
        ]);

        $article->tag($tags);

        return to_route('article.index')->with('success', 'Votre article a ete enregistre avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('back.Article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::where('isActive', true)->orderBy('name', 'asc')->get();
        return view('back.Article.create', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {

        $validatedData = $request->validated();

        // Gestion de l'image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Supprimer l'ancienne image si nécessaire
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            // Enregistrer la nouvelle image
            $imagePath = $request->file('image')->store('assets/articles', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Mettre à jour l'article avec les données validées
        $article->fill($validatedData);
        $article->save();

        // $request->validated($request->all());
        // $image = $request->image;

        // if ($image != null && !$image->getError()) {
        //     $image = $request->image->store('assets/articles', 'public');
        // }
        // $article->update($request->validated(), $image);
        return to_route('article.index')->with('success', 'Votre article a ete modifie avec success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();
        return to_route('article.index')->with('success', "L'article a bien ete supprime !");
    }
}
