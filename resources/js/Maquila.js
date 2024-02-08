$('#avance tbody').on("click", ".anadir", function() {
	$(this).removeClass("anadir");
	$(this).parent().parent().addClass("remove"); //añadimos a la fila la clase remove para despues eliminarla
	$(this).addClass('btnremove');
	$(this).html('<i style="color: #f14141;" class="fas fa-minus-circle"></i>');
    tablaProgramacion.row.add([

    ]).draw(false);
    FechaProg();

})
