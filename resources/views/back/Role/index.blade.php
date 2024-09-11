@extends('back.app')

@section('title', 'Dashboard - Role')


@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Role</h4>
                <a href="{{route('role.create')}}" class="btn btn-primary float-right veiwbutton">Ajouter un role</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="datatable table-stripped table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID role</th>
                                    <th>Nom</th>
                                    <th>guard</th>
                                    <th>Etat</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>#00{{$role->id}} </td>
                                        <td>{{$role->name}} </td>
                                        <td>{{$role->guard_name}} </td>
                                        <td>
                                            <span class="badge badge-pill bg-success inv-badge">
                                                {{$role->isActive == true ? 'Actived' : 'Desactived'}}
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action"> 
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
                                                    <i class="fas fa-ellipsis-v ellipse_color"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right"> 
                                                    <a class="dropdown-item" href="{{route('role.edit', $role)}}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i>
                                                        Modifier
                                                    </a> 
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
                                                        @php
                                                           $role_delete = $role;
                                                        @endphp
                                                        <i class="fas fa-pencil-alt m-r-5"></i> Delete
                                                    </a>
                                                </div>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                            <div id="delete_asset" class="modal fade delete-modal" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <img src="{{asset("back_auth/assets/img/sent.png")}}" alt="" width="50" height="46" />
                                            <h3 class="delete_class">
                                                Etes vous sure de vouloir supprimer cet element ?
                                            </h3>
                                            <div class="m-t-20">
                                                <a href="#" class="btn btn-white" data-dismiss="modal">Fermer</a>
                                                <form @if(isset($role)) action="{{route('role.destroy', $role_delete)}}" @endif method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
