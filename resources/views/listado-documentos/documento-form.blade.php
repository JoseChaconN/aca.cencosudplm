<x-layout>
	<x-slot name="breadcrumb">
		Documento
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Documento</h6>
	        </div>
	        <form method="POST" action="{{ (!empty($documento->id)) ? route('documentos.update',$documento->id) : route('documentos.store') }}">
	        	@csrf
	        	@if(!empty($documento->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre Documento:</label>
								<div class="col-sm-8">
									<input type="text" name="nombre" placeholder="Nombre Documento" class="form-control" value="{{ old('nombre' , $documento->nombre)}}">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Tipo Documento:</label>
								<div class="col-sm-8">
									<select name="tipo_documento" class="form-control">
										<option value="">Seleccione</option>
									    <option {{ (old('tipo_documento' , $documento->tipo_documento) == '1') ? 'selected' : ''}} value="1">Vencimiento</option>
									    <option {{ (old('tipo_documento' , $documento->tipo_documento) == '2') ? 'selected' : ''}} value="2">Fija</option>
										<option {{ (old('tipo_documento' , $documento->tipo_documento) == '3') ? 'selected' : ''}} value="3">Documentos Solicitados a Proveedor</option>
								    </select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Mostrar en:</label>
								<div class="col-sm-8">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" id="customCheckboxInline1" name="mostrar_auditoria" {{($documento->mostrar_auditoria == 1) ? 'checked' : ''}} class="custom-control-input" value="1">
										<label class="custom-control-label" for="customCheckboxInline1">Mostrar en Auditorias</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" id="customCheckboxInline2" name="mostrar_prospecto" {{($documento->mostrar_prospecto == 1) ? 'checked' : ''}} class="custom-control-input" value="1">
										<label class="custom-control-label" for="customCheckboxInline2">Mostrar en Prospectos</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" id="customCheckboxInline3" name="mostrar_visitas_inspectivas" {{($documento->mostrar_visitas_inspectivas == 1) ? 'checked' : ''}} class="custom-control-input" value="1">
										<label class="custom-control-label" for="customCheckboxInline3">Mostrar en Visitas Inspectivas</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" id="customCheckboxInline4" name="mostrar_agregar_documento_biblioteca" {{($documento->mostrar_agregar_documento_biblioteca == 1) ? 'checked' : ''}} class="custom-control-input" value="1">
										<label class="custom-control-label" for="customCheckboxInline4">Mostrar en Agregar Documento Biblioteca</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">¿Contiene Adjunto?:</label>
								<div class="col-sm-8">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" id="customCheckboxInline5" name="file" {{($documento->file == 1) ? 'checked' : ''}}  class="custom-control-input" value="1">
										<label class="custom-control-label" for="customCheckboxInline5">Sí</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">¿Validar Vencimiento?:</label>
								<div class="col-sm-8">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" id="customCheckboxInline6" name="validar_vencimiento" {{($documento->validar_vencimiento == 1) ? 'checked' : ''}}  class="custom-control-input" value="1">
										<label class="custom-control-label" for="customCheckboxInline6">Sí</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<h6 class="m-0 font-weight-bold text-primary">Etiquetas/Tags:</h6>
							<span>*Estas serán las etiquetas/tags con las que se podra relacionar la busqueda en la Biblioteca</span>
						</div>
						<div class="col-md-12 mt-4">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-hover dataTable">
										<thead>
											<tr>
												<th>Etiqueta/Tag</th>
												<th>Seleccionar</th>
											</tr>
											<tbody>
												@foreach ($tags as $tag)
													<tr>
														<td>{{$tag->name}}</td>
														<td>
															<div class="form-group">
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" {{(in_array($tag->id,$tags_documento)) ? 'checked' : ''}} value="{{$tag->name}}" name="tag[]" id="tag_{{$tag->id}}">
																	<label class="custom-control-label" for="tag_{{$tag->id}}"></label>
																</div>
															</div>
														</td>
													</tr>
												@endforeach
											</tbody>
										</thead>
									</table>
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
		jQuery(document).ready(function(){
			$('#collapseAdministracion').addClass('show');
		});
	</script>
</x-layout>