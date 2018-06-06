@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-3">
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Gérer votre STOCK !

                    <div class="list-group m-3">
                      <span class="list-group-item active">Stock</span>
                      <a  href="{{ url('/stock/shopping') }}" class="list-group-item list-group-item-action">Faire les courses</a>
                      <a  href="{{ url('/stock/approvisionner') }}" class="list-group-item list-group-item-action"><b>Approvisionner</b> (au retour des courses)</a>
                      <a  href="{{ url('/stock/inventorier') }}" class="list-group-item list-group-item-action">Inventorier (remise en l'état du stock)</a>
                      <a  href="{{ url('/stock/sortir') }}" class="list-group-item list-group-item-action"><b>Sortie</b> de stock</a>
                      <a  href="{{ url('/stock/retourner') }}" class="list-group-item list-group-item-action">Retour en stock</a>
                    </div>

                    <div class="list-group m-3">
                      <span class="list-group-item active">Configuration</span>
                      <a  href="{{ url('/stock/categories') }}" class="list-group-item list-group-item-action">Catégories</a>
                      <a  href="{{ url('/stock/mesures') }}" class="list-group-item list-group-item-action">Mesures</a>
                      <a href="{{ url('/stock/semaines') }}" class="list-group-item list-group-item-action">Semaines</a>
                      <a  href="{{ url('/stock/produits') }}" class="list-group-item list-group-item-action">Produits</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
