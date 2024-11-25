<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header text-center">
                <h3>Détail de {{$supermarche->nom_sup}}</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                         <p class="form-control">Nom: {{$supermarche->nom_sup}}</p>
                        </div>
                        <div class="mb-3">
                         <p class="form-control">Email: {{$supermarche->email_sup}}</p>
                        </div>
                         <p class="form-control">Adresse: {{$supermarche->adresse_sup}}</p><br>
                        <div class="mb-3">
                         <img src="{{ asset('storage/' . $supermarche->image_sup) }}" style="width: 150px; height: 150px;" class="form-control">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
