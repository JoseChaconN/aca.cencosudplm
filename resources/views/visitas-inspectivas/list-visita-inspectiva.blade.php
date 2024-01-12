<x-layout>

	<x-slot name="breadcrumb">
		Visitas Inspectivas
	</x-slot>

<div class="row">
	<div class="col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Mis Visitas Inspectivas</h6>
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
							@foreach($mis_visitas_inspectivas as $visita)
								<tr>
									<td>{{$visita->id}}</td>
									<td>{{$visita->proveedor->nombre}}</td>
									<td>{{$visita->proveedor->rut}}</td>
									<td>{{date('d-m-Y', strtotime($visita->fecha_auditoria) )}}</td>
									<td>{{date('d-m-Y', strtotime($visita->fecha_ejecucion) )}}</td>
									<td>{{$visita->responsable->name.' '.$visita->responsable->last_name}}</td>
									<td>{{$visita->porcentaje}}%</td>
									<td>{{$visita->seccion_visita_inspectiva->nombre}}</td>
									<td>
										<form class="form-inline" id="deleteForm_{{$visita->id}}">
											@csrf
											<input type="hidden" name="id" value="{{$visita->id}}">
											<a class="btn btn-primary btn-circle btn-sm" href="{{route('visita.inspectiva.edit',$visita->id)}}"><i class="fa fa-check"></i></a>
											<button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('visita.inspectiva.delete')}}',{{$visita->id}},'{{$visita->id}}')">
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
	<div class="col-lg-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Otras Visitas Inspectivas</h6>
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
							@foreach($otras_visitas_inspectivas as $visita)
								<tr>
									<td>{{$visita->id}}</td>
									<td>{{$visita->proveedor->nombre}}</td>
									<td>{{$visita->proveedor->rut}}</td>
									<td>{{date('d-m-Y', strtotime($visita->fecha_auditoria) )}}</td>
									<td>{{date('d-m-Y', strtotime($visita->fecha_ejecucion) )}}</td>
									<td>{{$visita->responsable->name.' '.$visita->responsable->last_name}}</td>
									<td>{{$visita->porcentaje}}%</td>
									<td>{{$visita->seccion_visita_inspectiva->nombre}}</td>
									<td>
										<a class="btn btn-primary btn-circle btn-sm" href="{{route('visita.inspectiva.edit',$visita->id)}}"><i class="fa fa-check"></i></a>
										<button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteData('{{route('visita.inspectiva.delete')}}',{{$visita->id}},'{{$visita->id}}')">
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
</div>
<script>
	jQuery(document).ready(function(){
		$('#collapseVisitas').addClass('show');
	});
</script>
</x-layout>