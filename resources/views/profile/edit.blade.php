@extends('back.app')
@section('title', 'profile')

@php
    $fullname = Auth::user()->name;
    $name_array = preg_split('/[.@ ]/', $fullname);
    $name = $name_array[0];
    $prenoms_array = array_slice($name_array, 1);
    $prenoms = implode(" ", $prenoms_array);
@endphp

@section('content')
    <div class="row">
        <div class="col">
            <h3 class="page-title">Profile</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#"> <img class="rounded-circle" alt="User Image"
                                src="{{ Auth::user()->imageUrl() }}"> </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-3"> {{ $name.' '.$prenoms }} </h4>
                        <h5 class="text-muted mt-1">{{ucwords(Auth::user()->role->name)}} </h5>
                    </div>

                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"> <a class="nav-link active rounded" data-toggle="tab" href="#per_details_tab">A
                            propos</a> </li>
                    <li class="nav-item"> <a class="nav-link rounded" data-toggle="tab" href="#password_tab">Mot de
                            passe</a> </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Informations Personelles</span>
                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                class="fa fa-edit mr-1"></i>Modifier
                                        </a>
                                    </h5>
                                    <div class="row mt-5">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Prenom</p>
                                        <p class="col-sm-9">{{$prenoms}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Nom</p>
                                        <p class="col-sm-9">{{$name}}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                                        <p class="col-sm-9">
                                            <a href="">{{ Auth::user()->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Personal Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <div class="row form-row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Prenoms</label>
                                                            <input type="text" class="form-control" value="{{$prenoms}}" name="prenoms">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom</label>
                                                            <input type="text" class="form-control" value="{{$name}}" name="name">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control"
                                                                value="{{Auth::user()->email}}" name="email">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Profile's picture</label>
                                                            <input type="file" class="form-control" name="image">
                                                        </div>
                                                    </div>


                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Enregistrer
                                                    les modifications</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Modifier le mot de passe</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form action="{{route('password.update')}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label>mot de passe Actuel</label>
                                            <input type="password" class="form-control" name="current_password">
                                            @error('current_password')
                                                <p class="text-red-500"> {{message}} </p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nouveau mot de passe</label>
                                            <input type="password" class="form-control" name="password">
                                            @error('password')
                                                <p class="text-red-500"> {{message}} </p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmer motde passe</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                            @error('password_confirmation')
                                                <p class="text-red-500"> {{message}} </p>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Enregistrer les
                                            modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
