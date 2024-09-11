@extends('back.app')

@section('title', 'Dashboard - article')

@section('header-content')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Articles</h4>
                <a href="{{route('article.create')}}" class="btn btn-primary float-right veiwbutton ">Ajouter un article</a>
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
                                    <th>ID Article</th>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Categorie</th>
                                    <th>Date</th>
                                    <th>Publication</th>
                                    <th>Partage</th>
                                    <th>Commentaires</th>
                                    <th>Auteur</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>#ART-000{{$article->id}}</td>
                                        <td>
                                            <img src="{{ $article->imageUrl() }}" alt="Article Image"  width="100" height="100"/>
                                        </td>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->category->name}}</td>
                                        <td>{{ date('d-m-Y', $article->create_at) }}</td>
                                        <td>
                                            <div class="actions"> 
                                                @if($article->isActive == true)
                                                    <a href="#" class="btn btn-sm bg-success-light mr-2">
                                                        Publié
                                                    </a> 
                                                @else
                                                    <a href="#" class="btn btn-sm bg-danger-light mr-2">
                                                        Non Publié
                                                    </a> 
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="actions"> 
                                                @if($article->isSharable == true)
                                                    <a href="#" class="btn btn-sm bg-success-light mr-2">
                                                        Active
                                                    </a> 
                                                @else
                                                    <a href="#" class="btn btn-sm bg-danger-light mr-2">
                                                        Non Active
                                                    </a> 
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="actions"> 
                                                @if($article->isComment == true)
                                                    <a href="#" class="btn btn-sm bg-success-light mr-2">
                                                        Active
                                                    </a> 
                                                @else
                                                    <a href="#" class="btn btn-sm bg-danger-light mr-2">
                                                        Non Active
                                                    </a> 
                                                @endif
                                            </div>
                                        </td>
                                        <td>  
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{$article->author->imageUrl()}}" alt="User Image"></a>
                                                <a href="#">{{$article->author->name}}</span></a>
                                            </h2>
                                            
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{route('article.show', $article)}}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i> Voir
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('article.edit', $article)}}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i> Modifier
                                                    </a>
                                                    {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
                                                        <form @if(isset($article)) action="{{route('article.destroy', $article)}}" @endif method="POST" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="border-0 bg-transparent">
                                                                <i class="fas fa-pencil-alt m-r-5"></i> Delete
                                                            </button>
                                                        </form>
                                                    </a> --}}
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
                                                        @php
                                                           $article_delete = $article;
                                                        @endphp
                                                        <i class="fas fa-pencil-alt m-r-5"></i> Delete
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
    </div>
    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center"> 
                    <img src="{{ asset('back_auth/assets/img/sent.png') }}" alt="" width="50" height="46">
                    <h3 class="delete_class">Etes vous sure de vouloir supprimer cet element?</h3>
                    <div class="m-t-20 "> 
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <form @if(isset($article)) action="{{route('article.destroy', $article_delete)}}" @endif method="POST">
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
