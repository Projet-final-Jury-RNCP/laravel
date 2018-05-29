var	table ;
$(document)
		.ready(
				function() {
					var actionHolder = $('#delete .modal-body form').attr("action");
					console.log("actionHolder : "+actionHolder);
					table = $('#table')
									.DataTable(
											{
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
												                $('<div style="float:left;"><lavel>Categorie : </label></div>').append(select).appendTo( $('#table_filter') );
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
					
//					$('#table tbody #edit').on( 'click', function () {
//						var elem = this.parentElement;
//
//						$('#update').attr('data-id', table.row( elem ).data()[0]);
//						$("#index").val(table.row( elem ).data()[0]);
//						if($('form[name="category"]').length>0){
//							$("#cat_name").val(table.row( elem ).data()[1]);
//							$("#cat_desc").val(table.row( elem ).data()[2]);
//						} else if($('form[name="measure"]').length>0){
//							$("#measure_name").val(table.row( elem ).data()[1]);
//							$("#measure_symbol").val(table.row( elem ).data()[2]);
//						}
//
//						if($('#put').length<1){
//							$('form').append('<input id="put" type="hidden" name="_method" value="PUT">');
//							$('form').attr("action", function( i, val ) { return val + "_update"});
//						}
//						
//						$("#submit_form").hide();
//						$("#new").fadeIn( "slow" );
//						$("#update").fadeIn( "slow" );
//					    $('html, body').animate({
//					        scrollTop: $(".container").offset().top
//					    }, 500);
//					} );
					
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

	$('#update').attr('data-id', table.row( elem ).data()[0]);
	$("#index").val(table.row( elem ).data()[0]);
	if($('form[name="category"]').length>0){
		$("#cat_name").val(table.row( elem ).data()[1]);
		$("#cat_desc").val(table.row( elem ).data()[2]);
	} else if($('form[name="measure"]').length>0){
		$("#measure_name").val(table.row( elem ).data()[1]);
		$("#measure_symbol").val(table.row( elem ).data()[2]);
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