@extends('layouts.public')

@section('title')
	Publier une categorie 
@stop 

@section('content')
<div class="container">
	<div class="card m-3">
		<div class="card-header">Formulaire catégories</div>
		<div class="card-body">
			<form action="{{ url('category') }}" method="post">
				{{ csrf_field() }}
				@include('partials._form-errors')
				<div class="form-group{{ $errors->has('cat_name') ? ' has-error' : '' }}">
					<label for="exampleInputEmail1">Nom</label>
					<input type="text" class="form-control" id="cat_name" aria-describedby="cat_name" name="cat_name" placeholder="Nom de la catégorie">
					<small id="cat_name" class="form-text text-muted">...aide à la saisit</small>
					 <small class="text-danger">{{ $errors->first('cat_name') }}</small>
				</div>
				<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
					<label for="exampleInputEmail1">Tipe</label>
					<input type="text" class="form-control" id="cat_type" aria-describedby="cat_type" name="cat_type" placeholder="Type de catégorie">
					<small id="cat_type" class="form-text text-muted">...aide à la saisit</small>
				</div>
				<button type="submit" class="btn btn-primary float-right">Submit</button>
			</form>
		</div>
	</div>
	<div class="card m-3">
		<div class="card-header">Liste des catégories</div>
		<div class="card-body">
			<table id="table" class="display" style="width: 100%">
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
						<td>{{ $category->id }}</td>
						<td>{{ $category->cat_name }}</td>
						<td>{{ $category->cat_type }}</td>
						<td>{{ strftime('%d/%m/%Y', strtotime($category->created_at)) }}</td>
						<td>{{ strftime('%d/%m/%Y', strtotime($category->updated_at)) }}</td>
						<td>
							<i id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $category->id }}" style="color: #007bff;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="contacts-del" data-id="{{ $category->id }}" style="color: red;"></i>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>	
@stop
