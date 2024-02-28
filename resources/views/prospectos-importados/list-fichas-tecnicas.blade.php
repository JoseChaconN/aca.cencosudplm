<x-layout>
	<x-slot name="breadcrumb">
		Fichas tecnicas
	</x-slot>
<div class="row">
	<div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buscar fichas tecnicas</h6>
            </div>
            <div class="card-body">
               	<form method="POST" action="{{ route('prospectos.importados.fichas-tecnicas')}}">
               		@csrf
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre_producto">Nombre producto:</label>
                                <input type="text" class="form-control form-control-sm" id="nombre_producto" name="nombre_producto" placeholder="Nombre producto" value="{{ empty($request['nombre_producto']) ? '' : $request['nombre_producto'] }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo_ean">Código de Barra (EAN):</label>
                                <input type="text" class="form-control form-control-sm" id="codigo_ean" name="codigo_ean" placeholder="Código de Barra (EAN)" value="{{ empty($request['codigo_ean']) ? '' : $request['codigo_ean'] }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo_ean">Código SAP:</label>
                                <input type="text" class="form-control form-control-sm" id="codigo_sap" name="codigo_sap" placeholder="Código SAP" value="{{ empty($request['codigo_sap']) ? '' : $request['codigo_sap'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
               			<div class="col-md-4">
							<div class="form-group">
								<label for="nombre_proveedor">Nombre Proveedor:</label>
								<input type="text" class="form-control form-control-sm" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre Proveedor" value="{{ empty($request['nombre_proveedor']) ? '' : $request['nombre_proveedor'] }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rut_proveedor">Rut del proveedor:</label>
								<input type="text" class="form-control form-control-sm" id="rut_proveedor" name="rut_proveedor" placeholder="Rut del proveedor" value="{{ empty($request['rut_proveedor']) ? '' : $request['rut_proveedor'] }}">
							</div>
						</div>
					</div>
                    
				  	<button class="btn btn-primary btn-icon-split" type="submit">
	                    <span class="icon text-white-50">
	                        <i class="fas fa-search"></i>
	                    </span>
	                    <span class="text">Buscar</span>
	                </button>
               	</form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Fichas tecnicas encontradas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Nombre producto español</th>
                                <th>Proveedor</th>
                                <th>Rut del proveedor</th>
                                <th>Código de Barra (EAN)</th>
                                <th>Código SAP</th>
                                <th>Versión</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fichas_tecnicas as $item)
                                @foreach ($item->productos_solicitud_prospecto as $item1)
                                    <tr>
                                        <td>{{$item1->product_name}}</td>
                                        <td>{{$item1->product_name_spanish}}</td>
                                        <td>{{$item->nombre_proveedor}}</td>
                                        <td>{{$item->rut_proveedor}}</td>
                                        <td>{{$item1->upc_bar_code}}</td>
                                        <td>{{$item1->sap}}</td>
                                        <td>Versión {{$item1->version}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-circle btn-sm" title="Descargar" href="#" download=""><i class="fas fa-cloud-download-alt"></i></a> 
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach	                        	
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        $('#collapseProspectosProductos').addClass('show');
    });
</script>
</x-layout>