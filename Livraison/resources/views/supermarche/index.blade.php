<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')
<div class="card mt-5">
<div class="d-flex justify-content-end mt-5">
<a href="{{ route('supermarche.create') }}" class="btn btn-primary">
  Ajouter un Supermarché
</a>

</div>
@if(session('succes'))

  <div class="alert alert-danger">{{session('succes')}}</div>

@endif

<div class="table-responsive m-3">
<table class="table table-bordered table-hover table-striped m-3">
    <thead>
      <tr>
        <td>Nom</td>
        <td>Email</td>
        <td>Adresse</td>
        <td>Image</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($supermarches as $supermarche)
      <tr>
        <th>{{ $supermarche->nom_sup }}</th>
        <th>{{ $supermarche->email_sup }}</th>
        <th>{{ $supermarche->adresse_sup }}</th>
        <th>
          <img src="{{ asset('storage/' . $supermarche->image_sup) }}" alt="{{ $supermarche->nom_sup }}" style="width: 150px; height: 150px;">
        </th>
        <th >
            <div style="display: flex; gap: 5px;">
                <a href="{{ route('supermarche.edit', ['supermarche' => $supermarche->id]) }}" title="modifier" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <form action="{{ route('supermarche.destroy',['supermarche' => $supermarche->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" title="Supprimer">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                  <a href="{{ route('supermarche.show', $supermarche->id) }}" class="btn btn-success" title="Voir">
                    <i class="fas fa-eye"></i>
                  </a>
            </div>
           </th>
      </tr>
      @endforeach
    </tbody>
  </table>
 </div>
</div>
@endsection
