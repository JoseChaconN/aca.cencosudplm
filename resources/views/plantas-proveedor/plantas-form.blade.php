<x-layout>
    <x-slot name="breadcrumb">
        Plantas Proveedor
    </x-slot>
    <div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Planta proveedor - {{ (!empty($planta->id)) ? $planta->proveedor->nombre : $proveedor->nombre }}</h6>
	        </div>
            <form method="POST" action="{{ (empty($planta->id)) ? route('plantas-proveedor.store'): route('plantas-proveedor.update',$planta->id)}}" enctype="multipart/form-data">
                @csrf
                @if (!empty($planta->id))
                    @method('PATCH')
                @endif
                @if (empty($planta->id))
                    <input type="hidden" name="id_proveedor" value="{{ $proveedor->id }}">
                @endif
                <div class="card-body border-left-primary">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Planta Proveedor:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Planta o Predio:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Planta o Predio" value="{{ old('nombre',$planta->nombre) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Dirección:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" name="direccion" placeholder="Dirección" value="{{ old('direccion',$planta->direccion) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label font-weight-bold">Resolución Sanitaria:</label>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="documento">
                                        <label class="custom-file-label" >Buscar Archivo</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        @if (!empty($planta->id))
                            @if (!empty($planta->getMedia('resolucion_sanitaria_planta')->last()))
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <a class="btn btn-primary btn-sm mt-1" download="" href="{{$planta->getMedia('resolucion_sanitaria_planta')->last()->getUrl()}}" target="_blank">Descargar
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
		jQuery(document).ready(function(){
			$('#collapsePlantasProveedor').addClass('show');
		});
	</script>
</x-layout>