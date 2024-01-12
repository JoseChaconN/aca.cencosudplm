<x-layout>
	<x-slot name="breadcrumb">
		Producto
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Producto</h6>
	        </div>
	        <form method="POST" action="{{ (!empty($producto->id)) ? route('guardarEditProducto',$producto->id) : route('guardarNuevoProducto') }}">
	        	@csrf
	        	@if(!empty($producto->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre:</label>
								<div class="col-sm-8">
									<input type="text" name="nombre" class="form-control" value="{{ old('nombre' , $producto->nombre)}}" placeholder="Nombre">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Código EAN:</label>
								<div class="col-sm-8">
									<input type="text" name="ean" class="form-control" value="{{ old('ean' , $producto->ean)}}" placeholder="Código">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Código SAP:</label>
								<div class="col-sm-8">
									<input type="text" name="sap" class="form-control" value="{{ old('sap' , $producto->sap)}}" placeholder="Dirección">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Marca:</label>
								<div class="col-sm-8">
									<input type="text" name="marca" class="form-control" value="{{ old('marca' , $producto->marca)}}" placeholder="Teléfono">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Sección:</label>
								<div class="col-sm-8">
									<select name="id_seccion" id="id_seccion" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($secciones as $seccion)
								        	<option {{ (old('id_seccion', $producto->id_seccion) == $seccion->codigo )? 'selected' : '' }} value="{{$seccion->codigo}}">{{$seccion->nombre}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Pais:</label>
								<div class="col-sm-8">
									<select name="pais" id="pais" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($paises as $pais)
								        	<option {{ (old('pais', $producto->pais) == $pais->code) ? 'selected' : '' }} value="{{$pais->code}}">{{$pais->nombre}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Tipo Producto:</label>
								<div class="col-sm-8">
									<select name="tipo_alimento" id="tipo_alimento" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($tipo_producto as $key => $value)
								        	<option {{ (old('tipo_alimento', $producto->tipo_alimento) == $value['val']) ? 'selected' : '' }} value="{{$value['val']}}">{{$value['text']}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Proveedor:</label>
								<div class="col-sm-8">
									<select name="id_proveedor" id="id_proveedor" class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($proveedores as $proveedor)
								        	<option {{ (old('id_proveedor', $producto->id_proveedor) == $proveedor->id) ? 'selected' : '' }} value="{{$proveedor->id}}">{{$proveedor->rut.' - '.$proveedor->nombre}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">¿Aplica Frigorifico?:</label>
								<div class="col-sm-8">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="frigorifico_switch" {{(old('frigorifico_switch', $producto->frigorifico_switch) == 1) ? 'checked' : ''}} name="frigorifico_switch" value="1">
									<label class="custom-control-label" for="frigorifico_switch">Marcar si aplica Frigorifico</label>
								</div>
							</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">¿Producto Marcas Propias?:</label>
								<div class="col-sm-8">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="mp" {{(old('mp', $producto->mp) == 1) ? 'checked' : ''}} name="mp" value="1">
									<label class="custom-control-label" for="mp">Marcar si Producto es Marcas Propias</label>
								</div>
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
</x-layout>