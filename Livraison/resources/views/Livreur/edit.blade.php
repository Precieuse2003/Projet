<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')

<h3>Modifier un livreur</h3>
<form action="{{route('livreur.update', ['livreur' => $livreur->id])}}" method="POST">
    @csrf
    @method('put')
    <input type="text" name="nom_liv" value="{{$livreur->nom}}" class="m-2"><br>
    @error('nom') 
    <p>{{$message}}</p>
    @enderror
    <input type="" name="role" value="{{$livreur->role}}" class="m-2"><br>
    @error('role') 
    <p>{{$message}}</p>
    @enderror
    <input type="email" name="email" value="{{$livreur->email}}" class="m-2"><br>
    @error('email') 
    <p>{{$message}}</p>
    @enderror
    <input type="number" name="telephone" value="{{$livreur->telephone}}" class="m-2"><br>
    @error('telephone') 
    <p>{{$message}}</p>
    @enderror
    <input type="text" name="adresse" value="{{$livreur->adresse}}" class="m-2"><br>
    @error('adresse') 
    <p>{{$message}}</p>
    @enderror
    <button type="submit" >Enregistrer</button>
</form>
@endsection