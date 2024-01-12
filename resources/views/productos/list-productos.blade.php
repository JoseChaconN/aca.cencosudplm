<x-layout>
	<x-slot name="breadcrumb">
		Productos
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Buscar Producto</h6>
	            </div>
	            <div class="card-body">
	               	<form method="POST" action="{{ route('listProductos')}}">
	               		@csrf               		
						<div class="row">
	               			<div class="col-md-4">
								<div class="form-group">
									<label for="nombreProv">Nombre Proveedor:</label>
									<input type="text" class="form-control" id="nombreProv" name="nombreProv" placeholder="Nombre Proveedor" value="{{ empty($request['nombreProv']) ? '' : $request['nombreProv'] }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rutProv">Rut del proveedor:</label>
									<input type="text" class="form-control" id="rutProv" name="rutProv" placeholder="Rut del proveedor" value="{{ empty($request['rutProv']) ? '' : $request['rutProv'] }}">
								</div>
							</div>
						</div>
						<div class="row">
	               			<div class="col-md-12">
			        			<hr class="sidebar-divider">
			        		</div>
	               			<div class="col-md-4">
								<div class="form-group">
									<label for="nombreProd">Nombre producto:</label>
									<input type="text" class="form-control" id="nombreProd" name="nombreProd" placeholder="Nombre producto" value="{{ empty($request['nombreProd']) ? '' : $request['nombreProd'] }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="eanProd">Código EAN:</label>
									<input type="text" class="form-control" id="eanProd" name="eanProd" placeholder="Código EAN" value="{{ empty($request['eanProd']) ? '' : $request['eanProd'] }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="sapProd">Código SAP:</label>
									<input type="text" class="form-control" id="sapProd" name="sapProd" placeholder="Código SAP" value="{{ empty($request['sapProd']) ? '' : $request['sapProd'] }}">
								</div>
							</div>
						</div>
					  	<button class="btn btn-primary btn-icon-split" type="submit">
		                    <span class="icon text-white-50">
		                        <i class="fas fa-search"></i>
		                    </span>
		                    <span class="text">Buscar Producto</span>
		                </button>
	               	</form>
	            </div>
	        </div>
	    </div>
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de Productos <a class="btn btn-primary" href="{{route('nuevoProducto')}}">Nuevo Producto</a></h6>
	            </div>
	            <div class="card-body">	            	
	            	<div class="col-md-12">
		            	<div class="col-md-12">
		            		<table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
		                        <thead>
		                            <tr>
		                            	<th>Tipo Producto</th>
		                                <th>Producto</th>
		                                <th>EAN</th>
		                                <th>SAP</th>
		                                <th>Sección</th>
		                                <th>Proveedor</th>
		                                <th>Rut del proveedor</th>			                                
		                                <th>Estado</th>
		                                <th>Ver</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach($productos as $producto)
		                        		<tr>
		                        			<td>{{($producto->mp == 1) ? 'Marcas Propias' : 'Supermercado'}}</td>
			                                <td>{{$producto->nombre}}</td>
			                                <td>{{$producto->ean}}</td>
			                                <td>{{$producto->sap}}</td>
			                                <td>{{(empty($producto->nombre_seccion)) ? 'No Definida' : $producto->nombre_seccion}}</td>
			                                <td>{{$producto->proveedor}}</td>
			                                <td>{{$producto->rut_proveedor}}</td>
			                                <td>{{($producto->status == 1) ? 'Activo' : 'Inactivo'}}</td>
			                                <td>
			                                	<a class="btn btn-primary btn-circle btn-sm" href="{{route('editProducto',$producto->id)}}">
			                                        <i class="fa fa-check"></i>
			                                    </a>
			                                </td>
			                            </tr>
		                        	@endforeach
		                        </tbody>
		                    </table>
		            	</div>
	            	</div>
	            	<div class="col-md-12">
	            		<hr class="sidebar-divider">
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</x-layout>