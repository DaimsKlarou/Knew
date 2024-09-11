@extends('back.app')

@section('title', 'Dashboard - settings')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form @if(isset($settings)) action="{{ route('settings.update') }}" @else action="{{ route('settings.store') }}" @endif method="POST">
                @csrf
                @if(isset($settings))
                    @method('PUT')
                @endif
                <h3 class="page-title">Paramètres de base</h3>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom du site <span class="text-danger">*</span></label>
                            <input class="form-control" type="text"name="web_site_name" placeholder="DiamilNews"
                                value="{{ isset($settings) ? old('web_site_name', $settings->web_site_name) : old('web_site_name') }}" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Uploader une image</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="logo" />
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" placeholder="Washington-DC" type="text" name="address"
                                value="{{ isset($settings) ? old('address', $settings->address) : old('address') }}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Numero de telephone</label>
                            <input class="form-control" id="phone" placeholder="734875938" type="text" name="phone"
                                value="{{ isset($settings) ? old('phone', $settings->phone) : old('phone') }}" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" placeholder="diamilnews@gmail.com" type="email" name="email"
                                value="{{ isset($settings) ? old('email', $settings->email) : old('email') }}" />
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="about">
                                {{ isset($settings) ? old('about', $settings->about) : old('about') }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit mr-2 mt-2 mb-3">
                    Save modification
                </button>
            </form>
        </div>
    </div>
@endsection
