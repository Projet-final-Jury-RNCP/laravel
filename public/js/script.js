var	table, totalSelect ;
$(document)
		.ready(
				function() {
					
					/* The "is done" mark in shopping table */
					isDone();
					
					// Alignement à droite du contenu des cellules pour la/les colonnes à partir de l'index 0
					// (valable uniquement par table - selon les colonnes ... :(
					// inventorier : 2 = Quantité théorique 3 = Quantité réelle

					var customColumnDefs = [];
					if ($('#stockSupplyInventory').length>0) {
						customColumnDefs = [
						      { className: "text-right", "targets": [2] },
						      { className: "text-center", "targets": [3] },
						  ];
					}
					if ($('#stockSupplyProvision').length>0) {
						customColumnDefs = [
						      { className: "text-right", "targets": [2] },
						      { className: "text-center", "targets": [3] },
						      { className: "text-center", "targets": [4] }, 
						  ];
					}
					if ($('#stockFlowPull').length>0) {
						customColumnDefs = [
						      { className: "text-right", "targets": [2] },
						      { className: "text-center", "targets": [3] },
						  ];
					}
					if ($('#stockFlowPush').length>0) {
						customColumnDefs = [
						      { className: "text-right", "targets": [2] },
						      { className: "text-center", "targets": [3] },
						  ];
					}
					
					// ORDER BY
					var order = [];
					if ($('#stockHistory').length>0) {
						order = [[ 0, "desc" ]];
					}
					
					// Display ALL
					var lengthMenu = [[25, 50, 100, -1], [25, 50, 100, "Tous"]];
					if($('#stockShopping').length>0) {
						var lengthMenu = [[-1, 50], ["Tous", 50]];
						customColumnDefs = [
							{"targets": [ 5 ],"visible": false},
							{"targets": [ 6 ],"visible": false}
						  ];
					}
					
					
					var actionHolder = $('#delete .modal-body form').attr("action");
					table = $('#table')
									.DataTable(
											{
												  "columnDefs": customColumnDefs,
												  
												  "order": order,
													
												   // Display ALL 
											       "lengthMenu": lengthMenu,
												"autoWidth": false,
										        select: {
										            style: 'single'
										        },
										        "initComplete": function () {
											        if (
											        		$('#stockSupplyInventory').length>0 
											        		|| $('#stockSupplyProvision').length>0
											        		|| $('#stockFlowPull').length>0
											        		|| $('#stockFlowPush').length>0
											        		|| $('#stockShopping').length>0		
											        
											        ) {
											        	// Add "Categorie" select with data from table
											        	var tbl = this.api();
											        	tbl.columns().every( function () {
											                var column = this;
											                if (this.index()==0) {
												                var select = $('<select><option value=""></option></select>')
											                    .on( 'change', function () {
											                        var val = $.fn.dataTable.util.escapeRegex(
											                            $(this).val()
											                        );
											 
											                        column.search( val ? '^'+val+'$' : '', true, false ).draw();
											                    } );
											 
												                column.data().unique().sort().each( function ( d, j ) {
												                    select.append( '<option value="'+d+'">'+d+'</option>' )
												                } );
												                $('<div><lavel>Categorie : </label></div>').append(select).appendTo( $('#table_filter') );
															}
											            } );
													}
										        },
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
					
					//modal update
					$('#update_modal').on('show.bs.modal',function(event) {
						var button = $(event.relatedTarget)
						var id = button.data('id')
						var source = button.data('source')
						var modal = $(this)
						var src_txt;
						if (source == "cat-edit") {
							src_txt = 'modifier la catégorie n° ' + id + ' ?';
							modal.find('#send').click(function() {
								document.category.submit();
							});
						} else if (source == "measure-edit") {
							src_txt = "modifier l'unité de mesure n° " + id + ' ?';
							modal.find('#send').click(function() {
								document.measure.submit();
							});
						} else if (source == "product-edit") {
							src_txt = "modifier le produit n° " + id + ' ?';
							modal.find('#send').click(function() {
								document.product.submit();
							});
						} else if (source == "week-edit") {
							src_txt = "modifier la semaines n° " + id + ' ?';
							modal.find('#send').click(function() {
								document.week.submit();
							});
						}
						modal.find('.modal-title').text(src_txt);
					}).on('hidden.bs.modal', function (e) {
						$(this).find('.modal-body form').attr('action', '');
					});
					
					//modal effacements
					$('#delete').on('show.bs.modal',function(event) {
						var button = $(event.relatedTarget)
						var id = button.data('id')
						var source = button.data('source')
						var modal = $(this)
						var src_txt;
						if (source == "cat-del") {
							src_txt = "la catégorie";
							modal.find('.modal-body form').attr("action", actionHolder + '/categories/'+id);
						} else if (source == "measure-del") {
							src_txt = "l'unité de mesure";
							modal.find('.modal-body form').attr("action", actionHolder + '/mesures/'+id);
						} else if (source == "product-del") {
							src_txt = "le produit";
							modal.find('.modal-body form').attr("action", actionHolder + '/produits/'+id);
						} else if (source == "product-week-del") {
							var idweek = button.data('idweek')
							src_txt = "le produit";
							modal.find('.modal-body form').attr("action", actionHolder + '/produits/semaines/'+idweek+'/'+id);
						}
						modal.find('.modal-title').text('supprimer '+src_txt+' n° ' + id + ' ?')
					}).on('hidden.bs.modal', function (e) {
						$(this).find('.modal-body form').attr('action', actionHolder);
					});
					
					$("#new").click(function() {
						location.reload();
						return false;
					})
					
					$( "#hide_done" ).click(function() {
						  console.log(this.checked)
						  if (!this.checked) {
							  $(document.body).prepend($('<style id="hide_done_css" type="text/css">.cross-off {display: none !important; }</style>'));
						  }else{
							  $("#hide_done_css").remove();
						  }
					});
				});	// END JQUERY .ready()



function editRow(target) {
	var elem = target.parentElement;
	var tr_current = elem.parentElement;
	var cat_id_selected = $(tr_current).attr('data-catid');
	var measure_id_selected = $(tr_current).attr('data-measureid');

	$('#update').attr('data-id', table.row( elem ).data()[0]);
	if($('form[name="category"]').length>0){
		$("#cat_name").val(table.row( elem ).data()[1]);
		$("#cat_desc").val(table.row( elem ).data()[2]);
	} else if($('form[name="measure"]').length>0){
		$("#measure_name").val(table.row( elem ).data()[1]);
		$("#measure_symbol").val(table.row( elem ).data()[2]);
	} else if($('form[name="week"]').length>0){
		$("#name").val(table.row( elem ).data()[1]);
	} else if($('form[name="product"]').length>0){
		$("#name").val(table.row( elem ).data()[1]);
		$("#description").val(table.row( elem ).data()[2]);
		$('#id_category option').each(function() {
		    if($(this).val() == cat_id_selected) {
		        $(this).prop("selected", true);
		    }
		});		
		$('#id_measure_unit option').each(function() {
		    if($(this).val() == measure_id_selected) {
		        $(this).prop("selected", true);
		    }
		});
		$("#min_threshold").val(table.row( elem ).data()[5]);
		$("#max_threshold").val(table.row( elem ).data()[6]);
		$("#price").val(table.row( elem ).data()[8]);
	}
	
	switchButon(table.row( elem ).data()[0]);
}

function switchButon(index) {
	if($('#put').length<1){
		$('form').append('<input id="put" type="hidden" name="_method" value="PUT">');
		$('form').attr("action", function( i, val ) { return val + "_update"});
	}
	
	$("#submit_form").hide();
	$("#new").fadeIn( "slow" );
	$("#update").fadeIn( "slow" );
    $('html, body').animate({
        scrollTop: $(".container-fluid").offset().top
    }, 500);
    
    $("#index").val(index);
    $('#update').attr('data-id', index);
}

function isDone() {
	$(".productline").click(function(){
	    $(this).toggleClass("cross-off");
	    var prix = table.row( this ).data()[3]*table.row( this ).data()[5];
	    setTotal(prix, !table.row( this ).data()[6]);
	    table.row( this ).data()[6] = !table.row( this ).data()[6];
	}); 
}

function setTotal(total, added){
	var newTotal;
	if (added) {
		newTotal = totalSelect += Number(total);
	} else {
		newTotal = totalSelect -= Number(total);
	}
	totalSelect = newTotal;
	$("#total_select").text(newTotal.toFixed(2));
}

function plusX(value,item) {
	var x = document.getElementById("qte_"+item);
	var currentVal = Number(x.value); 
	console.log("currentVal "+(currentVal+=value));
	x.value = currentVal;
}

function printShop() {
	$(document.body).prepend($('<style type="text/css">@media print {.dataTables_info,.dataTables_paginate,.dataTables_filter,.dataTables_length,.card-header div{display:none!important;}}</style>'));
	window.print();
}
