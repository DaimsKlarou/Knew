@extends('back.app')

@section('title', 'Dashboard - Create article')

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">
                @if (isset($article))
                    Modifier
                @else
                    Ajouter
                @endif un article
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        @if(isset($article))
            <div class="col-lg-12">
                <img src="{{$article->imageUrl()}}" alt="article image" width="100%" height="250px">
            </div>
        @endif
        <div class="col-lg-12">
            <form action="{{ isset($article) ? route('article.update', $article) : route('article.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($article))
                    @method('patch')
                @endif
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Titre de l'article</label>
                            <input class="form-control" type="text" name="title" value="{{isset($article) ? old('title', $article->title) : old('title')}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categorie</label>
                            <select class="form-control" id="sel1" name="category_id" >
                                <option value="">Choisir une categorie...</option>
                                @foreach($categories as $category)
                                    <option @if(isset($article)) @selected($article->category->id) @endif value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Uploader une image</label>
                            <div class="custom-file mb-3">
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                                <input type="file" class="custom-file-input" id="customFile" name="image" />
                            </div>
                        </div>
                    </div>

                    <textarea rows="10" id="description" name="description" cols="10">
                        {{isset($article) ? old('description', $article->description) : old('description')}}  
                    </textarea>

                    @if(isset($article))
                        <div class="col-md-12 mt-3 mb-2">
                            @foreach($article->tags as $tag)
                                <label for="" class="label label-info btn btn-primary"> {{$tag->name}} </label>
                            @endforeach
                        </div>
                    @endif

                    <div class="col-md-12 mt-3 mb-2">
                        <input type="text" class="form-control" data-role='tagsinput' name="tags">
                        @if($errors->has('tag'))
                            <span class="text-danger"> {{$errors->first('tags')}} </span>
                        @endif
                    </div>

                    
                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <label>Publication</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_active"
                                name="isActive" value="1" @if(isset($article)) {{ $article->isActive == 1 ? 'checked' : ''}} @else checked  @endif>
                            <label class="form-check-label" for="article_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_inactive"
                                name="isActive" value="0" @if(isset($article)) {{ $article->isActive == 0 ? 'checked' : ''}} @endif>
                            <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <label>Partages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_share_active"
                                name="isSharable" value="1" @if(isset($article)) {{ $article->isSharable == 1 ? 'checked' : ''}} @else checked @endif>
                            <label class="form-check-label" for="article_share_active">Partageable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_share_inactive"
                                name="isSharable" value="0" @if(isset($article)) {{ $article->isSharable == 0 ? 'checked' : ''}} @endif>
                            <label class="form-check-label" for="article_share_inactive">Non Partageable</label>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <label>Commentaires</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_comment_active"
                                name="isComment" value="1" @if(isset($article)) {{ $article->isComment == 1 ? 'checked' : ''}} @else checked @endif>
                            <label class="form-check-label" for="article_comment_active">Autorise</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_comment_inactive"
                                name="isComment" value="0" @if(isset($article)) {{ $article->isComment == 0 ? 'checked' : ''}} @endif>
                            <label class="form-check-label" for="article_comment_inactive">Non autorise</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1 mt-2">Enregistrer l'article</button>
                </div>
            </form>
        </div>
    </div>
@endsection
