@extends('back.app')

@section('title', 'Dashboard - add SocialMedia')

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">
                @if (isset($socialMedia))
                    Modifier
                @else
                    Ajouter
                @endif une un reseau social
            </h3>
        </div>
    </div>
@endsection



@section('content')
    <div class="col-lg-12">
        <form
            @if (isset($socialMedia)) action="{{ route('socialMedia.update', $socialMedia) }}" @else action="{{ route('socialMedia.store') }}" @endif
            method="POST">
            @csrf
            @if (isset($socialMedia))
                @method('patch')
            @endif
            <div class="row formtype">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nom du reseau</label>
                        <input class="form-control" type="text" name="name"
                            value="{{ isset($socialMedia) ? old('name', $socialMedia->name) : '' }}" />
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Lien</label>
                    <input class="form-control" type="text" name="link"
                        value="{{ isset($socialMedia) ? old('link', $socialMedia->link) : '' }}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Icon</label>
                    <input class="form-control" type="text" name="icon"
                        value="{{ isset($socialMedia) ? old('icon', $socialMedia->icon) : '' }}" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary buttonedit1">
                Enregistrer
            </button>
        </form>
    </div>
@endsection
