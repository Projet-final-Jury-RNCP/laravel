@extends('layouts.public')

@section('title')
	Choix de la semaine
@stop

@section('content')
<div class="container-fluid">

	<!-- Display the complete list of available products -->
	<div class="card m-3 cancel-side-margins">
		<div class="card-header">Liste des courses - choix de la semaine</div>
		<div class="card-body table-container">
			<table id="table" class="table table-striped products-table table-bordered table-hover" style="width: 100%">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nom</th>
					</tr>
				</thead>
				<tbody>
					<!-- start looping though each product -->
					@foreach($weeks as $week)
					<tr class="pointer" onclick="window.location.assign('{{ url('stock/shopping/' . $week->id) }}')">
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
