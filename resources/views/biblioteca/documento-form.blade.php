<x-layout>
	<x-slot name="breadcrumb">
		Cargar Documento
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Cargar Documento</h6>
	        </div>
	        <form method="POST" enctype="multipart/form-data" action="{{ (!empty($documento->id)) ? route('biblioteca.update',$documento->id) : route('biblioteca.store') }}">
	        	@csrf
	        	@if(!empty($documento->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre del Documento:</label>
								<div class="col-sm-8">
									<input type="text" name="nombre_documento" class="form-control" value="{{$documento->nombre}}" placeholder="Nombre">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Certificación/Documento:</label>
								<div class="col-sm-8">
									<select name="id_documento" id="id_documento" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($listado_documentos as $item)
								        	<option value="{{$item->id}}">{{$item->nombre}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Proveedor:</label>
								<div class="col-sm-8">
									<select name="proveedor" id="select_proveedor" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								    </select>
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Productos:</label>
								<div class="col-sm-8">
									<select name="productos[]" id="select_producto" data-actions-box="true" class="selectpicker" multiple data-live-search="true" data-width="100%" title="Seleccione" data-size="10">
								    </select>
								</div>
							</div>
						</div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Fecha vencimiento:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="fecha_vencimiento" placeholder="Fecha vencimiento" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Adjunto:</label>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="adjunto">
                                        <label class="custom-file-label" >Buscar Archivo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Observación:</label>
                                <div class="col-md-8">
                                    <textarea name="observacion" class="form-control form-control-sm" placeholder="Observaciones" rows="5" style="resize: none"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Seccion:</label>
								<div class="col-sm-8">
									<select name="area" id="area" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($area_documentos as $key => $value)
								        	<option value="{{$value['val']}}">{{$value['text']}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
	        		</div>
	        	</div>
	        	<div class="card-footer text-right">
		        	<button class="btn btn-primary btn-icon-split" type="submit">
	                    <span class="icon text-white-50">
	                        <i class="fa fa-check"></i>
	                    </span>
	                    <span class="text">Guardar</span>
	                </button>
		        </div>
	        </form>
	    </div>
	</div>
    <script>
        $(document).ready(function() {
            select_proveedor = $('#select_proveedor').selectpicker();
            select_proveedor.parent().find('.bs-searchbox input[type="text"]').on('input', function() {
                console.log($(this).val())
                var searchTerm = $(this).val();
                $.post("{{route('biblioteca.buscar.proveedor')}}", {val:searchTerm,_token:$("input[name=_token]").val()}, function(response) {
                    select_proveedor.empty();
                    $.each(response.data, function(key, value) {
                        select_proveedor.append('<option value="' + value.id + '">' + value.nombre + ' - '+value.rut+'</option>');
                    });
                    select_proveedor.selectpicker('refresh');
                });
            });
            select_producto = $('#select_producto').selectpicker();
            select_proveedor.on('change', function() {
                if($(this).val() > 0){
                    $.post("{{route('biblioteca.buscar.producto.proveedor')}}", {val:$(this).val(),_token:$("input[name=_token]").val()}, function(response) {
                        select_producto.empty();
                        $.each(response.data, function(key, value) {
                            select_producto.append('<option value="' + value.id + '">' + value.nombre + ' - Código EAN : '+value.ean+' - Código SAP : '+value.sap+'</option>');
                        });
                        select_producto.selectpicker('refresh');
                    });
                }
            });
            $('#id_documento').selectpicker();
        });
    </script>
	<script>
		jQuery(document).ready(function(){
			$('#collapseBiblioteca').addClass('show');
		});
	</script>
</x-layout>