<x-layout>
    <x-slot name="breadcrumb">
        Nuevo Prospecto
    </x-slot>
    <div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Solicitud de prospecto de producto nuevo</h6>
	        </div>
            <form method="POST" action="{{route('prospectos-importados.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body border-left-primary">
                    <div class="row">
	        			<div class="col-md-12">
                            <div id="stepper1" class="bs-stepper">
                                <div class="bs-stepper-header">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Datos del proveedor</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Datos básicos del producto</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="test-l-1" class="content">
                                        <div class="col-md-12">
                                            <h6 class="font-weight-bold text-primary">Buscar Proveedor</h6>
                                            @error('id_proveedor')
                                                <small class="text-danger font-weight-bold">*Debe seleccionar un proveedor</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped table-hover" id="tableProveedores" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Proveedor</th>
                                                        <th>Rut del proveedor</th>
                                                        <th>Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="test-l-2" class="content">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="font-weight-bold text-primary">Productos
                                                        <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreProducto()">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-plus"></i>
                                                            </span>
                                                            <span class="text">Agregar Más</span>
                                                        </button>
                                                    </h6>
                                                </div>
                                                <div class="col-md-12" id="producto_" style="display: none" >
                                                    <div class="col-md-12">
                                                        <button class="btn-danger btn-circle btn-sm btn-delete-producto" type="button"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bold">Nombre producto:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm nombre_producto" placeholder="Nombre producto" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bold">Sap:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control form-control-sm sap_producto" placeholder="Sap" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bold">Sección:</label>
                                                            <div class="col-sm-8">
                                                                <select class="seccion_producto" data-live-search="true" title="Sección">
                                                                    @foreach ($secciones as $seccion)
                                                                        <option value="{{$seccion->id}}">{{$seccion->nombre}}</option>
                                                                    @endforeach
                                                                  </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="producto-div row">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="button" onclick="stepper1.previous()">Atras</button>
                            <button class="btn btn-primary" type="button" onclick="stepper1.next()">Siguiente</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-success" type="submit">Guardar Solicitud</button>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var ProveedoresTable=$('#tableProveedores').DataTable({
                
                "ajax": {
                    "url": "{{ route('buscarProveedor') }}",
                    "type": "GET", 
                    "data": function(d) {
                        d.search = $('.dataTables_filter input').val();
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nombre" },
                    { "data": "rut" },
                    { "data": "btn" }
                ],
                "searching": true, // Habilitar la funcionalidad de búsqueda
                "dom": 'lBfrtip' // Mostrar el campo de búsqueda
            });

            // Evento para detectar cambios en el campo de búsqueda y actualizar la tabla
            $('.dataTables_filter input')
                .off()
                .on('keyup', function() {
                    $('#tableProveedores').DataTable().ajax.reload();
            });
        });
        stepper1 = new Stepper(document.querySelector('#stepper1'),{
            animation: true,
            linear: false,
        })
        function fnAddMoreComercial() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#contacto_comercial_").clone().removeClass("hide");
            clone.attr("id", "contacto_comercial_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.nombre_contacto_comercial').attr('name','nombre_contacto_comercial[]');
            clone.find('.email_contacto_comercial').attr('name','email_contacto_comercial[]');
            clone.find('.telefono_contacto_comercial').attr('name','telefono_contacto_comercial[]');
            clone.find('.btn-delete-contacto-comercial').attr("onclick","$('#contacto_comercial_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.contacto-comercial-div').append(clone.show());
        }
        function fnAddMoreCalidad() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#contacto_calidad_").clone().removeClass("hide");
            clone.attr("id", "contacto_calidad_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.nombre_contacto_calidad').attr('name','nombre_contacto_calidad[]');
            clone.find('.email_contacto_calidad').attr('name','email_contacto_calidad[]');
            clone.find('.telefono_contacto_calidad').attr('name','telefono_contacto_calidad[]');
            clone.find('.btn-delete-contacto-calidad').attr("onclick","$('#contacto_calidad_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.contacto-calidad-div').append(clone.show());
        }
        function fnAddMorePlanta() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#planta_").clone().removeClass("hide");
            clone.attr("id", "planta_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.nombre_planta').attr('name','nombre_planta[]');
            clone.find('.direccion_planta').attr('name','direccion_planta[]');
            clone.find('.documento_planta').attr('name','documento_planta[]');
            clone.find('.btn-delete-planta').attr("onclick","$('#planta_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.planta-div').append(clone.show());
        }
        function fnAddMoreProducto() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#producto_").clone().removeClass("hide");
            clone.attr("id", "producto_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            
            
            
            
            clone.find('.nombre_producto').attr('name','nombre_producto[]');
            clone.find('.seccion_producto').attr('name','seccion_producto[]').addClass('selectpicker show-tick').selectpicker('render');//.selectpicker('render');
            clone.find('.marca_producto').attr('name','marca_producto[]').addClass('selectpicker show-tick').selectpicker('render');//.selectpicker('render');
            clone.find('.sap_producto').attr('name','sap_producto[]');
            
            //clone.find('.seccion_producto')
            clone.find('.btn-delete-producto').attr("onclick","$('#producto_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.producto-div').append(clone.show());
        }
    </script>
    <script>
		jQuery(document).ready(function(){
			$('#collapseProspectosProductos').addClass('show');
		});
	</script>
</x-layout>
