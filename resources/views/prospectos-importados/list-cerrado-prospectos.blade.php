<x-layout>
	<x-slot name="breadcrumb">
		Prospectos Cerrados
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de Prospectos cerrados {{-- <a class="btn btn-primary" href="{{route('documentos.create')}}">Nueva Certificación</a> --}}</h6>
	            </div>
	            <div class="card-body">
	            	<div class="col-md-12">
                        <div class="col-lg-12 mb-4">
					    	<div class="card shadow mb-4">
					            <div class="card-header py-3">
					                <h6 class="m-0 font-weight-bold text-primary">Mis Prospectos</h6>
					            </div>
					            <div class="card-body">
					                <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>N° Solicitud</th>
                                                    <th>Proveedor</th>
                                                    <th>Responsable Comercial</th>
                                                    <th>Responsable Calidad</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($mis_prospectos as $prospecto)
                                                    <tr>
                                                        <td>{{$prospecto->n_solicitud}}</td>
                                                        <td>{{$prospecto->nombre_proveedor}}</td>
                                                        <td>{{(!empty($prospecto->responsable_comercial)) ? $prospecto->responsable_comercial->name.' '.$prospecto->responsable_comercial->last_name : 'Sin Definir'}}</td>
                                                        <td>{{(!empty($prospecto->responsable_calidad)) ? $prospecto->responsable_calidad->name.' '.$prospecto->responsable_calidad->last_name : 'Sin Definir'}}</td>
                                                        <td>{{date('d-m-Y' ,strtotime($prospecto->created_at))}}</td>
                                                        <td>{{$estado_solicitud_array[$prospecto->estado_solicitud]}}</td>
                                                        <td>
                                                            <form class="form-inline" id="deleteForm_{{$prospecto->id}}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$prospecto->id}}">
                                                                <a class="btn btn-primary btn-circle btn-sm" href="{{route('prospectos-importados.edit',$prospecto->id)}}">
                                                                    <i class="fa fa-check" title="Editar"></i>
                                                                </a>
                                                                <a class="ml-2 btn btn-primary btn-circle btn-sm" href="#" onclick="fnShowProductosModal({{$prospecto->id}},{{$prospecto->productos_solicitud_prospecto}})">
                                                                    <i class="fas fa-clipboard-list" title="Ver Productos"></i>
                                                                </a>
                                                                <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('prospectos-importados.delete')}}',{{$prospecto->id}},'{{$prospecto->n_solicitud}}')">
                                                                    <i class="fa fa-trash" title="Eliminar"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
	            	</div>
                    <div class="col-md-12">
                        <div class="col-lg-12 mb-4">
					    	<div class="card shadow mb-4">
					            <div class="card-header py-3">
					                <h6 class="m-0 font-weight-bold text-primary">Otros Prospectos en Proceso</h6>
					            </div>
					            <div class="card-body">
					                <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>N° Solicitud</th>
                                                    <th>Proveedor</th>
                                                    <th>Responsable Comercial</th>
                                                    <th>Responsable Calidad</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($prospectos as $prospecto)
                                                    <tr>
                                                        <td>{{$prospecto->n_solicitud}}</td>
                                                        <td>{{$prospecto->nombre_proveedor}}</td>
                                                        <td>{{(!empty($prospecto->responsable_comercial)) ? $prospecto->responsable_comercial->name.' '.$prospecto->responsable_comercial->last_name : 'Sin Definir'}}</td>
                                                        <td>{{(!empty($prospecto->responsable_calidad)) ? $prospecto->responsable_calidad->name.' '.$prospecto->responsable_calidad->last_name : 'Sin Definir'}}</td>
                                                        <td>{{date('d-m-Y' ,strtotime($prospecto->created_at))}}</td>
                                                        <td>{{$estado_solicitud_array[$prospecto->estado_solicitud]}}</td>
                                                        <td>
                                                            <form class="form-inline" id="deleteForm_{{$prospecto->id}}">
                                                                @csrf
                                                                @method('delete')
                                                                <a class="btn btn-primary btn-circle btn-sm" href="{{route('prospectos-importados.edit',$prospecto->id)}}">
                                                                    <i class="fa fa-check" title="Editar"></i>
                                                                </a>
                                                                <a class="ml-2 btn btn-primary btn-circle btn-sm" href="#" onclick="fnShowProductosModal({{$prospecto->id}},{{$prospecto->productos_solicitud_prospecto}})">
                                                                    <i class="fas fa-clipboard-list" title="Ver Productos"></i>
                                                                </a>
                                                                <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('prospectos-importados.delete')}}',{{$prospecto->id}},'{{$prospecto->n_solicitud}}')">
                                                                    <i class="fa fa-trash" title="Eliminar"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
	            	</div>
                    <div class="col-md-12">
                        <div class="col-lg-12 mb-4">
					    	<div class="card shadow mb-4">
					            <div class="card-header py-3">
					                <h6 class="m-0 font-weight-bold text-primary">Otros Prospectos en Proceso sin Responsable Calidad</h6>
					            </div>
					            <div class="card-body">
					                <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>N° Solicitud</th>
                                                    <th>Proveedor</th>
                                                    <th>Responsable Comercial</th>
                                                    <th>Responsable Calidad</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <th>Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sin_calidad_prospectos as $prospecto)
                                                    <tr>
                                                        <td>{{$prospecto->n_solicitud}}</td>
                                                        <td>{{$prospecto->nombre_proveedor}}</td>
                                                        <td>{{(!empty($prospecto->responsable_comercial)) ? $prospecto->responsable_comercial->name.' '.$prospecto->responsable_comercial->last_name : 'Sin Definir'}}</td>
                                                        <td>{{(!empty($prospecto->responsable_calidad)) ? $prospecto->responsable_calidad->name.' '.$prospecto->responsable_calidad->last_name : 'Sin Definir'}}</td>
                                                        <td>{{date('d-m-Y' ,strtotime($prospecto->created_at))}}</td>
                                                        <td>{{$estado_solicitud_array[$prospecto->estado_solicitud]}}</td>
                                                        <td>
                                                            <form class="form-inline" id="deleteForm_{{$prospecto->id}}">
                                                                @csrf
                                                                @method('delete')
                                                                <a class="btn btn-primary btn-circle btn-sm" href="{{route('prospectos-importados.edit',$prospecto->id)}}">
                                                                    <i class="fa fa-check" title="Editar"></i>
                                                                </a>
                                                                <a class="ml-2 btn btn-primary btn-circle btn-sm" href="#" onclick="fnShowProductosModal({{$prospecto->id}},{{$prospecto->productos_solicitud_prospecto}})">
                                                                    <i class="fas fa-clipboard-list" title="Ver Productos"></i>
                                                                </a>
                                                                <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('prospectos-importados.delete')}}',{{$prospecto->id}},'{{$prospecto->n_solicitud}}')">
                                                                    <i class="fa fa-trash" title="Eliminar"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
	            	</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="solicitudProductosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Productos de la Solicitud </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Código de Barra</th>
                                    </tr>
                                </thead>
                                <tbody id="solicitudProductosTable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function fnShowProductosModal(id,productos) {            
            $('#solicitudProductosTable').html('')
            $.each(productos, function (indexInArray, valueOfElement) { 
                $('#solicitudProductosTable').append('<tr><td>'+valueOfElement.nombre_producto+'</td><td>'+valueOfElement.codigo_barra+'</td></tr>');
            });
            
            $('#solicitudProductosModal').modal('show')
        }
    </script>
    <script>
		jQuery(document).ready(function(){
			$('#collapseProspectosProductos').addClass('show');
		});
	</script>
</x-layout>