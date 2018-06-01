@extends('layouts.public')

@section('title')
	Produits
@stop

@section('content')
<div class="container-fluid">
	<!-- The form to add or edit a product -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Formulaire Produits</div>
		<div class="card-body">
			<form action="{{ url('stock/produits') }}" id="product" method="post" name="product">
				{{ csrf_field() }}
				<input id="index" name="index" type="hidden">
				<div class="form-group">
					<label for="name">Nom</label>
					<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" aria-describedby="name" name="name" placeholder="Nom du produit" required value="{{ old('name') }}">
					<small class="text-danger">{{ $errors->first('name') }}</small>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" aria-describedby="description" name="description">{{ old('description') }}</textarea>
					<small class="text-danger">{{ $errors->first('description') }}</small>
				</div>
                <div class="row">
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
                    	<label for="id_category">Catégorie : </label><br />
                        <select name="id_category" id="id_category">
                            <!-- looping though each category -->
                           	@foreach($categories as $category)
                               <option value="{{ $category->id }}" <?php if( $category->id == old('id_category')) echo ' selected'; ?>>{{ $category->cat_name }}</option>
                           	@endforeach
                        </select>
                	</div>
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
                    	<label for="id_measure_unit">Unité de mesure : </label><br />
                        <select name="id_measure_unit" id="id_measure_unit">
                            <!-- looping though each unit of measurement -->
                          	@foreach($measures as $measure)
                               <option value="{{ $measure->id }}" <?php if( $measure->id == old('id_measure_unit')) echo ' selected'; ?>>{{ $measure->measure_name . ' (' . $measure->measure_symbol . ')' }}</option>
                           	@endforeach
                        </select>
                	</div>
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
            			<label for="min_threshold">Quantité minimale</label>
                  		<input type="number" class="form-control" id="min_threshold" name="min_threshold" placeholder="0" min="0" value="{{ old('min_threshold') }}">
						<small class="text-danger">{{ $errors->first('min_threshold') }}</small>
						@if(session()->has('is_update') && sizeof($errors) > 0)
							<script type="text/javascript">
								$(document)
								.ready(
										function() {
											switchButon({{ Session::get('is_update')}});
										}
									);
							</script>
						@endif
                	</div>
                	<div class="form-group col-lg-3 col-md-6 col-sm-12">
            			<label for="max_threshold">Quantité maximale</label>
                  		<input type="number" class="form-control" id="max_threshold" name="max_threshold" placeholder="0" min="0" value="{{ old('max_threshold') }}">
						<small class="text-danger">{{ $errors->first('max_threshold') }}</small>
                	</div>
                </div>
				<button data-target="#update_modal" data-toggle="modal" data-source="product-edit" id="update" type="button" class="btn btn-warning float-right" style="display: none;">Modifier</button>
				<button id="submit_form" type="submit" class="btn btn-primary float-right">Envoyer</button>
				<button id="new" type="button" class="btn btn-danger float-right mr-3" style="display: none;">Annuler</button>
			</form>
		</div>
	</div>
	<!-- Display the complete list of available products -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des produits</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Description</th>
						<th>Catégorie</th>
						<th>Unité de mesure</th>
						<th>Quantité minimale</th>
						<th>Quantité maximale</th>
						<th>En stock</th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					<!-- start looping though each product -->
					@foreach($products as $product)
					<tr style="{{ $product->active?:'text-decoration: line-through;' }}" data-catid="{{ $product->category->id }}" data-measureid="{{ $product->measureUnit->id }}">
						<td class="responsive-td" responsive-field="#">{{ $product->id }}</td>
						<td class="responsive-td" responsive-field="Nom">{{ $product->name }}</td>
						<td class="responsive-td" responsive-field="Description">{{ $product->description }}</td>
						<!-- get the associated category -->
						<td class="responsive-td" responsive-field="Catégorie">{{ $product->category->cat_name }}</td>
						<!-- get the associated unit of measurement -->
						<td class="responsive-td" responsive-field="Unité de mesure">{{ $product->measureUnit->measure_symbol }}</td>
						<td class="responsive-td" responsive-field="Quantité minimale">{{ $product->min_threshold }}</td>
						<td class="responsive-td" responsive-field="Quantité maximale">{{ $product->max_threshold }}</td>
						<td class="responsive-td" responsive-field="En stock">{{ $product->quantity }}</td>
						<td class="text-center responsive-td">
							<i onclick="editRow(this)" id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $product->id }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="product-del" data-id="{{ $product->id }}" style="color:red;cursor:pointer;"></i>
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
