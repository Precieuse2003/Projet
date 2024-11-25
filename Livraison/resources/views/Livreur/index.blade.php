@extends('partials.nav')
@section('content')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>

<div class="d-flex justify-content-end m-2">
<a href="{{ route('livreur.create') }}" class="btn btn-primary">
  Ajouter Livreur
</a>

</div>
@if(session('succes'))

  <div class="alert alert-danger">{{session('succes')}}</div>

@endif


<table class="table table-bordered table-hover table-striped m-3">
    <thead>
      <tr>
        <td>Nom</td>
        <td>Email</td>
        <td>Téléphone</td>
        <td>Adresse</td>
        <td>Statut</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($livreurs as $livreur)
      <tr>
        <th>{{ $livreur->nom }}</th>
        <th>{{ $livreur->email }}</th>
        <th>{{ $livreur->telephone }}</th>
        <th>{{ $livreur->adresse }}</th>
        <th>{{ $livreur->statut }}</th>
        <th style="width: 320px;">
          <a href="{{ route('livreur.edit',['livreur' => $livreur->id]) }}" class="btn btn-primary">Modifier</a>
          <form action="{{ route('livreur.destroy', ['livreur' => $livreur->id]) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
          <a href="{{ route('livreur.show', ['livreur' => $livreur->id]) }}" class="btn btn-success">Voir</a>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection
