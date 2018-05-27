@extends('layouts.public')

@section('title')
	Catégories
@stop

@section('content')
<div class="container">
	<div class="card m-3" id="stockSupply">
		<div class="card-header">Gestion des approvisionnements</div>
		<div class="card-body">
			<table id="table" class="table table-striped table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>Categorie </th>
						<th>Produit</th>	
						<th>Quantité</th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($stockSupply as $stockSupply)
					<tr>
						<td class="responsive-td" responsive-field="Categorie">{{ $stockSupply->product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Produit">{{ $stockSupply->product->name }}</td>
						<td class="responsive-td" responsive-field="Quantité">{{ $stockSupply->quantity }}</td>
						<td class="text-center responsive-td">
							<i id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $stockSupply->id_product }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="cat-del" data-id="{{ $stockSupply->id_product }}" style="color:red;cursor:pointer;"></i>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
