
function select_tienda() {
	$('#selectTiendaModal').modal('show');
}
jQuery(document).ready(function(){ 
	$('.dataTable').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
    });
    $('.selectChange').trigger('change');
    $('.inputDecimal').inputmask({
	    alias: 'numeric',
	    groupSeparator: '',
	    autoGroup: true,
	    digits: 2,
	    radixPoint: '.',
	    allowMinus: false,
	    rightAlign: false,
	    oncleared: function() {
	        $(this).val('');
	    }
	});
	$('.inputInt').inputmask({
	    alias: 'numeric',
	    groupSeparator: '',
	    autoGroup: true,
	    digits: 0,
	    radixPoint: '.',
	    allowMinus: false,
	    rightAlign: false,
	    oncleared: function() {
	        $(this).val('');
	    }
	});
	$('.inputRut').inputmask({
	    mask: '9{1,2}.9{3}.9{3}-(9|k|K)',
	    casing: 'upper',
	    clearIncomplete: true,
	    numericInput: true,
	    positionCaretOnClick: 'none'
	});
});

function fnDeleteData(route,id,text) {
	Swal.fire({
		title: '¿Estás seguro de que deseas eliminar este registro? '+text,                
		//showDenyButton: true,
		showCancelButton: true,
		confirmButtonText: 'Sí, eliminar',
		cancelButtonText: 'No, cancelar',
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$.post(route, $("#deleteForm_"+id).serialize(), function(response) {
				Swal.fire(
					'El registro se ha eliminado correctamente.',
					'',
					'success'
				)
				setTimeout(() => {
					location.reload();
				}, 1000);
			});
		}
	})
}

function fnDeleteBibliotecaFile(route,id,text,div) {
	Swal.fire({
		title: '¿Estás seguro de que deseas eliminar este registro? '+text,                
		//showDenyButton: true,
		showCancelButton: true,
		confirmButtonText: 'Sí, eliminar',
		cancelButtonText: 'No, cancelar',
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$.post(route, $("#deleteForm_"+id).serialize(), function(response) {
				Swal.fire(
					'El registro se ha eliminado correctamente.',
					'',
					'success'
				)
			});
			$(div).remove();
		}
	})
}

function fnDeleteBibliotecaFile_2(route,id,text,div) {
	Swal.fire({
		title: '¿Estás seguro de que deseas eliminar este registro? '+text,                
		//showDenyButton: true,
		showCancelButton: true,
		confirmButtonText: 'Sí, eliminar',
		cancelButtonText: 'No, cancelar',
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$.post(route, {id:id,_token:$("input[name=_token]").val()}, function(response) {
				Swal.fire(
					'El registro se ha eliminado correctamente.',
					'',
					'success'
				)
			});
			$(div).remove();
		}
	})
}
function fnDeleteMediaFile(route,id,text,id_data,section) {
	Swal.fire({
		title: '¿Estás seguro de que deseas eliminar este registro? '+text,                
		//showDenyButton: true,
		showCancelButton: true,
		confirmButtonText: 'Sí, eliminar',
		cancelButtonText: 'No, cancelar',
	}).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			$.post(route, {id:id,_token:$("input[name=_token]").val(),id_data:id_data,section:section}, function(response) {
				Swal.fire(
					'El registro se ha eliminado correctamente.',
					'',
					'success'
				)
			});
			$(div).remove();
		}
	})
}
