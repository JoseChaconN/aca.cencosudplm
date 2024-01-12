<x-layout>
	<x-slot name="breadcrumb">
		Biblioteca
	</x-slot>
<div class="row">
	<div class="col-lg-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buscar de Documentos</h6>
            </div>
            <div class="card-body">
               	<form method="POST" action="{{ route('biblioteca.index')}}">
               		@csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
								<label for="nombreProv">Etiquetas/Tags:</label>
                                <select class="form-control form-control-sm selectpicker show-tick" multiple name="tag[]" id="tag[]" data-live-search="true" title="Etiquetas/Tags">                                    
                                    @foreach ($tags as $item)
                                        <option value="{{$item->name}}" {{(!empty($request['tag']) && in_array($item->name,$request['tag'])) ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
							</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="nombreProv">Mes Creado:</label>
                                <select class="form-control form-control-sm selectpicker show-tick" name="mes_creado" id="mes_creado" data-live-search="true" title="Mes Creado">
                                    <option value="99">Todos</option>
                                    @foreach ($meses_array as $key => $value)
                                        <option {{($key == $request['mes_creado']) ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
							</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="nombreProv">Año Creado:</label>
                                <select class="form-control form-control-sm selectpicker show-tick" name="ano_creado" id="ano_creado" data-live-search="true" title="Año Creado">
                                    @for ($i = 2023; $i <= date('Y'); $i++)
                                        <option {{($i == $request['ano_creado']) ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
							</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="nombreProv">Área:</label>
                                <select class="form-control form-control-sm selectpicker show-tick" name="area" id="area" data-live-search="true" title="Sección">
                                    @foreach ($secciones as $item)
                                        <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
							</div>
                        </div>
                    </div>
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
                        <!--div class="col-md-4">
                            <div class="form-group">
                                <label for="rutProv">Código SAP:</label>
                                <input type="text" class="form-control form-control-sm" id="rutProv" name="rutProv" placeholder="Rut del proveedor" value="{{ empty($request['rutProv']) ? '' : $request['rutProv'] }}">
                            </div>
                        </div-->
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
	                    <span class="text">Buscar Documento</span>
	                </button>
               	</form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Documentos Encontrados</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Documento</th>
                                <th>Proveedor</th>
                                <th>Rut del proveedor</th>
                                <th>Producto</th>
                                <th>Código de Barra (EAN)</th>
                                <th>Fecha vencimiento</th>
                                <th>-</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documentos as $documento)
                                <tr>
                                    <td>{{$documento->documento->nombre}}</td>
                                    <td>{{$documento->proveedor->nombre}}</td>
                                    <td>{{$documento->proveedor->rut}}</td>
                                    <td>{{$documento->producto_prospecto->nombre_producto}}</td>
                                    <td>{{$documento->producto_prospecto->codigo_barra}}</td>
                                    <td>{{(!empty($documento->fecha_vencimiento)) ? date('d-m-Y',strtotime($documento->fecha_vencimiento)) : ''}}</td>
                                    <td>
                                        @if (!empty($adjunto_documentos[$documento->id]))
                                            <a class="btn btn-primary btn-circle btn-sm" title="Descargar" href="{{$adjunto_documentos[$documento->id]}}" download=""><i class="fas fa-cloud-download-alt"></i></a>    
                                        @endif
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
        $('#collapseBiblioteca').addClass('show');
    });
</script>
</x-layout>