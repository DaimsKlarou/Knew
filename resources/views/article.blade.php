@extends('layout')

<h1>La liste de mes articles</h1>

<ul>
    @foreach($articles as $article)
        <li>{{ $article->title }}</li>
    @endforeach
</ul>

@foreach($articles as $article)
    <h2>{{ $article->title }}</h2>
    <p>{{ $article->category_id }}</p>
    <p>{{ $article->image }}</p>
    <p>{{ $article->description }}</p>
@endforeach
