@extends('layouts.public')

@section('title')
	Faire les courses
@stop

@section('content')
<div class="container-fluid">
	<!-- Display all products and allow to modify quantities by removing some in storage -->
	<div class="card m-3 cancel-side-margins" id="stockShopping">
		<div class="card-header">
			Liste des courses
			<button  class="btn btn-primary float-right" type="button" id="hide_done" >Voir tout/ce qui manque</button>
		</div>
		<div class="card-body table-container">
<!-- 			<form action="{{ url('shopping/sortir_update') }}" id="supply" method="post" name="supply"> -->
<!-- 				{{ csrf_field() }} {{ method_field('PUT') }} -->
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th class="hidden-on-small">Categorie </th>
						<th>Produit</th>
						<th>Quantité actuelle en stock</th>
						<th>Quantité à acheter MIN</th>
						<th>Quantité à acheter MAX</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayProduct as $product)
					<tr class="productline">
						<td class="responsive-td hidden-on-small" responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité actuelle">{{ $product->quantity . ' [' . $product->min_threshold . '/' . $product->max_threshold . ']' }}</td>
						<!-- allow to modify the product quantity by typping a quantity to be remove from storage -->
						<td class="responsive-td text-center" responsive-field="Min à acheter">
<!-- 							<input type="number" name="qte[{{ $product->id }}]" value=""> -->
								{{ $product->min_threshold - $product->quantity }}
						</td>
						<td class="responsive-td text-center" responsive-field="Max à acheter">
								{{ $product->max_threshold - $product->quantity }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
<!-- 			</form> -->
		</div>
	</div>
</div>
@stop
