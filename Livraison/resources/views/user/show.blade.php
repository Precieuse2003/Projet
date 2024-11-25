<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Détail de {{$user->nom}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="form-control">Nom: {{$user->nom}}</p>
                        </div>
                        <div class="mb-3">
                            <p class="form-control">Rôle: {{$user->role ? $user->role->name : "RAS"}}</p>
                        </div>
                        <div class="mb-3">
                            <p class="form-control">Email: {{$user->email}}</p>
                        </div>
                        <div class="mb-3">
                            <p class="form-control">Téléphone: {{$user->telephone}}</p>
                        </div>
                        <div class="mb-3">
                            <p class="form-control">Adresse: {{$user->adresse}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
