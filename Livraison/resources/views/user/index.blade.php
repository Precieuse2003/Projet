<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"></script>
@extends('partials.navbar')
@section('content')
<div class="card mt-5">
    <div class="d-flex justify-content-end mt-5">
        <a href="{{ route('user.create') }}" class="btn btn-primary">
            Ajouter Utilisateur
        </a>
    </div>

    @if(session('succes'))
        <div class="alert alert-success">{{ session('succes') }}</div>
    @endif

    <div class="table-responsive m-3">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <th>{{$user->role ? $user->role->name : "RAS"}}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->adresse }}</td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('user.edit', ['user' => $user->id]) }}" title="modifier" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('user.destroy',['user' => $user->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Supprimer">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </form>
                              <a href="{{ route('user.show', $user->id) }}" class="btn btn-success" title="Voir">
                                <i class="fas fa-eye"></i>
                              </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
