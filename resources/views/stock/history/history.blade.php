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
<!-- 			<button  class="btn btn-primary float-right" type="button" id="hide_done" >Voir tout/ce qui manque</button> -->
		</div>
		<div class="card-body table-container">
<!-- 			<form action="{{ url('shopping/sortir_update') }}" id="supply" method="post" name="supply"> -->
<!-- 				{{ csrf_field() }} {{ method_field('PUT') }} -->
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>Date</th>
						<th class="hidden-on-small">Categorie</th>
						<th>Produit</th>
<!-- 						<th>ID</th> -->
						<th>Ajouté</th>
						<th>Retiré</th>
						<th>Prix</th>
						<th>Qui</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
					@foreach($arrayStockHistory as $stockHistory)
					<tr class="no_productline">
						<td class="responsive-td" responsive-field="Date">{{ $stockHistory->created_at->format('Y-m-d h:i:s') }}</td>
						<td class="responsive-td hidden-on-small" responsive-field="Cat.">{{ $stockHistory->product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $stockHistory->product->name }}</td>
<!-- 						<td class="responsive-td" responsive-field="Quantité actuelle">{{ $stockHistory->id }}</td> -->
						<!-- allow to modify the product quantity by typping a quantity to be remove from storage -->
						<td class="responsive-td text-center" responsive-field="Ajouté">
						{{ $stockHistory->quantity_add }}
						</td>
						<td class="responsive-td text-center" responsive-field="Retiré">
						{{ $stockHistory->quantity_rem }}
						</td>
						<td class="responsive-td text-center" responsive-field="Prix">
						{{ $stockHistory->unit_price }}
						</td>
						<td class="responsive-td text-center" responsive-field="Qui">
						{{ $stockHistory->user->name }}
						</td>
						<td class="responsive-td" responsive-field="Type">{{ $stockHistory->typestock }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
<!-- 			</form> -->
		</div>
	</div>


	<div class="card m-3 cancel-side-margins" id="stockHistoryDatePrice">
		<div class="card-header">
			Prix par mois
<!-- 			<button  class="btn btn-primary float-right" type="button" id="hide_done" >Voir tout/ce qui manque</button> -->
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
						<td class="responsive-td" responsive-field="Date">{{ $datePrice->date }}</td>
						<td class="responsive-td text-right" responsive-field="Prix">{{ $datePrice->price }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


</div>
@stop
