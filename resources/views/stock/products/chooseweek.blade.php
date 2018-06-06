@extends('layouts.public')

@section('title')
	Choix de la semaine
@stop

@section('content')
<div class="container-fluid">

	<!-- Display the complete list of available products -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des produits - choix de la semaine
			<button  class="btn btn-primary float-right" type="button" id="create_button" onclick="window.location.assign('{{ url('/stock/semaines') }}')">Créer une nouvelle semaine</button>
		</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nom</th>
					</tr>
				</thead>
				<tbody>
					<!-- start looping though each product -->
					@foreach($weeks as $week)
					<tr class="pointer" onclick="window.location.assign('{{ url('stock/produits/semaines/' . $week->id) }}')">
						<td class="responsive-td" data-responsive-field="#">{{ $week->id }}</td>
						<td class="responsive-td" data-responsive-field="Nom">{{ $week->name }}</td>
					</tr>
					@endforeach
					<!-- end looping though each product -->
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
