@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Vous êtes connecté ! DANS LE STOCK !


                    <div class="list-group m-3">
                      <a href="#" class="list-group-item active">
                        Stock
                      </a>
                      <a href="/stock/consulter" class="list-group-item list-group-item-action">Consulter</a>
                      <a href="/stock/approvisionner" class="list-group-item list-group-item-action">Approvisionner</a>
                    </div>
                    
                    <div class="list-group m-3">
                      <a href="#" class="list-group-item active">
                        Repas
                      </a>
                      <a href="/stock/repas" class="list-group-item list-group-item-action">Consulter / Créer / Sortie et retour en stock</a>
                    </div>
                    
                    <div class="list-group m-3">
                      <a href="#" class="list-group-item active">
                        Configuration
                      </a>
                      <a href="/stock/categories" class="list-group-item list-group-item-action">Catégories</a>
                      <a href="/stock/mesures" class="list-group-item list-group-item-action">Mesures</a>
                      <a href="/stock/produits" class="list-group-item list-group-item-action">Produits</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
