<x-layout>

	<x-slot name="breadcrumb">
		Listado Auditorías
	</x-slot>

<div class="row">
    @if(!empty($mis_auditorias))
	    <div class="col-lg-12">
	    	<div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Mis Auditorias</h6>
	            </div>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
	                        <thead>
	                            <tr>
                                    <th>N°</th>
	                                <th>Nombre Proveedor</th>
	                                <th>Rut del proveedor</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Fecha Ejecución</th>
                                    <th>Responsable Creación</th>
                                    <th>Cumplimiento</th>
                                    <th>Sección</th>
                                    <th>-</th>
	                            </tr>
	                        </thead>                       
	                        <tbody>
	                        	@foreach($mis_auditorias as $auditoria)
	                        		<tr>
                                        <td>{{$auditoria->id}}</td>
		                                <td>{{$auditoria->proveedor->nombre}}</td>
		                                <td>{{$auditoria->proveedor->rut}}</td>
                                        <td>{{date('d-m-Y', strtotime($auditoria->fecha_auditoria) )}}</td>
                                        <td>{{date('d-m-Y', strtotime($auditoria->fecha_ejecucion) )}}</td>
                                        <td>{{$auditoria->responsable->name.' '.$auditoria->responsable->last_name}}</td>
                                        <td>{{$auditoria->porcentaje}}%</td>
                                        <td>{{$auditoria->seccion_auditoria->nombre}}</td>
		                                <td>
                                            <form class="form-inline" id="deleteForm_{{$auditoria->id}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$auditoria->id}}">
                                                <a class="btn btn-primary btn-circle btn-sm" href="{{route('auditorias.edit',$auditoria->id)}}"><i class="fa fa-check"></i></a>
                                                <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('auditorias.delete')}}',{{$auditoria->id}},'{{$auditoria->id}}')">
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
    @endif
    @if(!empty($otras_auditorias))
	    <div class="col-lg-12">
	    	<div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Otras Auditorias</h6>
	            </div>
	            <div class="card-body">
	                <div class="table-responsive">
	                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
	                        <thead>
	                            <tr>
                                    <th>N°</th>
	                                <th>Nombre Proveedor</th>
	                                <th>Rut del proveedor</th>
                                    <th>Fecha de ingreso</th>
                                    <th>Fecha Ejecución</th>
                                    <th>Responsable Creación</th>
                                    <th>Cumplimiento</th>
                                    <th>Sección</th>
                                    <th>-</th>
	                            </tr>
	                        </thead>                       
	                        <tbody>
	                        	@foreach($otras_auditorias as $auditoria)
	                        		<tr>
                                        <td>{{$auditoria->id}}</td>
		                                <td>{{$auditoria->proveedor->nombre}}</td>
		                                <td>{{$auditoria->proveedor->rut}}</td>
                                        <td>{{date('d-m-Y', strtotime($auditoria->fecha_auditoria) )}}</td>
                                        <td>{{date('d-m-Y', strtotime($auditoria->fecha_ejecucion) )}}</td>
                                        <td>{{$auditoria->responsable->name.' '.$auditoria->responsable->last_name}}</td>
                                        <td>{{$auditoria->porcentaje}}%</td>
                                        <td>{{$auditoria->seccion_auditoria->nombre}}</td>
		                                <td>
		                                	<a class="btn btn-primary btn-circle btn-sm" href="{{route('auditorias.edit',$auditoria->id)}}"><i class="fa fa-check"></i></a>
                                            <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('auditorias.delete')}}',{{$auditoria->id}},'{{$auditoria->id}}')">
                                                <i class="fa fa-trash" title="Eliminar"></i>
                                            </button>
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
		$('#collapseAuditoria').addClass('show');
	});
</script>
</x-layout>