$(document)
		.ready(
				function() {
					var	table = $('#table')
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
										 
										                    return data ? $('<table/>').append( data ) : false;
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

					$('#table tbody #edit').on( 'click', function () {
						var elem = this.parentElement;
						$('#update').attr('data-id', table.row( elem ).data()[0]);
						$("#cat_name").val(table.row( elem ).data()[1]);
						$("#cat_type").val(table.row( elem ).data()[2]);
						if($('#put').length<1){
							$('form[name="category"]').append('<input id="put" type="hidden" name="_method" value="PUT">');
							$('form[name="category"]').attr("action", function( i, val ) { return val + "/"+table.row( elem ).data()[0]});
						}
						$("#submit_form").hide();
						$("#new").fadeIn( "slow" );
						$("#update").fadeIn( "slow" );
					    $('html, body').animate({
					        scrollTop: $(".container").offset().top
					    }, 500);
					} );
					
					//modal update
					$('#update_modal').on('show.bs.modal',function(event) {
						var button = $(event.relatedTarget)
						var id = button.data('id')
						var source = button.data('source')
						var modal = $(this)
						var src_txt;
						if (source == "cat-edit") {
							src_txt = "la catégorie";
							modal.find('#send').click(function() {
								document.category.submit();
							});
						}
						modal.find('.modal-title').text('modifier '+src_txt+' n° ' + id + ' ?')
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
							modal.find('.modal-body form').attr('action', 'categories/'+id);
						}
						modal.find('.modal-title').text('soupprimer '+src_txt+' n° ' + id + ' ?')
					}).on('hidden.bs.modal', function (e) {
						$(this).find('.modal-body form').attr('action', '');
					});
					
					$("#new").click(function() {
						location.reload();
						return false;
					})
				});