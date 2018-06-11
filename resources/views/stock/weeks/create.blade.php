@extends('layouts.public')

@section('title')
	Semaines
@stop

@section('content')
<div class="container-fluid">
	<!-- The form to add or edit a week -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Formulaire semaines</div>
		<div class="card-body">
			<form action="{{ url('stock/semaines') }}" id="week" method="post" name="week">
				{{ csrf_field() }}
				<input id="index" name="index" type="hidden">
    				<div class="form-group">
    					<label for="cat_name">Nom</label>
    					<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" aria-describedby="name" name="name" placeholder="Nom de la semaines" required="required">
    					<small class="text-danger">{{ $errors->first('name') }}</small>
    				</div>
				<button data-target="#update_modal" data-toggle="modal" data-source="week-edit" id="update" type="button" class="btn btn-warning float-right" style="display: none;">Modifier</button>
				<button id="submit_form" type="submit" class="btn btn-primary float-right">Créer</button>
				<button id="new" type="button" class="btn btn-danger float-right mr-3" style="display: none;">Annuler</button>
			</form>
		</div>
	</div>
	<!-- Display the complete list of available weeks -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des semaines</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th style="width:50px;"></th>
					</tr>
				</thead>
				<tbody>
					<!-- start looping though each week -->
					@foreach($weeks as $week)
					<tr>
						<td class="responsive-td" responsive-field="#">{{ $week->id }}</td>
						<td class="responsive-td" responsive-field="Nom">{{ $week->name }}</td>
						<td class="text-center responsive-td">
							<i onclick="editRow(this)" id="edit" title="modifier" class="fa fa-pencil fa-2x" data-id="{{ $week->id }}" style="color:#007bff;cursor:pointer;margin-right:10px;"></i>
						</td>
					</tr>
					@endforeach
					<!-- end looping though each week -->
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
