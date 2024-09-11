@extends('back.app')

@section('title', 'Dashboard - Show article')

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="page-title">Details de l'article</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="blog-view">
                <article class="blog blog-single-post">
                    <h1 class="blog-title">{{ $article->title }}</h1>
                    <div class="blog-image">
                        <a href="blog-details.html"><img alt="Article image" src="{{ $article->imageUrl() }}"
                                class="img-fluid mt-4" /></a>
                    </div>
                    <div class="blog-content mt-4">
                        {!! $article->description !!}
                    </div>
                </article>
                <div class="widget">
                    @foreach ($article->tags as $tag)
                        <label class="label label-info btn btn-primary">
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>
                <div class="widget author-widget clearfix">
                    <h3>A propos de l'auteur</h3>
                    <div class="about-author">
                        <div class="about-author-img">
                            <div class="author-img-wrap">
                                <img class="img-fluid rounded-circle" alt="Author image"
                                    src="{{ $article->author->imageUrl() }}" />
                            </div>
                        </div>
                        <div class="author-details">
                            <span class="blog-author-name">{{ $article->author->name }}</span>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
