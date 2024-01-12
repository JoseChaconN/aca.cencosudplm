<x-layout>
	<x-slot name="breadcrumb">
		Proveedor
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Proveedor</h6>
	        </div>
	        <form method="POST" action="{{ (!empty($proveedor->id)) ? route('guardarEditProveedor',$proveedor->id) : route('guardarNuevoProveedor') }}">
	        	@csrf
	        	@if(!empty($proveedor->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre:</label>
								<div class="col-sm-8">
									<input type="text" name="nombre" class="form-control" value="{{ old('nombre' , $proveedor->nombre)}}" placeholder="Nombre">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Rut:</label>
								<div class="col-sm-8">
									<input type="text" name="rut" class="form-control" value="{{ old('rut' , $proveedor->rut)}}" placeholder="Código">
								</div>
							</div>
						</div>
						<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Secciones Asociadas:</label>
								<div class="col-sm-8">
									<select name="secciones[]" id="secciones[]" multiple class="selectpicker" data-live-search="true" data-width="100%" title="Seleccione">
								        @foreach($secciones as $seccion)
								        	<option {{ in_array($seccion->codigo, old('secciones', $secciones_proveedor)) ? 'selected' : '' }} value="{{$seccion->codigo}}">{{$seccion->nombre}}</option>
								        @endforeach
								    </select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">¿Proveedor Ciclo 3?:</label>
								<div class="col-sm-8">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="ciclo3" name="ciclo3" value="1" {{(old('ciclo3', $proveedor->ciclo3) == 1) ? 'checked' : ''}}>
									<label class="custom-control-label" for="ciclo3">Marcar si Proveedor es Ciclo 3</label>
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