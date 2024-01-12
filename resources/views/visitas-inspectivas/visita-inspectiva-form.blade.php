<x-layout>
	<x-slot name="breadcrumb">
		Visitas Inspectivas
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Documento</h6>
	        </div>
	        <form method="POST" enctype="multipart/form-data" action="{{ (!empty($visita->id)) ? route('visita.inspectiva.update',$visita->id) : route('visita.inspectiva.store') }}">
	        	@csrf
	        	@if(!empty($visita->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
					<input type="hidden" name="id_proveedor" value="{{$proveedor->id}}">
	        		<div class="row">
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Proveedor:</label>
								<div class="col-sm-8">
									{{$proveedor->nombre}}
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Rut del proveedor:</label>
								<div class="col-sm-8">
									{{$proveedor->rut}}
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Fecha Visita Inspectiva:</label>
								<div class="col-sm-8">
									{{ (!empty($visita->id)) ? date('d-m-Y',strtotime($visita->fecha_visita)) : date('d-m-Y') }}									
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Fecha de Ejecución:</label>
								<div class="col-sm-8">
									<input type="date" name="fecha_ejecucion" class="form-control" value="{{$visita->fecha_ejecucion}}">
								</div>
							</div>
						</div>
                        <div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Área:</label>
								<div class="col-sm-8">
									<select name="area" class="form-control">
										<option value="">Seleccione</option>
										@foreach ($area_auditoria_visita as $key => $value)
											<option {{ (old('area' , $visita->area) == $value['val']) ? 'selected' : ''}} value="{{$value['val']}}">{{$value['text']}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Programa:</label>
								<div class="col-sm-8">
									<select name="programa" class="form-control">
										<option value="">Seleccione</option>
										@foreach ($programa_auditoria_visita as $key => $value)
											<option {{ (old('area' , $visita->programa) == $value['val']) ? 'selected' : ''}} value="{{$value['val']}}">{{$value['text']}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Sección:</label>
								<div class="col-sm-8">
									<select name="id_seccion" class="form-control">
										<option value="">Seleccione</option>
										@foreach ($secciones as $seccion)
											<option {{ (old('area' , $visita->id_seccion) == $seccion->codigo) ? 'selected' : ''}} value="{{$seccion->codigo}}">{{$seccion->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Organismo Auditor:</label>
								<div class="col-sm-8">
									<select name="organismo_auditor" class="form-control">
										<option value="">Seleccione</option>
										@foreach ($organismos_auditores as $organismo)
											<option {{ (old('organismo_auditor' , $visita->organismo_auditor) == $organismo->id) ? 'selected' : ''}} value="{{$organismo->id}}">{{$organismo->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Planta:</label>
								<div class="col-sm-8">
									<select name="id_planta" class="form-control">
										<option value="">Seleccione</option>
										@foreach ($proveedor->plantas as $planta)
											<option {{ (old('area' , $visita->id_planta) == $planta->id) ? 'selected' : ''}} value="{{$planta->id}}">{{$planta->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">% Porcentaje:</label>
								<div class="col-sm-8">
									<input type="text" name="porcentaje" class="form-control inputDecimal" placeholder="% Porcentaje" value="{{$visita->porcentaje}}">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Observaciones:</label>
								<div class="col-sm-8">
									<textarea name="observaciones" id="observaciones" rows="5" class="form-control" style="resize: none;" placeholder="Observaciones">{{$visita->observaciones}}</textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Conclusiones:</label>
								<div class="col-sm-8">
									<textarea name="conclusiones" id="conclusiones" rows="5" class="form-control" style="resize: none;" placeholder="Conclusiones">{{$visita->conclusiones}}</textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Línea de Proceso:</label>
								<div class="col-sm-8">
									<textarea name="linea_proceso" id="linea_proceso" rows="5" class="form-control" style="resize: none;" placeholder="Línea de Proceso">{{$visita->linea_proceso}}</textarea>
								</div>
							</div>
						</div>
	        		</div>
					<div class="col-md-12" id="fotografia_auditoria_" style="display: none">
						<div class="col-md-12">
							<button class="btn-danger btn-circle btn-sm btn-delete-fotografia" type="button"><i class="fas fa-trash"></i></button>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Imagen:</label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input fotografia">
										<label class="custom-file-label" >Buscar Archivo</label>
									  </div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-12">
						<h6 class="m-0 font-weight-bold text-primary">
							Fotografías
							<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreFotografia()">
								<span class="icon text-white-50">
									<i class="fas fa-plus"></i>
								</span>
								<span class="text">Agregar Más</span>
							</button>
						</h6>
						<span>*Formatos permitidos jpg,png. Tamaño de las imágenes 300x300</span>
					</div>
					<div class="fotografias-div col-md-12">
					</div>
					<div class="col-md-12">
						<div class="row">
							@foreach ($imagenes_auditoria as $key => $value)
								<div class="col-md-4 mb-4">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<a href="{{$value['url']}}" target="_blank">
													<img src="{{$value['url']}}" alt="" style="max-height: 150px; max-width:auto">
												</a>
											</div>
										</div>
										<div class="col-md-12">
											<button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteMediaFile('{{ route('biblioteca.delete.media') }}',{{ $value['id'] }},null,{{ $visita->id }},'visita.inspectiva')">Eliminar Imagen</button>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12" id="auditoria_" style="display: none">
						<div class="col-md-12">
							<button class="btn-danger btn-circle btn-sm btn-delete-auditoria" type="button"><i class="fas fa-trash"></i></button>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Titulo Documento:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control titulo_documento_auditoria" placeholder="Titulo Documento">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Adjunto:</label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input adjunto_auditoria">
										<label class="custom-file-label" >Buscar Archivo</label>
									  </div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-12">
						<h6 class="m-0 font-weight-bold text-primary">
							Auditorías
							<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreAuditoria()">
								<span class="icon text-white-50">
									<i class="fas fa-plus"></i>
								</span>
								<span class="text">Agregar Más</span>
							</button>
						</h6>
					</div>
					<div class="auditorias-div col-md-12">
					</div>
					<div class="col-md-12 mt-4">
						<div class="row">
							@foreach ($visita_auditorias as $key => $value)
								<div class="col-md-12">
									<div class="col-md-12">
										<div class="form-group row">
											<label class="font-weight-bold">Titulo Documento:</label> {{$value['nombre_documento']}}
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-md-12">
												<a class="btn btn-primary btn-sm" download="" href="{{$adjunto_visita_auditorias[$key]['url']}}" target="_blank">
													Descargar Adjunto
												</a>
												<button class="btn btn-danger btn-sm" type="button">Eliminar Adjunto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<hr>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12" id="documento_" style="display: none">
						<div class="col-md-12">
							<button class="btn-danger btn-circle btn-sm btn-delete-documento" type="button"><i class="fas fa-trash"></i></button>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Titulo Documento:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control titulo_documento" placeholder="Titulo Documento">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Adjunto:</label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input adjunto_documento">
										<label class="custom-file-label" >Buscar Archivo</label>
									  </div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-12">
						<h6 class="m-0 font-weight-bold text-primary">
							Documentos
							<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreDocumentos()">
								<span class="icon text-white-50">
									<i class="fas fa-plus"></i>
								</span>
								<span class="text">Agregar Más</span>
							</button>
						</h6>
					</div>
					<div class="documentos-div col-md-12">
					</div>
					<div class="col-md-12 mt-4">
						<div class="row">
							@foreach ($visita_documentos as $key => $value)
								<div class="col-md-12">
									<div class="col-md-12">
										<div class="form-group row">
											<label class="font-weight-bold">Titulo Documento:</label> {{$value['nombre_documento']}}
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-md-12">
												<a class="btn btn-primary btn-sm" download="" href="{{$adjunto_visita_documentos[$key]['url']}}" target="_blank">
													Descargar Adjunto
												</a>
												<button class="btn btn-danger btn-sm" type="button">Eliminar Adjunto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<hr>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12" id="certificacion_vencimiento_" style="display: none">
						<div class="col-md-12">
							<button class="btn-danger btn-circle btn-sm btn-delete-certificacion-vencimiento" type="button"><i class="fas fa-trash"></i></button>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Certificación:</label>
								<div class="col-sm-8">
									<select class="form-control id_certificacion">
										<option value="">Seleccione</option>
										@foreach ($certficaciones_vencimiento as $certificacion)
											<option {{ (old('area' , $visita->id_planta) == $certificacion->id) ? 'selected' : ''}} value="{{$certificacion->id}}">{{$certificacion->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Fecha Emisión:</label>
								<div class="col-sm-8">
									<input type="date" class="form-control fecha_emision" placeholder="Titulo Documento">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Fecha vencimiento:</label>
								<div class="col-sm-8">
									<input type="date" class="form-control fecha_vencimiento" placeholder="Titulo Documento">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Adjunto:</label>
								<div class="col-sm-8">
									<div class="custom-file">
										<input type="file" class="custom-file-input adjunto_certificacion_vencimiento">
										<label class="custom-file-label" >Buscar Archivo</label>
									  </div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="col-md-12">
						<h6 class="m-0 font-weight-bold text-primary">
							Certificaciones con Vencimiento
							<button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreCertificacionVencimiento()">
								<span class="icon text-white-50">
									<i class="fas fa-plus"></i>
								</span>
								<span class="text">Agregar Más</span>
							</button>
						</h6>
					</div>
					<div class="certificaciones-vencimiento-div col-md-12">
					</div>
					<div class="row">
						<div class="col-md-12">
							@foreach ($certificacion_vencimiento_exist as $key => $value)
								<div class="col-md-12 mt-2">
									<div class="col-md-12">
										<div class="form-group row">
											<label class="font-weight-bold">Certificación:</label> {{$value['name']}}
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<label class="font-weight-bold">Fecha Emisión:</label> {{$value['data']['fecha_emision']}}
											
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<label class="font-weight-bold">Fecha vencimiento:</label> {{$value['data']['fecha_vencimiento']}}
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group row">
											<div class="col-md-12">
												<a class="btn btn-primary btn-sm" download="" href="{{$value['adjunto']['url']}}" target="_blank">
													Descargar Adjunto
												</a>
												<button class="btn btn-danger btn-sm" type="button">Eliminar Adjunto</button>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<hr>
									</div>
								</div>
							@endforeach
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
		function fnAddMoreFotografia() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#fotografia_auditoria_").clone().removeClass("hide");
            clone.attr("id", "fotografia_auditoria_"+number).removeClass("hide");
            
            clone.find('.fotografia').attr('name','fotografia[]');
            clone.find('.btn-delete-fotografia').attr("onclick","$('#fotografia_auditoria_"+number+"').remove()");        
            
            $('.fotografias-div').append(clone.show());
        }
		function fnAddMoreAuditoria() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#auditoria_").clone().removeClass("hide");
            clone.attr("id", "auditoria_"+number).removeClass("hide");
            
            clone.find('.titulo_documento_auditoria').attr('name','titulo_documento_auditoria[]');
			clone.find('.adjunto_auditoria').attr('name','adjunto_auditoria[]');
            clone.find('.btn-delete-auditoria').attr("onclick","$('#auditoria_"+number+"').remove()");        
            
            $('.auditorias-div').append(clone.show());
        }
		function fnAddMoreDocumentos() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#documento_").clone().removeClass("hide");
            clone.attr("id", "documento_"+number).removeClass("hide");
            
            clone.find('.titulo_documento').attr('name','titulo_documento[]');
			clone.find('.adjunto_documento').attr('name','adjunto_documento[]');
            clone.find('.btn-delete-documento').attr("onclick","$('#documento_"+number+"').remove()");        
            
            $('.documentos-div').append(clone.show());
        }
		function fnAddMoreCertificacionVencimiento() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#certificacion_vencimiento_").clone().removeClass("hide");
            clone.attr("id", "certificacion_vencimiento_"+number).removeClass("hide");
            
			clone.find('.id_certificacion').attr('name','id_certificacion[]');
            clone.find('.fecha_emision').attr('name','fecha_emision[]');
			clone.find('.fecha_vencimiento').attr('name','fecha_vencimiento[]');
			clone.find('.adjunto_certificacion_vencimiento').attr('name','adjunto_certificacion_vencimiento[]');
            clone.find('.btn-delete-certificacion-vencimiento').attr("onclick","$('#certificacion_vencimiento_"+number+"').remove()");        
            
            $('.certificaciones-vencimiento-div').append(clone.show());
        }
	</script>
	<script>
		jQuery(document).ready(function(){
			$('#collapseVisitas').addClass('show');
		});
	</script>
</x-layout>