@extends('back.app')

@section('title', 'Dashboard - Author page')

@php
    $author_delete = null;
@endphp

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Les Auteurs</h4>
                <a href="{{route('author.create')}}" class="btn btn-primary float-right veiwbutton">Ajouter un auteur</a>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="table-responsive">
                    <table class="datatable table-stripped table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                                <tr>
                                    <td>AUT-00{{ $author->id }} </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle" src="{{ $author->imageUrl() }}"
                                                    alt="User Image" /></a>
                                            <a href="{{ route('author.show', $author) }}">{{ $author->name }} </a>
                                        </h2>
                                    </td>
                                    <td>{{ $author->email }} </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('author.edit', $author) }}"><i
                                                        class="fas fa-pencil-alt m-r-5"></i>
                                                    Modifier</a>

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_asset">
                                                    @php
                                                        $author_delete = $author;
                                                    @endphp
                                                    <i class="fas fa-pencil-alt m-r-5"></i> Supprimer
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('back_auth/assets/img/sent.png') }}" alt="" width="50" height="46">
                    <h3 class="delete_class">Etes vous sure de vouloir supprimer cet element?</h3>
                    <div class="m-t-20 ">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <form
                            @if (isset($author_delete)) action="{{ route('author.destroy', $author_delete) }}" @else action="" @endif
                            method="POST">
                            @csrf

                            @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
