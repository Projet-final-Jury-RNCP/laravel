@extends('layouts.public')

@section('title')
	Unités de mesures
@stop

@section('content')
<div class="container-fluid">
    <!-- The form to add or edit a unit of measurement -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Formulaire unités de mesure</div>
		<div class="card-body">
			<form action="{{ url('stock/mesures') }}" id="measure" method="post" name="measure">
				{{ csrf_field() }}
				<input id="index" name="index" type="hidden">
				<div class="form-group">
					<label for="measure_name">Nom</label>
					<input type="text" class="form-control{{ $errors->has('measure_name') ? ' is-invalid' : '' }}" id="measure_name" aria-describedby="measure_name" name="measure_name" placeholder="Nom de l'unité de mesure" autocomplete="off" required>
					<small class="text-danger">{{ $errors->first('measure_name') }}</small>
				</div>
				<div class="form-group">
					<label for="measure_symbol">Symbole</label>
					<input type="text" class="form-control{{ $errors->has('measure_symbol') ? ' is-invalid' : '' }}" id="measure_symbol" aria-describedby="measure_symbol" name="measure_symbol" placeholder="Symbole de l'unité de mesure" autocomplete="off" required>
					<small class="text-danger">{{ $errors->first('measure_symbol') }}</small>
				</div>
				<button data-target="#update_modal" data-toggle="modal" data-source="measure-edit" id="update" type="button" class="btn btn-warning float-right" style="display: none;">Modifier</button>
				<button id="submit_form" type="submit" class="btn btn-primary float-right">Créer</button>
				<button id="new" type="button" class="btn btn-danger float-right mr-3" style="display: none;">Annuler</button>
			</form>
		</div>
	</div>
	<!-- Display the complete list of available units of measurement -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des unités de mesures</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th>Symbole</th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					<!-- start looping though each unit of measurement -->
					@foreach($measures as $measure)
					<tr>
						<td class="responsive-td" data-responsive-field="#">{{ $measure->id }}</td>
						<td class="responsive-td" data-responsive-field="Nom">{{ $measure->measure_name }}</td>
						<td class="responsive-td" data-responsive-field="Symboles">{{ $measure->measure_symbol }}</td>
						<td class="text-center responsive-td">
							<i onclick="editRow(this)" id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $measure->id }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i>
							<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="measure-del" data-id="{{ $measure->id }}" style="color:red;cursor:pointer;"></i>
						</td>
					</tr>
					@endforeach
					<!-- end looping though each unit of measurement -->
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
