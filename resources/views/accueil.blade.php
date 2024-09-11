@extends('layout')
@section('titre', "Ici c'est la page d'accueil")
@include('menu')

<h1>Bonjour : {{ $name }}</h1>
<p>Je suis une page cree avec le template blade.</p>
<p>Age : {{ $age }}</p>

<h2>Les conditions</h2>
@if($age < 18)
    <p>Adolescent</p>
@else
    <p>Adulte</p>
@endif

<h2>Boucles</h2>
@for($i = 0; $i < $nombre; $i++)
    <p>L'entier {{ $i }}</p>
@endfor

<h2>Boucle foreach</h2>
@foreach($authors as $item)
    <ul>
        <li>{{ $item }}</li>
    </ul>
@endforeach

@php $i = 0 @endphp
@while($i < 4)
    <p>Bonjour</p>
    @php $i++ @endphp
@endwhile

