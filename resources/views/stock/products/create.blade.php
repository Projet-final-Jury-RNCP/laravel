@extends('layouts.public')

@section('title')
	Produits
@stop

@section('content')
<div class="container-fluid">
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Formulaire Produits</div>
		<div class="card-body">
			<form action="{{ url('stock/products') }}" id="product" method="post" name="product">
				{{ csrf_field() }}
				<input id="index" name="index" type="hidden">
				<div class="form-group">
					<label for="exampleInputEmail1">Nom</label>
					<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" aria-describedby="name" name="name" placeholder="Nom du produit" required>
					<small class="text-danger">{{ $errors->first('name') }}</small>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Description</label>
					<textarea class="form-control" id="description" aria-describedby="description" name="description"></textarea>
				</div>
                <div class="row">
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
                    	<label for="category">Catégorie : </label><br />
                        <select name="category" id="category">
                           @foreach($categories as $category)
                               <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                           @endforeach
                        </select>
                	</div>
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
                    	<label for="measure">Unité de mesure : </label><br />
                        <select name="measure" id="measure">
                           @foreach($measures as $measure)
                               <option value="{{ $measure->id }}">{{ $measure->measure_name . ' (' . $measure->measure_symbol . ')' }}</option>
                           @endforeach
                        </select>
                	</div>
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
            			<label for="min_threshold">Quantité minimale</label>
                  		<input type="number" class="form-control" id="min_threshold" name="min_threshold">
                	</div>
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
            			<label for="max_threshold">Quantité maximale</label>
                  		<input type="number" class="form-control" id="max_threshold" name="max_threshold">
                	</div>
                </div>
				<button data-target="#update_modal" data-toggle="modal" data-source="product-edit" id="update" type="button" class="btn btn-warning float-right" style="display: none;">Modifier</button>
				<button id="submit_form" type="submit" class="btn btn-primary float-right">Envoyer</button>
				<button id="new" type="button" class="btn btn-danger float-right mr-3" style="display: none;">Annuler</button>
			</form>
		</div>
	</div>
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des produits</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered" style="width: 100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Description</th>
						<th>Catégorie</th>
						<th>Unité de mesure</th>
						<th>Quantité minimale</th>
						<th>Quantité maximale</th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)

<?php

// dump($product);
// dump();

?>

					<tr style="{{ $product->active?:'text-decoration: line-through;' }}">
						<td class="responsive-td" responsive-field="#">{{ $product->id }}</td>
						<td class="responsive-td" responsive-field="Nom">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Description">{{ $product->description }}</td>
						<td class="responsive-td" responsive-field="Catégorie">{{ $product->category->cat_name }}</td>
						<td class="responsive-td" responsive-field="Unité de mesure">{{ $product->measureUnit->measure_symbol }}</td>
						<td class="responsive-td" responsive-field="Quantité minimale">{{ $product->min_threshold }}</td>
						<td class="responsive-td" responsive-field="Quantité maximale">{{ $product->max_threshold }}</td>
						<td class="text-center responsive-td">
							<i onclick="editRow(this)" id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $product->id }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="product-del" data-id="{{ $product->id }}" style="color:red;cursor:pointer;"></i>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
