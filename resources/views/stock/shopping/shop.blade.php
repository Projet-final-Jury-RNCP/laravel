@extends('layouts.public')

@section('title')
	Faire les courses
@stop

@section('content')
<div class="container-fluid">
	<!-- Display all products and allow to modify quantities by removing some in storage -->
	<div class="card m-3 cancel-side-margins" id="stockShopping">
		<div class="card-header">
			Liste des courses (<b class="shopping-infos">{{ $week->name }}</b>) - En cours/total : <b id="total_select" class="shopping-infos">0</b>/<span id="total">0</span>€
			<script type="text/javascript">var total = {{ $total }} , totalSelect=0; $("#total").text(total.toFixed(2));</script>
			<div class="float-right">
				<button class="btn btn-primary float-right ml-5" onclick="printShop()"><i class="fa fa-print"></i> imprimer</button>
				<a href="{{ url('stock/shoppingpdf/' . $week->id) }}" class="btn btn-secondary float-right ml-5"><i class="fa fa-file-pdf-o"></i> pdf</a>
				<div style="float: right; text-align: center; width: 200px;">
					<label>Ce qui manque/voir tout</label>
					<div class="switch" style="margin: auto; width: 75px;">
						<input id="hide_done" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked="checked" autocomplete="off">
						<label for="hide_done"></label>
					</div>
				</div>
			</div>

		</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th class="hidden-on-small">Categorie</th>
						<th>Produit</th>
						<th>Description</th>
						<th>Quantité à acheter</th>
						<th>Unité</th>
						<th>price</th>
						<th>added</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayProduct as $product)
					<tr class="productline">
						<td class="responsive-td hidden-on-small" data-responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" data-responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" data-responsive-field="Description">{{ $product->description }}</td>
						<!-- allow to modify the product quantity by typping a quantity to be remove from storage -->
						<td class="responsive-td text-center" data-responsive-field="Max à acheter">{{ $product->max_threshold - $product->quantity }}</td>
						<td class="responsive-td" data-responsive-field="U.">{{ $product->measure_symbol }}</td>
						<td>{{$product->unit_price}}</td>
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
