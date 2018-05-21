<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css" />
</head>
<body>
	<div class="container">
		<div class="card m-3">
			<div class="card-header">Formulaire catégories</div>
			<div class="card-body">
				<form>
					<div class="form-group">
						<label for="exampleInputEmail1">Nom</label>
						<input type="text" class="form-control" id="cat_name" aria-describedby="cat_name" name="cat_name" placeholder="Nom de la catégorie">
						<small id="cat_name" class="form-text text-muted">...aide à la compilation</small>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Tipe</label>
						<input type="text" class="form-control" id="cat_type" aria-describedby="cat_type" name="cat_type" placeholder="Type de catégorie">
						<small id="cat_type" class="form-text text-muted">...aide à la compilation</small>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document)
				.ready(function() {
							$('#table').DataTable(
												{
													language : {
														processing : "Traitement en cours...",
														search : "Rechercher&nbsp;:",
														lengthMenu : "Afficher _MENU_ &eacute;l&eacute;ments",
														info : "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
														infoEmpty : "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
														infoFiltered : "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
														infoPostFix : "",
														loadingRecords : "Chargement en cours...",
														zeroRecords : "Aucun &eacute;l&eacute;ment &agrave; afficher",
														emptyTable : "Aucune donnée disponible dans le tableau",
														paginate : {
															first : "Premier",
															previous : "Pr&eacute;c&eacute;dent",
															next : "Suivant",
															last : "Dernier"
														},
														aria : {
															sortAscending : ": activer pour trier la colonne par ordre croissant",
															sortDescending : ": activer pour trier la colonne par ordre décroissant"
														},
													}
												});
	
								$("#edit").click(function() {
									$("#cat_name").val("ciccio");
									$("#cat_type").val("formaggio");
									return false;
								})
							});
	</script>
</body>
</html>