@extends('layouts.public')

@section('title')
	Catégories
@stop

@section('content')
<div class="container">
	<div class="card m-3" id="stockSupply">
		<div class="card-header">Gestion des approvisionnements <button  data-target="#update_modal" data-toggle="modal" data-source="sup-edit" data-token="{{ csrf_token() }}" class="btn btn-primary float-right" type="button" id="supply_button">Enregistrer</button></div>
		<div class="card-body">
			<table id="table" class="table table-striped table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Categorie </th>
						<th>Produit</th>	
						<th>Quantité initiale</th>
						<th>Quantité actuelle</th>
					</tr>
				</thead>
				<tbody>
					@foreach($stockSupply as $stockSupply)
					<tr>
						<td class="responsive-td" responsive-field="Categorie">{{ $stockSupply->product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $stockSupply->product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité initiale">{{ $stockSupply->quantity }}</td>
						<td class="responsive-td text-center" responsive-field="Quantité actuelle">
							<input type="number" name="qte_{{ $stockSupply->id_product }}" value="{{ $stockSupply->quantity }}">
							<input type="hidden" name="index_{{ $stockSupply->id_product }}" value="{{ $stockSupply->id_product }}">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
