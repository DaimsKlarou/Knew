@extends('back.app')

@section('title', 'Dashboard - Social Media')

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Reseaux sociaux</h4>
                <a href="{{ route('socialMedia.create') }}" class="btn btn-primary float-right veiwbutton">
                    Ajouter un reseau sociale
                </a>
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
                                <th>ID Media</th>
                                <th>Icon</th>
                                <th>Nom</th>
                                <th>Lien</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socialMedias as $socialMedia)
                                <tr>
                                    <td>LIEN-000{{ $socialMedia->id }}</td>
                                    <td><i class="fab fa-{{ $socialMedia->icon }}"></i></td>
                                    <td>{{ $socialMedia->name }}</td>
                                    <td> <a href="{{ $socialMedia->link }}">{{ $socialMedia->link }}</a> </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action"> <a href="#"
                                                class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item"
                                                    href="{{ route('socialMedia.edit', $socialMedia) }}"><i
                                                        class="fas fa-pencil-alt m-r-5"></i>
                                                    Modifier</a> <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i>
                                                    Supprimer</a> </div>
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
@endsection
