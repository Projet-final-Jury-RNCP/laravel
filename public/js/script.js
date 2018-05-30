var	table ;
$(document)
		.ready(
				function() {
					
					// Alignement à droite du contenu des cellules pour la/les colonnes à partir de l'index 0
					// (valable uniquement par table - selon les colonnes ... :(
					// inventorier : 2 = Quantité théorique 3 = Quantité réelle
					var customColumnDefs = [];
					if ($('#stockSupply').length>0) {
						customColumnDefs = [
						      { className: "text-right", "targets": [2] },
						      { className: "text-center", "targets": [3] },
//						       { className: "text-center", "targets": [4] },	// prix 
						  ];
					}
					// TODO : dissocier les différentes tables, pour :
					// - aligner à droite les NUMERIQUES
					// - aligner au centre les inputs
					// - aligner à gauche les TEXTE (défault)
									
					
					
					var actionHolder = $('#delete .modal-body form').attr("action");
					console.log("actionHolder : "+actionHolder);
					table = $('#table')
									.DataTable(
											{
												

//												  "columnDefs": [
//												      { className: "text-right", "targets": [2] },
//												      { className: "text-center", "targets": [3] },
//												  ],
												  "columnDefs": customColumnDefs,
												
//										        responsive: {
//										            details: {
//										                renderer: function ( api, rowIdx, columns ) {
//										                    var data = $.map( columns, function ( col, i ) {
//										                        return col.hidden ?
//										                            '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
//										                                '<td>'+col.title+':'+'</td> '+
//										                                '<td>'+col.data+'</td>'+
//										                            '</tr>' :
//										                            '';
//										                    } ).join('');
//										 
//										                    return data ? $('<table/>').append( data ) : false;
//										                }
//										            }
//										        },
												"autoWidth": false,
										        select: {
										            style: 'single'
										        },
										        "initComplete": function () {
											        if ($('#stockSupply').length>0) {
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
						}
						modal.find('.modal-title').text('supprimer '+src_txt+' n° ' + id + ' ?')
					}).on('hidden.bs.modal', function (e) {
						$(this).find('.modal-body form').attr('action', actionHolder);
					});
					
					$("#new").click(function() {
						location.reload();
						return false;
					})
				});

function editRow(target) {
	var elem = target.parentElement;
	console.log(elem); // td.text-center.responsive-td
	console.log("tr?");
	var tr_current = elem.parentElement;
//	console.log(tr_current);
//	console.log($(tr_current));
	console.log($(tr_current).attr('data-catid'));
//	console.log($(tr_current).data('catid'));
	var cat_id_selected = $(tr_current).attr('data-catid');
	var measure_id_selected = $(tr_current).attr('data-measureid');

	$('#update').attr('data-id', table.row( elem ).data()[0]);
	$("#index").val(table.row( elem ).data()[0]);
	if($('form[name="category"]').length>0){
		$("#cat_name").val(table.row( elem ).data()[1]);
		$("#cat_desc").val(table.row( elem ).data()[2]);
	} else if($('form[name="measure"]').length>0){
		$("#measure_name").val(table.row( elem ).data()[1]);
		$("#measure_symbol").val(table.row( elem ).data()[2]);
	} else if($('form[name="product"]').length>0){
		$("#name").val(table.row( elem ).data()[1]);
		$("#description").val(table.row( elem ).data()[2]);
//		$("#id_category").val(table.row( elem ).data()[3]);
		$('#id_category option').each(function() {
			console.log($(this).val());
		    if($(this).val() == cat_id_selected) {
		        $(this).prop("selected", true);
		    }
		});		
//		$("#id_measure_unit").val(table.row( elem ).data()[4]);
		$('#id_measure_unit option').each(function() {
			console.log($(this).val());
		    if($(this).val() == measure_id_selected) {
		        $(this).prop("selected", true);
		    }
		});
		$("#min_threshold").val(table.row( elem ).data()[5]);
		$("#max_threshold").val(table.row( elem ).data()[6]);
	}

	if($('#put').length<1){
		$('form').append('<input id="put" type="hidden" name="_method" value="PUT">');
		$('form').attr("action", function( i, val ) { return val + "_update"});
	}
	
	$("#submit_form").hide();
	$("#new").fadeIn( "slow" );
	$("#update").fadeIn( "slow" );
    $('html, body').animate({
        scrollTop: $(".container").offset().top
    }, 500);
}