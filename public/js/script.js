$(document)
		.ready(
				function() {
					$('#table')
							.DataTable(
									{
								        responsive: {
								            details: {
								                renderer: function ( api, rowIdx, columns ) {
								                    var data = $.map( columns, function ( col, i ) {
								                        return col.hidden ?
								                            '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
								                                '<td>'+col.title+':'+'</td> '+
								                                '<td>'+col.data+'</td>'+
								                            '</tr>' :
								                            '';
								                    } ).join('');
								 
								                    return data ?
								                        $('<table/>').append( data ) :
								                        false;
								                }
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

					$("#edit").click(function() {
						$("#cat_name").val("ciccio");
						$("#cat_type").val("formaggio");
						return false;
					})
				});