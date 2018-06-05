@extends('layouts.public')

@section('title')
	Choix de la semaine
@stop

@section('content')
<div class="container-fluid">

	<!-- Display the complete list of available products -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des produits - choix de la semaine
			<button  class="btn btn-primary float-right" type="button" id="create_button" onclick="todo_lien_vers_creation">Créer (TODO lien vers la création d'une nouvelle semaine)</button>
		</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped products-table table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					<!-- start looping though each product -->
					@foreach($weeks as $week)
					<tr>
						<td class="responsive-td" data-responsive-field="#">{{ $week->id }}</td>
						<td class="responsive-td" data-responsive-field="Nom">{{ $week->name }}</td>
						<td class="text-center responsive-td">
							<a href="/stock/produits/semaines/{{ $week->id }}"><i id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $week->id }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i></a>
						<!--
							TODO : l'édition/suppression
							<i onclick="editRow(this)" id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $week->id }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="product-del" data-id="{{ $week->id }}" style="color:red;cursor:pointer;"></i>
					    -->
						</td>
					</tr>
					@endforeach
					<!-- end looping though each product -->
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
