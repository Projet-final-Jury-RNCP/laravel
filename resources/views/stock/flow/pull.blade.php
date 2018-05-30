@extends('layouts.public')

@section('title')
	Sortir
@stop

@section('content')
<div class="container-fluid">
	<div class="card m-3 cancel-side-margins" id="stockSupply">
		<div class="card-header">
			Sortir - des produits du stock
			<button  class="btn btn-primary float-right" type="button" id="supply_button" onclick="document.supply.submit()">Enregistrer</button>
		</div>
		<div class="card-body table-container">
			<form action="{{ url('stock/sortir_update') }}" id="supply" method="post" name="supply">
				{{ csrf_field() }} {{ method_field('PUT') }}
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>Categorie </th>
						<th>Produit</th>
						<th>Quantité actuelle en stock</th>
						<th>Quantité à sortir</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayProduct as $product)
					<tr style="{{ $product->active?:'text-decoration: line-through;' }}">
						<td class="responsive-td" responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité théorique">{{ $product->quantity }}</td>
						<td class="responsive-td text-center" responsive-field="Quantité à sortir">
							<input type="number" name="qte[{{ $product->id }}]" value="">
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
