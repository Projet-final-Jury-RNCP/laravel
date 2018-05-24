@extends('layouts.public')

@section('title')
	Catégories
@stop

@section('content')
<div class="container">
	<div class="card m-3">
		<div class="card-header">Formulaire catégories</div>
		<div class="card-body">
			<form action="{{ url('stock/categories') }}" id="category" method="post" name="category">
				{{ csrf_field() }}
				@include('partials._form-errors')
				<div class="form-group{{ $errors->has('cat_name') ? ' has-error' : '' }}">
					<label for="exampleInputEmail1">Nom</label>
					<input type="text" class="form-control" id="cat_name" aria-describedby="cat_name" name="cat_name" placeholder="Nom de la catégorie" autocomplete="off">
<!-- 					<small id="cat_name" class="form-text text-muted">...aide à la saisie</small> -->
					<small class="text-danger">{{ $errors->first('cat_name') }}</small>
				</div>
				<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
					<label for="exampleInputEmail1">Tipe</label>
					<input type="text" class="form-control" id="cat_type" aria-describedby="cat_type" name="cat_type" placeholder="Type de catégorie" autocomplete="off">
<!-- 					<small id="cat_type" class="form-text text-muted">...aide à la saisie</small> -->
					<small class="text-danger">{{ $errors->first('cat_type') }}</small>
				</div>
				<button data-target="#update_modal" data-toggle="modal" data-source="cat-edit" id="update" type="button" class="btn btn-warning float-right" style="display: none;">Modifier</button>
				<button id="submit_form" type="submit" class="btn btn-primary float-right">Envoyer</button>
				<button id="new" type="button" class="btn btn-danger float-right mr-3" style="display: none;">Annuler</button>
			</form>
		</div>
	</div>
	<div class="card m-3">
		<div class="card-header">Liste des catégories</div>
		<div class="card-body">
			<table id="table" class="table table-striped table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Tipe</th>
						<th>Date de création</th>
						<th>Dernière modification</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td class="responsive-td" responsive-field="#">{{ $category->id }}</td>
						<td class="responsive-td" responsive-field="Nom">{{ $category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Tipe">{{ $category->cat_type }}</td>
						<td class="responsive-td" responsive-field="Date de création">{{ strftime('%d/%m/%Y', strtotime($category->created_at)) }}</td>
						<td class="responsive-td" responsive-field="Dernière modification">{{ strftime('%d/%m/%Y', strtotime($category->updated_at)) }}</td>
						<td class="text-center responsive-td">
							<i id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $category->id }}" style="color:#007bff;cursor:pointer;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="cat-del" data-id="{{ $category->id }}" style="color:red;cursor:pointer;"></i>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
