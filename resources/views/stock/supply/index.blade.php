@extends('layouts.public')

@section('title')
	Catégories
@stop

@section('content')
<div class="container-fluid">
	<div class="card m-3 cancel-side-margins" id="stockSupply">
		<div class="card-header">
			Inventaire - remise des qté du stock 
			<button  class="btn btn-primary float-right" type="button" id="supply_button" onclick="document.supply.submit()">Enregistrer</button>
		</div>
		<div class="card-body table-container">
			<form action="{{ url('stock/approvisionner_update') }}" id="supply" method="post" name="supply">
				{{ csrf_field() }} {{ method_field('PUT') }}
			<table id="table" class="table table-striped table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Categorie </th>
						<th>Produit</th>	
						<th>Quantité théorique</th>
						<th>Quantité réelle</th>
					</tr>
				</thead>
				<tbody>
					@foreach($stockSupply as $stockSupply)
					<tr>
						<td class="responsive-td" responsive-field="Categorie">{{ $stockSupply->product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $stockSupply->product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité théorique">{{ $stockSupply->quantity }}</td>
						<td class="responsive-td text-center" responsive-field="Quantité réelle">
							<input type="number" name="qte[{{ $stockSupply->id_product }}]" value="{{ $stockSupply->quantity }}">
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
