@extends('auth.app')
@section('title', 'register')

<!-- section principale de la page d'enregistrement -->
@section('auth-form')
    <h1 class="mb-3">S'inscrire</h1>
    <form action="{{route('register')}}" method="POST">
        @csrf

        <div class="form-group">
            @error('prenoms')
                <p class="text-red-500 mt-2">{{message}}</p>
            @enderror
            <input class="form-control" type="text" name="prenoms" value="{{old('prenoms')}}" placeholder="Prenom">
        </div>
        <div class="form-group">
            @error('name')
                <p class="text-red-500 mt-2"> {{ message }} </p>
            @enderror
            <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Nom">
        </div>
        <div class="form-group">
            @error('email')
                <p class="text-red-500 mt-2">{{message}}</p>
            @enderror
            <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Email">
        </div>
        <div class="form-group">
            @error('password')
                <p class="text-red-500 mt-2">{{message}}</p>
            @enderror
            <input class="form-control" type="password" name="password" value="{{old('password')}}" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            @error('password_confirmation')
                <p class="text-red-500 mt-2">{{message}}</p>
            @enderror
            <input class="form-control" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirmer Mot de passe">
        </div>
        <div class="form-group">
            @error('password')
                <p class="text-red-500 mt-2">{{message}}</p>
            @enderror
            <input type="checkbox" name="role_id" id="role_id">
            <label class="" for="role_id" >Admin</label>
        </div>
        <div class="form-group mb-0">
            <button class="btn btn-primary btn-block" type="submit">S'inscrire</button>
        </div>
    </form>

    <div class="text-center dont-have">Vous avez deja un compte? <a href="{{route('login')}}">Se connecter</a> </div>

@endsection
