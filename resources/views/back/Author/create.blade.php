@extends('back.app')

@section('title', 'Dashboard - create author')


@section('hearder-content')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">
                @if (isset($author))
                    Modifier
                @else
                    Ajouter
                @endif auteur
            </h3>
        </div>
    </div>

@endsection

@if (isset($author))
    @php
        $fullname = $author->name;
        $name_array = preg_split('/[.@ ]/', $fullname);
        $name = $name_array[0];
        $prenoms_array = array_slice($name_array, 1);
        $prenoms = implode(' ', $prenoms_array);
    @endphp
@endif

@section('content')
    <div class="col-lg-12">
        <form action="{{ isset($author) ? route('author.update', $author) : route('author.store') }}" method="POST">
            @csrf
            @if (isset($author))
                @method('patch')
            @endif
            <div class="row formtype">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Prenom</label>
                        <input class="form-control" type="text" name="prenoms"
                            value="{{ isset($author) ? old('prenoms', $prenoms) : '' }}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control" type="text" name="name"
                            value="{{ isset($author) ? old('name', $name) : '' }}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email"
                            value="{{ isset($author) ? old('email', $author->email) : '' }}" />
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary buttonedit ml-2">
                Enregistrer
            </button>
        </form>
    </div>
    </div>
@endsection
