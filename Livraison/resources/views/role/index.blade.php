@extends('partials.navbar')
@section('content')

    <div class="card mt-5">
        <div class="d-flex justify-content-end mt-5">
            <a href="{{ route('role.create') }}" class="btn btn-primary">
            Ajouter un Rôle
            </a>
        </div>
        @if(session('succes'))

        <div class="alert alert-danger">{{session('succes')}}</div>

        @endif
     <div class="table-responsive m-3">
        <table class="table table-bordered table-hover table-striped m-2">
            <thead>
            <tr>
                <td>Nom</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
            <tr>
                <th>{{ $role->name }}</th>
                <th>
                    <a href="{{ route('role.edit',['role' => $role->id]) }}" class="btn btn-primary" title="Modifier">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('role.destroy',['role' => $role->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce role ?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" title="Supprimer">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                    <a href="{{ route('role.show', $role->id) }}" class="btn btn-success" title="Voir">
                      <i class="fas fa-eye"></i>
                    </a>
                   </th>
            </tr>
            @endforeach
            </tbody>
        </table>
     </div>
    </div>
@endsection
