@extends('layouts.public')

@section('title')
	Retourner des produits dans le stock
@stop

@section('content')
<div class="container-fluid">
	<!-- Display all products and allow to modify quantities by adding some in storage -->
	<div class="card m-3 cancel-side-margins" id="stockFlowPush">
		<div class="card-header">
			Retourner - des produits dans le stock
			<button  class="btn btn-primary float-right" type="button" id="supply_button" onclick="document.supply.submit()">Enregistrer</button>
		</div>
		<div class="card-body table-container">
			<form action="{{ url('stock/retourner_update') }}" id="supply" method="post" name="supply">
				{{ csrf_field() }} {{ method_field('PUT') }}
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th class="hidden-on-small">Categorie </th>
						<th>Produit</th>
						<th>Quantité actuelle en stock</th>
						<th>Quantité à retourner</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayProduct as $product)
					<tr style="{{ $product->active?:'text-decoration: line-through;' }}">
						<td class="responsive-td hidden-on-small" data-responsive-field="Categorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" data-responsive-field="Produit">{{ $product->name }}</td>
						<td class="responsive-td" data-responsive-field="Qté en stock">{{ $product->quantity }}</td>
						<!-- allow to modify the product quantity by typping a quantity to be add in storage -->
						<td class="responsive-td text-center" data-responsive-field="Qté à réintégrer">
							<input id="qte_{{$loop->index}}" type="number" name="qte[{{ $product->id }}]" value="" min="0">
							<input type="button" onclick="plusX(1,{{$loop->index}})" value="+1">
							<input type="button" onclick="plusX(5,{{$loop->index}})" value="+5">
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
