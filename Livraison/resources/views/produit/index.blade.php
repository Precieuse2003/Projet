@extends('partials.navbar')
@section('content')

    <div class="card mt-5">

        <div class="d-flex justify-content-end mt-5">
            <a href="{{ route('produit.create') }}" class="btn btn-primary">
                Ajouter Produit
            </a>
        </div>

        @if(session('succes'))

          <div class="alert alert-success">{{session('succes')}}</div>

        @endif
     <div class="table-responsive m-3">
        <table class="table table-bordered table-hover table-striped m-3">
            <thead>
             <tr>
                <td>Image</td>
                <td>Nom</td>
                <td>Description</td>
                <td>Catégorie</td>
                <td>Prix</td>
                <td>En stock</td>
                <td>Supermarché</td>
                <td>Action</td>
             </tr>
            </thead>
            <tbody >
                @foreach ($produits as $produit)
                    <tr>
                     <th><img src="{{ asset('storage/images/' . $produit->image) }}"  alt="{{ $produit->nom }}" style="width: 150px; height: 150px;"></th>
                     <th> {{$produit->nom}} </th>
                     <th> {{$produit->description}} </th>
                     <th>{{$produit->categorie ? $produit->categorie->nom : "RAS"}}</th>
                     <th> {{$produit->prix}} </th>
                     <th> {{$produit->en_stock}} </th>
                     <th> {{$produit->supermarche ? $produit->supermarche->nom_sup : "RAS"}} </th>
                     <th>
                        <a href="{{ route('produit.edit',['produit' => $produit->id]) }}" class="btn btn-primary" title="Modifier">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('produit.destroy',['produit' => $produit->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" title="Supprimer">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                        <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-success" title="Voir">
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
