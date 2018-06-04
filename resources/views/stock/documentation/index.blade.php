@extends('layouts.public')

@section('title')
	Manuel d’utilisation – Application gestion de stocks 
@stop

@section('content')
<div class="container documentation">
	<!-- The documentation -->
	<div class="row">
		<h1>Documentation</h1>
      	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      		<div class="row">
      			<div class="documentation-section cm-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      				<h2>Gestion des utilisateurs</h2>
      				<p>L’onglet « utilisateurs » permet la création d’un nouvel utilisateur et l’affichage de la liste des utilisateurs avec pour chacun la possibilité de le modifier ou de le supprimer.<br />
      				La suppression d’un utilisateur ne détruit pas son compte mais le rend simplement inactif.<br />
      					L’utilisateur peut être réactivé de la sorte :
      					<ul>
      						<li>Cliquer sur « modifier »</li>
      						<li>Choisir un mot de passe</li>
      						<li>Enregistrer</li>
      					</ul>
      				</p>
      			</div>
      			<div class="documentation-section cm-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      				<h2>Configuration des produits</h2>
      				<p>
      					L’onglet « produits » permet de créer un nouveau type de produit (ex. barquette de cerises) en lui associant une catégorie (ex. alimentaire), une unité de mesure (ex. kg), des quantités minimale et maximale que l’on souhaite avoir dans le stock, ainsi qu'un prix unitaire.<br />
      					<small><em>ATTENTION : Les chiffres à virgule doivent être écrits avec un point ("<b>.</b>") et "non une virgule (",") (ex. 2.5 pour 2,50 &euro;).</em></small>
      				</p>
      				<p>
      					Si une catégorie ou une unité de mesure ne sont pas disponibles dans le menu déroulant, il est possible d’aller en créer de nouvelles dans les onglets « catégories » et « mesures » du menu déroulant « stocks ». 
      				</p>
      				<p>
      					Il est possible de supprimer un produit. Dans le cas où une quantité est encore en stock, la suppression a pour conséquence que le produit est désactivé et non supprimé. Il n’apparait alors plus dans la liste de courses mais peut encore être sorti du stock.
      					Pour le réactiver, cliquer sur l’icône « crayon » et enregistrer. De la même manière, la suppression d’une catégorie utilisée par des produits entraine sa désactivation et non sa suppression.
      				</p>
      			</div>
      			<div class="documentation-section col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      				<h2>Gestion du stock</h2>
      				<p>Liste des actions possibles dans la gestion du stock :
      					<ul>
      						<li><b>Approvisionner</b> : permet l’entrée en stock d’une nouvelle acquisition. (Ex. enregistrement de produits achetés lors du retour de courses), en renseignant pour chaque produit la quantité et le prix unitaire.<br />
      							Le prix unitaire proposé par défaut est celui qui a été renseigné dans la rubrique Produit du menu déroulant. Il est possible de modifier ce prix au moment de l'entrée en stock du produit.<br />
      							<small><em>ATTENTION : Cette modification aura pour effet de modifier le prix unitaire définit dans la rubrique Produit du menu déroulant.</em></small>
      							</li>
      						<li><b>Inventorier</b> : permet de prendre connaissance de l’état du stock et pouvoir le remettre en état, ex. apporter un correctif suite à un inventaire.</li>
      						<li><b>Sortie de stock</b> : lorsqu’un produit est consommé, enregistre la sortie de ce produit.</li>
      						<li><b>Retour en stock</b> : permet de remettre en stock un produit finalement non utilisé. Exemple : 10 bouteilles de jus de fruits ont été sorties du stock, 3 n’ont finalement pas été bues, elle peuvent ainsi être remises en stock. Attention cette fonction ne doit pas être utilisée en cas d’achat d’un nouveau produit.</li>
      					</ul>
      				</p>
      			</div>
				<div class="documentation-section col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      				<h2>Faire les courses</h2>
      				<p>L’onglet « faire les courses » dans le menu « stock » permet d’afficher les produits qui sont actifs et dont la quantité en stock est inférieure à la quantité maximale définie. La colonne « quantité actuelle en stock » indique la quantité en stock ainsi que, entre parenthèses, les quantités minimale et maximale définies dans la fiche du produit. Les 2 colonnes de droite donnent les quantités à acheter pour atteindre le stock minimal ou maximal.
						Un click sur la ligne d’un produit permet de signifier que ce produit a été ajouté dans le chariot de course ou dans le panier s’il s’agit de courses en ligne. Le bouton « Voir tout / Ce qui manque » permet d’afficher l’ensemble des produits à acheter ou seulement ceux qui n’ont pas déjà été ajoutés.</p>
      				</p>
      			</div>
				<div class="documentation-section col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      				<h2>Historique </h2>
      				<p>
      					À rédiger
      				</p>
      			</div>
      		</div>
      	</div>
    </div>
</div>
@stop
