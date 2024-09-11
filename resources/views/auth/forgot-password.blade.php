@extends('auth.app')
@section('title', 'password forgot')

@section('auth-form')
<h1>Mot de passe oublie?</h1>
<p class="account-subtitle">Entrer votre email pour obtenier <br /> le lien de re-initialisation</p>
@if(session('status'))
    <div class="alert alert-success"> {{ session('status') }} </div>
@endif

<form action="{{route('password.email')}}" method="POST">
    @csrf
    <div class="form-group">
        @error('email')
            <p class="text-red-500 mt-2"> {{message}} </p>
        @enderror
        <input class="form-control" type="email" value="{{old('email')}}" name="email" placeholder="Email"> </div>
    <div class="form-group mb-0">
        <button class="btn btn-primary btn-block" type="submit">Recevoir le lien</button>
    </div>
</form>
<div class="text-center dont-have">Vous vous souvenez de votre mot de passe? <a href="{{route('login')}}">Se connecter</a></div>
@endsection