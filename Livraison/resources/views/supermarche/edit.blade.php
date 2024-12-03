<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Modifier {{$supermarche->nom_sup}}</h3>
                </div>
                <div class="card-body">
                  <form action="{{route('supermarche.update', $supermarche->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                      <div class="mb-3">
                         <input type="text" name="nom_sup" value="{{$supermarche->nom_sup}}" class="form-control">
                            @error('nom_sup')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                      </div>

                      <div class="mb-3">
                        <input type="email" name="email_sup" value="{{$supermarche->email_sup}}" class="form-control">
                            @error('email')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                      </div>

                     <div class="mb-3">
                        <input type="text" name="adresse_sup" value="{{$supermarche->adresse_sup}}" class="form-control">
                            @error('adresse')
                            <div class="text-danger" style="font-size: 14px;">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="mb-3">
                     <input type="file" name="image_sup" value="{{$supermarche->image_sup}}" class="form-control">
                    @error('image')
                    <p>{{message}}</p>
                    @enderror
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
