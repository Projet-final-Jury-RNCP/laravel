@extends('layouts.public')

@section('title')
	Inventaire
@stop

@section('content')
<div class="container-fluid">
	<!-- Display the complete list of available products and allow quantity modifying -->
	<div class="card m-3 cancel-side-margins" id="stockSupplyInventory">
		<div class="card-header">
			Inventaire - remise à niveau des quantités des produits du stock
			<button  class="btn btn-primary float-right" type="button" id="supply_button" onclick="document.supply.submit()">Enregistrer</button>
		</div>
		<div class="card-body table-container">
			<form action="{{ url('stock/inventorier_update') }}" id="supply" method="post" name="supply">
				{{ csrf_field() }} {{ method_field('PUT') }}
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th class="hidden-on-small">Categorie </th>
						<th>Produit</th>
						<th>Quantité théorique</th>
						<th>Quantité réelle</th>
					</tr>
				</thead>
				<tbody>
					<!-- looping though each product -->
					@foreach($arrayProduct as $product)
					<tr style="{{ $product->active?:'text-decoration: line-through;' }}">
						<td class="responsive-td hidden-on-small" responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité théorique">{{ $product->quantity }}</td>
						<!-- allow to modify the product quantity by typping the real quantity seen in storage -->
						<td class="responsive-td text-center" responsive-field="Quantité réelle">
							<input type="number" name="qte[{{ $product->id }}]" value="{{ $product->quantity }}" min="0"> {{ $product->measureUnit->measure_symbol }}
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
