<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Courses du {{ date('d/m/Y') }}</title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>

  </head>
  <body>
  	<h3>Courses : {{ $week->name }} - édité à {{ date('d/m/Y H:i:s') }}</h3>
	<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
		<thead class="thead-dark">
			<tr>
				<th>Qté à acheter</th>
				<th>Unité</th>
				<th>Produit</th>
				<th>Description</th>
				<th class="hidden-on-small">Categorie</th>
			</tr>
		</thead>
		<tbody>
			@foreach($arrayProduct as $product)
			<tr class="productline">
				<td align="right" class="responsive-td text-center" data-responsive-field="Max à acheter">{{ $product->max_threshold - $product->quantity }}</td>
				<td class="responsive-td" data-responsive-field="U.">{{ $product->measure_symbol }}</td>
				<td class="responsive-td" data-responsive-field="Produit">{{ $product->name }}</td>
				<td class="responsive-td" data-responsive-field="Description">{{ $product->description }}</td>
				<td class="responsive-td hidden-on-small" data-responsive-field="Categorie">{{ $product->category->cat_name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</html>