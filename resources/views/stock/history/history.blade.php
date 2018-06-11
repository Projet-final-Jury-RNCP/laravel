@extends('layouts.public')

@section('title')
	Historique
@stop

@section('content')
<div class="container-fluid">
	<!-- Display all products and allow to modify quantities by removing some in storage -->
	<div class="card m-3 cancel-side-margins" id="stockHistory">
		<div class="card-header">
			Historique
		</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>Date</th>
						<th class="hidden-on-small">Categorie</th>
						<th>Produit</th>
						<th>Ajouté</th>
						<th>Retiré</th>
						<th>Prix u.</th>
						<th>Qui</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayStockHistory as $stockHistory)
					<tr class="no_productline">
						<td class="responsive-td" data-responsive-field="Date">{{ $stockHistory->created_at->format('Y-m-d h:i:s') }}</td>
						<td class="responsive-td hidden-on-small" data-responsive-field="Cat.">{{ $stockHistory->product->category->cat_name }}</td>
						<td class="responsive-td" data-responsive-field="Produit">{{ $stockHistory->product->name }}</td>
						<td class="responsive-td text-center" data-responsive-field="Ajouté">{{ $stockHistory->quantity_add }}</td>
						<td class="responsive-td text-center" data-responsive-field="Retiré">{{ $stockHistory->quantity_rem }}</td>
						<td class="responsive-td text-center" data-responsive-field="Prix unitaire">{{ $stockHistory->unit_price }}</td>
						<td class="responsive-td text-center" data-responsive-field="Qui">{{ $stockHistory->user->name }}</td>
						<td class="responsive-td" data-responsive-field="Type">{{ $stockHistory->typestock }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


	<div class="card m-3 cancel-side-margins" id="stockHistoryDatePrice">
		<div class="card-header">
			Prix par mois
		</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>Date</th>
						<th>Prix</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayDatePrice as $datePrice)
					<tr class="no_productline">
						<td class="responsive-td" data-responsive-field="Date">{{ $datePrice->date }}</td>
						<td class="responsive-td text-right" data-responsive-field="Prix">{{ $datePrice->price }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>
@stop
