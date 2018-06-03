@extends('layouts.public')

@section('title')
	Faire les courses
@stop

@section('content')
<div class="container-fluid">
	<!-- Display all products and allow to modify quantities by removing some in storage -->
	<div class="card m-3 cancel-side-margins" id="stockShopping">
		<div class="card-header">
			Liste des courses - Total  <b id="total"></b>
			<script type="text/javascript">var total = {{ $total }}; $("#total").text(" : "+total.toFixed(2)+ "€");</script>
			<div class="float-right">
				<button class="btn btn-primary float-right ml-5" onclick="printShop()">imprimer</button>
				<a href="{{ url('stock/shoppingpdf') }}" class="btn btn-secondary float-right ml-5">pdf</a>
				<div style="float: right; text-align: center; width: 200px;">
					<label>Ce qui manque/voir tout</label>
					<div class="switch" style="margin: auto; width: 75px;">
						<input id="hide_done" class="cmn-toggle cmn-toggle-round-flat" type="checkbox" checked="checked">
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
					</tr>
				</thead>
				<tbody>
					@foreach($arrayProduct as $product)
					<tr class="productline">
						<td class="responsive-td hidden-on-small" responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Description">{{ $product->description }}</td>
						<!-- allow to modify the product quantity by typping a quantity to be remove from storage -->
						<td class="responsive-td text-center" responsive-field="Max à acheter">
							{{ $product->max_threshold - $product->quantity }}
							<input type="hidden" name="prix" value="{{$product->unit_price}}">
							<input type="hidden" name="qte" value="{{$product->quantity}}">
							<input type="hidden" name="added" value="">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
