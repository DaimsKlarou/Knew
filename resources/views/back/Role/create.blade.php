@extends('back.app')

@section('title', 'Dashboard - Create role')

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">@if(isset($role)) Modifier @else Ajouter @endif un role</h3>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form  action="{{ isset($role) ? route('role.update', $role) : route('role.store')}}" method="post">
                @csrf
                @if(isset($role))
                    @method('patch')
                @endif
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom de la role</label>
                            <input class="form-control" name="name" type="text" value="{{isset($role) ? old('name', $role->name) : old('name')}}"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>guard name</label>
                            <input class="form-control" name="guard_name" type="text" value="{{isset($role) ? old('guard_name', $role->name) : old('guard_name')}}"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Activation</label>
                            <select class="form-control" id="sel2" name="isActive" id="isActive" >
                                <option @if(isset($role)) @selected($role->isActive == 1) @endif value="1">Activer</option>
                                <option @if(isset($role)) @selected($role->isActive == 0) @endif value="0">Ne pas activer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
@endsection
