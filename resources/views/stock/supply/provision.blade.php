@extends('layouts.public')

@section('title')
	Approvisionner
@stop

@section('content')
<div class="container-fluid">
	<!-- Display all products and allow to modify quantities by adding some in storage -->
	<div class="card m-3 cancel-side-margins" id="stockSupply">
		<div class="card-header">
			Approvisionner - ajouter une livraison de produits
			<button  class="btn btn-primary float-right" type="button" id="supply_button" onclick="document.supply.submit()">Enregistrer</button>
		</div>
		<div class="card-body table-container">
			<form action="{{ url('stock/approvisionner_update') }}" id="supply" method="post" name="supply">
				{{ csrf_field() }} {{ method_field('PUT') }}
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>Categorie </th>
						<th>Produit</th>
						<th>Quantité actuelle en stock</th>
						<th>Quantité à ajouter</th>
						<th>Prix unitaire</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayProduct as $product)
					<tr style="{{ $product->active?:'text-decoration: line-through;' }}">
						<td class="responsive-td" responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité actuelle en stock">{{ $product->quantity }}</td>
						<!-- allow to modify the product quantity by typping a quantity to be add in storage -->
						<td class="responsive-td" responsive-field="Quantité à ajouter">
							{{ $product->measureUnit->measure_symbol }} <input type="number" name="qte[{{ $product->id }}]" value="" min="0">
						</td>
						<td class="responsive-td" responsive-field="Prix unitaire">
							€ <input type="number" name="prices[{{ $product->id }}]" value="" min="0" step=".01">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</form>
		</div>
	</div>
</div>
@stop
