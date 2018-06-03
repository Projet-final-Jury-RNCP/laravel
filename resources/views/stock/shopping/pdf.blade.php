<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Courses du {{ date('d/m/Y') }}</title>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>

  </head>
  <body>
	<table id="table" class="table table-striped table-bordered table-hover" style="width: 100%">
		<thead class="thead-dark">
			<tr>
				<th>Qté à acheter</th>
				<th>Produit</th>
				<th>Description</th>
				<th class="hidden-on-small">Categorie</th>
			</tr>
		</thead>
		<tbody>
			@foreach($arrayProduct as $product)
			<tr class="productline">
				<td align="right" class="responsive-td text-center" responsive-field="Max à acheter">{{ $product->max_threshold - $product->quantity }} * </td>
				<td class="responsive-td" responsive-field="Produit">{{ $product->name }}</td>
				<td class="responsive-td" responsive-field="Description">{{ $product->description }}</td>
				<td class="responsive-td hidden-on-small" responsive-field="Categorie">{{ $product->category->cat_name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</html>