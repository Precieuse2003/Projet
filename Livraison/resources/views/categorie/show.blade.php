  @extends('partials.navbar')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                <h3>Catégorie</h3>
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                        <p class="form-control">{{$categorie->nom}}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection