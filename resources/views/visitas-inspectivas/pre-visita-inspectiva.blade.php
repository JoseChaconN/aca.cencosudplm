<x-layout>

	<x-slot name="breadcrumb">
		Visita Inspectiva Nueva
	</x-slot>

<div class="row">
	<div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buscar Proveedor</h6>
            </div>
            <div class="card-body">
               	<form method="POST" action="{{ route('visita.inspectiva.pre_create')}}">
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
				  	<button class="btn btn-primary btn-icon-split" type="submit">
	                    <span class="icon text-white-50">
	                        <i class="fas fa-search"></i>
	                    </span>
	                    <span class="text">Buscar Proveedor</span>
	                </button>
               	</form>
            </div>
        </div>
    </div>
    @if(!empty($proveedores))
	    <div class="col-lg-12">
	    	<div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Proveedores Encontrados</h6>
	            </div>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
	                        <thead>
	                            <tr>
	                                <th>Nombre Proveedor1</th>
	                                <th>Rut del proveedor</th>
	                                <th>-</th>
	                            </tr>
	                        </thead>                       
	                        <tbody>
	                        	@foreach($proveedores as $proveedor)
	                        		<tr>
		                                <td>{{$proveedor->nombre}}</td>
		                                <td>{{$proveedor->rut}}</td>
		                                <td>
		                                	<a class="btn btn-primary btn-circle btn-sm" href="{{route('visita.inspectiva.new',$proveedor->id)}}"><i class="fa fa-check"></i></a>
		                                </td>
		                            </tr>
	                        	@endforeach	                        	
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
    @endif
</div>
<script>
	jQuery(document).ready(function(){
		$('#collapseVisitas').addClass('show');
	});
</script>
</x-layout>