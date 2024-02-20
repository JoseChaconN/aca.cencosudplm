<x-layout>
    <style>
        .bs-stepper-circle{
            font-size: 12px;
        }
        .bs-stepper-label{
            font-size: 12px;
        }
    </style>
    <x-slot name="breadcrumb">
        Solicitud de Prospecto
    </x-slot>
    <div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Solicitud de prospecto de producto</h6>
	        </div>
            <form method="POST" action="{{route('prospectos-importados.update',$prospecto->id)}}" id="solicitudForm" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="stepp" id="stepp" value="0">
                <input type="hidden" name="estado_solicitud" id="estado_solicitud" value="{{$prospecto->estado_solicitud}}">
                <input type="hidden" name="id_comercial" id="id_comercial" value="{{$prospecto->id_comercial}}">
                <input type="hidden" name="id_calidad" id="id_calidad" value="{{$prospecto->id_calidad}}">
                <div class="card-body border-left-primary">
                    <div class="row">
	        			<div class="col-md-12">
                            <div id="stepper1" class="bs-stepper">
                                <div class="bs-stepper-header">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Datos del proveedor</span>
                                        </button>
                                    </div>
                                    <div class="line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="btn step-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Datos básicos del producto</span>
                                        </button>
                                    </div>
                                    @hasrole('calidad')
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-3">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Paso 1</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-4">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Paso 2</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-5">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">5</span>
                                                <span class="bs-stepper-label">Paso 3</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-6">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">6</span>
                                                <span class="bs-stepper-label">Paso 4</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-7">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">7</span>
                                                <span class="bs-stepper-label">Paso 5</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-8">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">7</span>
                                                <span class="bs-stepper-label">Paso 6</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-9">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">7</span>
                                                <span class="bs-stepper-label">Conclusiones</span>
                                            </button>
                                        </div>
                                    @endhasrole
                                   {{--  @hasrole('comercial')
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-6">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Documentos Solicitados a Proveedor</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-7">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Conclusiones</span>
                                            </button>
                                        </div>
                                    @endhasrole --}}
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="test-l-1" class="content">
                                        <div class="col-md-12">
                                            <h6 class="font-weight-bold text-primary">Datos del proveedor</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bold">Nombre del proveedor:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" name="nombre_proveedor" placeholder="Nombre del proveedor" value="{{$prospecto->nombre_proveedor}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bold">Rut del proveedor:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" name="rut_proveedor" placeholder="Rut del proveedor" value="{{$prospecto->rut_proveedor}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr class="sidebar-divider">
                                        </div>
                                    </div>
                                    <div id="test-l-2" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <input type="hidden" name="id_producto[{{$producto->id}}]" value="{{$producto->id}}">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_2_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_2_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_2_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Nombre producto:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" id="nombre_producto_0_{{$producto->id}}" name="product_name[{{$producto->id}}]" placeholder="Nombre producto" value="{{$producto->product_name}}" onkeyup="$('#nombre_producto_1_{{$producto->id}}').val(this.value)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Nombre del proveedor:</label>
                                                                                <div class="col-sm-8">
                                                                                    {{$prospecto->nombre_proveedor}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Sección:</label>
                                                                                <div class="col-sm-8">
                                                                                    {{$producto->seccion}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">SAP:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" onkeyup="$('#sap_producto_1_{{$producto->id}}').val(this.value)" name="sap_producto[{{$producto->id}}]" id="sap_producto_0_{{$producto->id}}" placeholder="Sap" value="{{$producto->sap}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <h6 class="font-weight-bold text-primary">Cargar Ficha Excel</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="ficha_excel[{{ $producto->id }}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <span>Si desea guardar una nueva versión del producto, seleccione la casilla 'Nueva Versión'.</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                                                <input type="checkbox" id="customCheckboxInline2_{{ $producto->id }}" name="nueva_version[{{ $producto->id }}]" class="custom-control-input" value="1">
                                                                                <label class="custom-control-label" for="customCheckboxInline2_{{ $producto->id }}">Nueva Versión</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @hasanyrole('calidad')
                                        <div id="test-l-3" class="content">
                                            @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_3_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_3_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_3_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card shadow mb-4">
                                                                                <a href="#collapseCardProductoVInitial_3_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                    role="button" aria-expanded="true" aria-controls="collapseCardProductoVInitial_3_{{$producto->id}}">
                                                                                    <h6 class="m-0 font-weight-bold text-primary">Versión {{$producto->version}}</h6>
                                                                                </a>
                                                                                <div class="collapse" id="collapseCardProductoVInitial_3_{{$producto->id}}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                SAP
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="sap_producto[{{$producto->id}}]" value="{{ $producto->sap }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control"  name="sap_obs[{{$producto->id}}]" placeholder="Observaciones" style="resize: none">{{ $producto->obs->sap }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Product Name(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="product_name[{{$producto->id}}]" value="{{ $producto->product_name }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" name="product_name_obs[{{$producto->id}}]" style="resize: none">{{ $producto->obs->product_name }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Nombre producto español
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="product_name_spanish[{{$producto->id}}]" value="{{ $producto->product_name_spanish }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" name="product_name_spanish_obs[{{$producto->id}}]" placeholder="Observaciones" style="resize: none">{{ $producto->obs->product_name_spanish }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Claims origin
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="claims_origin[{{$producto->id}}]" value="{{ $producto->claims_origin }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" name="claims_origin_obs[{{$producto->id}}]" style="resize: none">{{ $producto->obs->claims_origin }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Comments
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="comments[{{$producto->id}}]" value="{{ $producto->comments }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" name="comments_obs[{{$producto->id}}]" style="resize: none">{{ $producto->obs->comments }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Name and organic certifying number
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="name_organic_certifying_number[{{$producto->id}}]" value="{{ $producto->name_organic_certifying_number }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="name_organic_certifying_number_obs[{{ $producto->id }}]">{{ $producto->obs->name_organic_certifying_number }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Plant number o Factory (SAG)(**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="plant_number_factory[{{ $producto->id }}]" value="{{ $producto->plant_number_factory }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="plant_number_factory_obs[{{ $producto->id }}]">{{ $producto->obs->plant_number_factory }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Net weight(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="net_weight[{{ $producto->id }}]" value="{{ $producto->net_weight }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="net_weight_obs[{{ $producto->id }}]">{{ $producto->obs->net_weight }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Drained weight(**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="drained_weight[{{ $producto->id }}]" value="{{ $producto->drained_weight }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="drained_weight_obs[{{ $producto->id }}]">{{ $producto->obs->drained_weight }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Units per packaging(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="units_x_packaging[{{ $producto->id }}]" value="{{ $producto->units_x_packaging }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="units_x_packaging_obs[{{ $producto->id }}]">{{ $producto->obs->units_x_packaging }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Country of origin(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="country[{{ $producto->id }}]" value="{{ $producto->country }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="country_obs[{{ $producto->id }}]">{{ $producto->obs->country }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Milking country
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="milking_country[{{ $producto->id }}]" value="{{ $producto->milking_country }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="milking_country_obs[{{ $producto->id }}]">{{ $producto->obs->milking_country }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate the type expiration date used ( Expiration date and lot number or elaboration and expiration date or date of elaboration and shelf life)(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="expiration_date[{{ $producto->id }}]" value="{{ $producto->expiration_date }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="expiration_date_obs[{{ $producto->id }}]">{{ $producto->obs->expiration_date }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Name and adress manufacturer(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="name_adress_manufacturer[{{ $producto->id }}]" value="{{ $producto->name_adress_manufacturer }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="name_adress_manufacturer_obs[{{ $producto->id }}]">{{ $producto->obs->name_adress_manufacturer }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Shelf life(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="shelf_life[{{ $producto->id }}]" value="{{ $producto->shelf_life }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="shelf_life_obs[{{ $producto->id }}]">{{ $producto->obs->shelf_life }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                UPC or Bar Code(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="upc_bar_code[{{ $producto->id }}]" value="{{ $producto->upc_bar_code }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="upc_bar_code_obs[{{ $producto->id }}]">{{ $producto->obs->upc_bar_code }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Storage conditions(*) 
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="storage_conditions[{{ $producto->id }}]" value="{{ $producto->storage_conditions }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="storage_conditions_obs[{{ $producto->id }}]">{{ $producto->obs->storage_conditions }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Method of preparation(**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="method_preparation[{{ $producto->id }}]" value="{{ $producto->method_preparation }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="method_preparation_obs[{{ $producto->id }}]">{{ $producto->obs->method_preparation }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Name of supplier(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="name_supplier[{{ $producto->id }}]" value="{{ $producto->name_supplier }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="name_supplier_obs[{{ $producto->id }}]">{{ $producto->obs->name_supplier }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Ingredients(*)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="ingredients[{{ $producto->id }}]" value="{{ $producto->ingredients }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="ingredients_obs[{{ $producto->id }}]">{{ $producto->obs->ingredients }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                For organic products, indicate % of organic ingredients
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="porcent_organic_ingredients[{{ $producto->id }}]" value="{{ $producto->porcent_organic_ingredients }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="porcent_organic_ingredients_obs[{{ $producto->id }}]">{{ $producto->obs->porcent_organic_ingredients }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                Indicate % characterizing ingredients
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="porcent_characterizing_ingredients[{{ $producto->id }}]" value="{{ $producto->porcent_characterizing_ingredients }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="porcent_characterizing_ingredients_obs[{{ $producto->id }}]">{{ $producto->obs->porcent_characterizing_ingredients }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate name additive
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="name_additive[{{ $producto->id }}]" value="{{ $producto->name_additive }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="name_additive_obs[{{ $producto->id }}]">{{ $producto->obs->name_additive }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate quantity of additive ( ppm or %) (**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="porcent_additive[{{ $producto->id }}]" value="{{ $producto->porcent_additive }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="porcent_additive_obs[{{ $producto->id }}]">{{ $producto->obs->porcent_additive }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate quantity of additive(**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="quantity_additive[{{ $producto->id }}]" value="{{ $producto->quantity_additive }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="quantity_additive_obs[{{ $producto->id }}]">{{ $producto->obs->quantity_additive }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate additive code SIN ( CODEX)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="indicate_additive_code[{{ $producto->id }}]" value="{{ $producto->indicate_additive_code }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="indicate_additive_code_obs[{{ $producto->id }}]">{{ $producto->obs->indicate_additive_code }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate additive functionality ( CODEX)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="indicate_additive_functionality[{{ $producto->id }}]" value="{{ $producto->indicate_additive_functionality }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="indicate_additive_functionality_obs[{{ $producto->id }}]">{{ $producto->obs->indicate_additive_functionality }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate type fo vegetable oil or fat used(**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="vegetable_oil_fat_used[{{ $producto->id }}]" value="{{ $producto->vegetable_oil_fat_used }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="vegetable_oil_fat_used_obs[{{ $producto->id }}]">{{ $producto->obs->vegetable_oil_fat_used }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                indicate if there are trans fats of hydrogenated origin
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="trans_fats_hydrogenated_origin[{{ $producto->id }}]" value="{{ $producto->trans_fats_hydrogenated_origin }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="trans_fats_hydrogenated_origin_obs[{{ $producto->id }}]">{{ $producto->obs->product_name }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To Indicate names of spices and herbs used (**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="spices_herbs_used[{{ $producto->id }}]" value="{{ $producto->spices_herbs_used }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="spices_herbs_used_obs[{{ $producto->id }}]">{{ $producto->obs->spices_herbs_used }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate quantity of sweetener per 100 grams or ml of CYCLAMAT, ASPARTAME, SUCRALOSE, ACESULFAM K, SACHARINE, STEVIA, ALITAME ( mg) (**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="quantity_sweetener_per_100_gr_ml[{{ $producto->id }}]" value="{{ $producto->quantity_sweetener_per_100_gr_ml }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="quantity_sweetener_per_100_gr_ml_obs[{{ $producto->id }}]">{{ $producto->obs->quantity_sweetener_per_100_gr_ml }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate if flavourings or aroma used are natural or artificial (**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="flavourings_aroma_natural_artificial[{{ $producto->id }}]" value="{{ $producto->flavourings_aroma_natural_artificial }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="flavourings_aroma_natural_artificial_obs[{{ $producto->id }}]">{{ $producto->obs->flavourings_aroma_natural_artificial }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate quantity of xilitol, maltitol, sorbitol, glicerol (g/100g) (**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="quantity_x_m_s_g[{{ $producto->id }}]" value="{{ $producto->quantity_x_m_s_g }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="quantity_x_m_s_g_obs[{{ $producto->id }}]">{{ $producto->obs->quantity_x_m_s_g }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                To indicate quantity of caffeine (mg/100g) used (**)
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input type="text" class="form-control" name="quantity_caffeine[{{ $producto->id }}]" value="{{ $producto->quantity_caffeine }}">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="quantity_caffeine_obs[{{ $producto->id }}]">{{ $producto->obs->quantity_caffeine }}</textarea>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                If there's any extract used, to indicate function, chemical process and name of the component extracted (**)
                                                                                                            </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="any_extract_used[{{ $producto->id }}]" value="{{ $producto->any_extract_used }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="any_extract_used_obs[{{ $producto->id }}]">{{ $producto->obs->any_extract_used }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate origin of gelatin used   ( Pork or Bovine) (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="origin_gelatin[{{ $producto->id }}]" value="{{ $producto->origin_gelatin }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="origin_gelatin_obs[{{ $producto->id }}]">{{ $producto->obs->origin_gelatin }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate  ° Brix of the final product (customs requirement)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="brix_final_product[{{ $producto->id }}]" value="{{ $producto->brix_final_product }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="brix_final_product_obs[{{ $producto->id }}]">{{ $producto->obs->brix_final_product }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate  ° Brix of the final product without added sugar(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="brix_final_product_without_added_sugar[{{ $producto->id }}]" value="{{ $producto->brix_final_product_without_added_sugar }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="brix_final_product_without_added_sugar_obs[{{ $producto->id }}]">{{ $producto->obs->brix_final_product_without_added_sugar }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate ° Brix of the fruit that is in greater proportion in the drink(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="brix_fruit_greater_proportion_drink[{{ $producto->id }}]" value="{{ $producto->brix_fruit_greater_proportion_drink }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="brix_fruit_greater_proportion_drink_obs[{{ $producto->id }}]">{{ $producto->obs->brix_fruit_greater_proportion_drink }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate names of colourings used (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="names_colourings[{{ $producto->id }}]" value="{{ $producto->names_colourings }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="names_colourings_obs[{{ $producto->id }}]">{{ $producto->obs->names_colourings }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate minimum % of cocoa solids used (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="minimum_porcent_cocoa_solids[{{ $producto->id }}]" value="{{ $producto->minimum_porcent_cocoa_solids }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="minimum_porcent_cocoa_solids_obs[{{ $producto->id }}]">{{ $producto->obs->minimum_porcent_cocoa_solids }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate the % of cocoa butter  from recipe and as part of cocoa mass (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" name="porcent_cocoa_butter_cocoa_mass[{{ $producto->id }}]" value="{{ $producto->porcent_cocoa_butter_cocoa_mass }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" name="porcent_cocoa_butter_cocoa_mass_obs[{{ $producto->id }}]">{{ $producto->obs->porcent_cocoa_butter_cocoa_mass }}</textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @foreach ($producto->versiones as $item)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card shadow mb-4">
                                                                                    <a href="#collapseCardProductoV_3_{{$item->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                        role="button" aria-expanded="true" aria-controls="collapseCardProductoV_3_{{$item->id}}">
                                                                                        <h6 class="m-0 font-weight-bold text-primary">Versión {{$item->version}}</h6>
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseCardProductoV_3_{{$item->id}}">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    SAP
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->sap }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control"  disabled placeholder="Observaciones" style="resize: none"></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Product Name(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->product_name }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" disabled style="resize: none"></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Nombre producto español
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->product_name_spanish }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" disabled placeholder="Observaciones" style="resize: none"></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Claims origin
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->claims_origin }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" disabled style="resize: none"></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Comments
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->comments }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" disabled style="resize: none"></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Name and organic certifying number
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->name_organic_certifying_number }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Plant number o Factory (SAG)(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->plant_number_factory }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Net weight(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->net_weight }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Drained weight(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->drained_weight }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Units per packaging(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->units_x_packaging }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Country of origin(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->country }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Milking country
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->milking_country }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate the type expiration date used ( Expiration date and lot number or elaboration and expiration date or date of elaboration and shelf life)(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->expiration_date }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Name and adress manufacturer(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->name_adress_manufacturer }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Shelf life(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->shelf_life }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    UPC or Bar Code(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->upc_bar_code }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Storage conditions(*) 
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->storage_conditions }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Method of preparation(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->method_preparation }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Name of supplier(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->name_supplier }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Ingredients(*)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->ingredients }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    For organic products, indicate % of organic ingredients
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->porcent_organic_ingredients }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Indicate % characterizing ingredients
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->porcent_characterizing_ingredients }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate name additive
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->name_additive }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate quantity of additive ( ppm or %) (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->porcent_additive }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate quantity of additive(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->quantity_additive }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate additive code SIN ( CODEX)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->indicate_additive_code }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate additive functionality ( CODEX)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->indicate_additive_functionality }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate type fo vegetable oil or fat used(**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->vegetable_oil_fat_used }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    indicate if there are trans fats of hydrogenated origin
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->trans_fats_hydrogenated_origin }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To Indicate names of spices and herbs used (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->spices_herbs_used }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate quantity of sweetener per 100 grams or ml of CYCLAMAT, ASPARTAME, SUCRALOSE, ACESULFAM K, SACHARINE, STEVIA, ALITAME ( mg) (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->quantity_sweetener_per_100_gr_ml }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate if flavourings or aroma used are natural or artificial (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->flavourings_aroma_natural_artificial }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate quantity of xilitol, maltitol, sorbitol, glicerol (g/100g) (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->quantity_x_m_s_g }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled> </textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    To indicate quantity of caffeine (mg/100g) used (**)
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <input type="text" class="form-control" disabled value="{{ $item->quantity_caffeine }}">
                                                                                                                </td>
                                                                                                                <td>
                                                                                                                    <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    If there's any extract used, to indicate function, chemical process and name of the component extracted (**)
                                                                                                                </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->any_extract_used }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled> </textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate origin of gelatin used   ( Pork or Bovine) (**)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->origin_gelatin }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled> </textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate  ° Brix of the final product (customs requirement)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->brix_final_product }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled> </textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate  ° Brix of the final product without added sugar(**)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->brix_final_product_without_added_sugar }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled </textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate ° Brix of the fruit that is in greater proportion in the drink(**)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->brix_fruit_greater_proportion_drink }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled> </textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate names of colourings used (**)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->names_colourings }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled> </textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate minimum % of cocoa solids used (**)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->minimum_porcent_cocoa_solids }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        To indicate the % of cocoa butter  from recipe and as part of cocoa mass (**)
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <input type="text" class="form-control" disabled value="{{ $item->porcent_cocoa_butter_cocoa_mass }}">
                                                                                                                    </td>
                                                                                                                    <td>
                                                                                                                        <textarea rows="2" class="form-control" placeholder="Observaciones" style="resize: none" disabled ></textarea>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div id="test-l-4" class="content">
                                            @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card shadow mb-4">
                                                                                <a href="#collapseCardProductoVInitial_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                    role="button" aria-expanded="true" aria-controls="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <h6 class="m-0 font-weight-bold text-primary">Versión {{$producto->version}}</h6>
                                                                                </a>
                                                                                <div class="collapse" id="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">2.- Allergen Information</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Does this item or its process line contain potential allergens?:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="contain_potential_allergens[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->contain_potential_allergens == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->contain_potential_allergens == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">List potential allergens:</label>
                                                                                                    <div class="col-sm-12">
                                                                                                       <textarea class="form-control" rows="3" name="list_contain_potential_allergens[{{ $producto->id }}]">{{ $producto->list_contain_potential_allergens }}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Cereals with gluten:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="cereals_gluten[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->cereals_gluten == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->cereals_gluten == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Crustacean and products:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="crustacean_products[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->crustacean_products == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->crustacean_products == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Egg and derivatives:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="egg_derivatives[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->egg_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->egg_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Fish and derivatives:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="fish_derivatives[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->fish_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->fish_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Peanuts, Soy  and derivatives:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="peanuts_soy_derivatives[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->peanuts_soy_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->peanuts_soy_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">milk and dairy derivatives:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="milk_dairy_derivatives[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->milk_dairy_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->milk_dairy_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Nuts and derivatives:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="nuts_derivatives[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->nuts_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->nuts_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Sulfites And derivatives (concentrations of more than 10mg):</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="sulfites_derivatives[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->sulfites_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->sulfites_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        {{--
                                                                                            CERTIFICACIONES AGREGAR EN CERTIFICACIONES 
                                                                                            <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">3.- Certificates</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">*Health certificate</label>
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Do you have health certificate to export to Chile?:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="health_certificate[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->health_certificate == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->health_certificate == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="custom-file">
                                                                                                            <input type="file" class="custom-file-input" name="health_certificate_file[{{ $producto->id }}]">
                                                                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                          </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold text-black">*Organic certification</label>
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Do you have Organic certification (Master, description and transaction)?:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="organic_certification[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->organic_certification == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->organic_certification == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="custom-file">
                                                                                                            <input type="file" class="custom-file-input" name="organic_certification_file[{{ $producto->id }}]">
                                                                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                          </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold text-black">*Certification Free of AFP (American Foulbrood Bee (loque Americana))</label>
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Does the product contain Honey?:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="certification_free_afp[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->certification_free_afp == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->certification_free_afp == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="custom-file">
                                                                                                            <input type="file" class="custom-file-input" name="free_afp_file[{{ $producto->id }}]">
                                                                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                          </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">4.- Thermograph</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">For shipments with frozen and refrigerated foods, the use of thermograph it's mandatory?:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="thermograph[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->thermograph == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->thermograph == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">5.- Genetically modified ingredient information</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Does this item contain GMO Ingredients ?:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="gmo_information[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->gmo_information == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                            <option {{ ($producto->gmo_information == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">List GMO Ingredients:</label>
                                                                                                    <div class="col-sm-12">
                                                                                                       <textarea class="form-control" rows="3" name="list_gmo_information[{{ $producto->id }}]">{{ $producto->list_gmo_information }}</textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        @foreach ($producto->versiones as $item)
                                                                            <div class="col-md-12">
                                                                                <div class="card shadow mb-4">
                                                                                    <a href="#collapseCardProductoV_4_{{$item->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                        role="button" aria-expanded="true" aria-controls="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <h6 class="m-0 font-weight-bold text-primary">Versión {{$item->version}}</h6>
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">2.- Allergen Information</h6>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Does this item or its process line contain potential allergens?:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->contain_potential_allergens == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->contain_potential_allergens == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-12 col-form-label font-weight-bold">List potential allergens:</label>
                                                                                                        <div class="col-sm-12">
                                                                                                        <textarea class="form-control" rows="3" disabled>{{ $item->list_contain_potential_allergens }}</textarea>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Cereals with gluten:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->cereals_gluten == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->cereals_gluten == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Crustacean and products:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->crustacean_products == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->crustacean_products == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Egg and derivatives:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->egg_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->egg_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Fish and derivatives:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->fish_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->fish_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Peanuts, Soy  and derivatives:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->peanuts_soy_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->peanuts_soy_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">milk and dairy derivatives:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->milk_dairy_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->milk_dairy_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Nuts and derivatives:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->nuts_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->nuts_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Sulfites And derivatives (concentrations of more than 10mg):</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->sulfites_derivatives == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                                                <option {{ ($item->sulfites_derivatives == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div id="test-l-5" class="content">
                                            @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card shadow mb-4">
                                                                                <a href="#collapseCardProductoVInitial_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                    role="button" aria-expanded="true" aria-controls="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <h6 class="m-0 font-weight-bold text-primary">Versión {{$producto->version}}</h6>
                                                                                </a>
                                                                                <div class="collapse" id="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">6.- Microbiological Limits</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <label class="font-weight-bold">For all products attach laboratory analysis and complete microbiological limits (ufc)</label>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Total Plate Count:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="total_plate_count[{{ $producto->id }}]" value="{{ $producto->total_plate_count }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="total_plate_count_obs[{{ $producto->id }}]">{{ $producto->obs->total_plate_count }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Coliform:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="coliform[{{ $producto->id }}]" value="{{ $producto->coliform }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="coliform_obs[{{ $producto->id }}]">{{ $producto->obs->coliform }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    E. Coli:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="e_coli[{{ $producto->id }}]" value="{{ $producto->e_coli }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="e_coli_obs[{{ $producto->id }}]">{{ $producto->obs->e_coli }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    E. Coli in 100ml:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="e_coli_100[{{ $producto->id }}]" value="{{ $producto->e_coli_100 }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="e_coli_100_obs[{{ $producto->id }}]">{{ $producto->obs->e_coli_100 }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    E. Coli 0157 H7:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="e_coli_0157_h7[{{ $producto->id }}]" value="{{ $producto->e_coli_0157_h7 }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="e_coli_0157_h7_obs[{{ $producto->id }}]">{{ $producto->obs->e_coli_0157_h7 }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Campylobacter:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="campylobacter[{{ $producto->id }}]" value="{{ $producto->campylobacter }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="campylobacter_obs[{{ $producto->id }}]">{{ $producto->obs->campylobacter }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Bacillus cereus:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="bacillus_cereus[{{ $producto->id }}]" value="{{ $producto->bacillus_cereus }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="bacillus_cereus_obs[{{ $producto->id }}]">{{ $producto->obs->bacillus_cereus }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Staphylococcus:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="staphylococcus[{{ $producto->id }}]" value="{{ $producto->staphylococcus }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="staphylococcus_obs[{{ $producto->id }}]">{{ $producto->obs->staphylococcus }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Clostridium perfringens:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="clostridium_perfringens[{{ $producto->id }}]" value="{{ $producto->clostridium_perfringens }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="clostridium_perfringens_obs[{{ $producto->id }}]">{{ $producto->obs->clostridium_perfringens }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Listeria Monocytogenes:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="listeria_monocytogenes[{{ $producto->id }}]" value="{{ $producto->listeria_monocytogenes }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="listeria_monocytogenes_obs[{{ $producto->id }}]">{{ $producto->obs->listeria_monocytogenes }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Enterobacteria:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="enterobacteria[{{ $producto->id }}]" value="{{ $producto->enterobacteria }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="enterobacteria_obs[{{ $producto->id }}]">{{ $producto->obs->enterobacteria }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Mold:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="mold[{{ $producto->id }}]" value="{{ $producto->mold }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="mold_obs[{{ $producto->id }}]">{{ $producto->obs->mold }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Yeast:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="yeast[{{ $producto->id }}]" value="{{ $producto->yeast }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="yeast_obs[{{ $producto->id }}]">{{ $producto->obs->yeast }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Mold count:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="mold_count[{{ $producto->id }}]" value="{{ $producto->mold_count }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="mold_count_obs[{{ $producto->id }}]">{{ $producto->obs->mold_count }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Yeast count:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="yeast_count[{{ $producto->id }}]" value="{{ $producto->yeast_count }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="yeast_count_obs[{{ $producto->id }}]">{{ $producto->obs->yeast_count }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Salmonella:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="salmonella_25[{{ $producto->id }}]" value="{{ $producto->salmonella_25 }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="salmonella_25_obs[{{ $producto->id }}]">{{ $producto->obs->salmonella_25 }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Salmonella:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="salmonella_50[{{ $producto->id }}]" value="{{ $producto->salmonella_50 }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="salmonella_50_obs[{{ $producto->id }}]">{{ $producto->obs->salmonella_50 }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Lactobacillus:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="lactobacillus[{{ $producto->id }}]" value="{{ $producto->lactobacillus }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="lactobacillus_obs[{{ $producto->id }}]">{{ $producto->obs->lactobacillus }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    aerobic and anaerobic mesophilic microorganisms:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="aerobic_anaerobic_mesophilic_microorganisms[{{ $producto->id }}]" value="{{ $producto->aerobic_anaerobic_mesophilic_microorganisms }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="aerobic_anaerobic_mesophilic_microorganisms_obs[{{ $producto->id }}]">{{ $producto->obs->aerobic_anaerobic_mesophilic_microorganisms }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Aerobic and anaerobic thermophilic microorganisms:
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="aerobic_anaerobic_thermophilic_microorganisms[{{ $producto->id }}]" value="{{ $producto->aerobic_anaerobic_thermophilic_microorganisms }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="aerobic_anaerobic_thermophilic_microorganisms_obs[{{ $producto->id }}]">{{ $producto->obs->aerobic_anaerobic_thermophilic_microorganisms }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Thermophilic(commercial sterility):
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="thermophilic_commercial_sterility[{{ $producto->id }}]" value="{{ $producto->thermophilic_commercial_sterility }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="thermophilic_commercial_sterility_obs[{{ $producto->id }}]">{{ $producto->obs->thermophilic_commercial_sterility }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Thermophilic(commercial sterility):
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="anaerobic_spores_reducing_sulfites[{{ $producto->id }}]" value="{{ $producto->anaerobic_spores_reducing_sulfites }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="anaerobic_spores_reducing_sulfites_obs[{{ $producto->id }}]">{{ $producto->obs->anaerobic_spores_reducing_sulfites }}</textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    Thermophilic(commercial sterility):
                                                                                                                </td>
                                                                                                                <td><input type="text" class="form-control" name="cronobacter_10g[{{ $producto->id }}]" value="{{ $producto->cronobacter_10g }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="cronobacter_10g_obs[{{ $producto->id }}]">{{ $producto->obs->cronobacter_10g }}</textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </thead>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">7.- Chemical Values</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>pH:</td>
                                                                                                                <td><input type="text" class="form-control" name="ph[{{ $producto->id }}]" value="{{ $producto->ph }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="ph_obs[{{ $producto->id }}]"></textarea>{{ $producto->obs->ph }}</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>aw (Water Activity) %:</td>
                                                                                                                <td><input type="text" class="form-control" name="porcent_aw[{{ $producto->id }}]" value="{{ $producto->porcent_aw }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" name="porcent_aw_obs[{{ $producto->id }}]">{{ $producto->obs->porcent_aw }}</textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </thead>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">8.- Packaging</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Type of primary packaging used:</td>
                                                                                                            <td><input type="text" class="form-control" name="type_primary_packaging[{{ $producto->id }}]" value="{{ $producto->type_primary_packaging }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" placeholder="Observaciones" name="type_primary_packaging_obs[{{ $producto->id }}]">{{ $producto->obs->type_primary_packaging }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Type of secundary packaging used:</td>
                                                                                                            <td><input type="text" class="form-control" name="type_secundary_packaging[{{ $producto->id }}]" value="{{ $producto->type_secundary_packaging }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" placeholder="Observaciones" name="type_secundary_packaging_obs[{{ $producto->id }}]">{{ $producto->obs->type_secundary_packaging }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Indicate type of controls used in sealing or air tightness of primary packaging:</td>
                                                                                                            <td><input type="text" class="form-control" name="type_controls_sealing_air_tightness_primary_packaging[{{ $producto->id }}]" value="{{ $producto->type_controls_sealing_air_tightness_primary_packaging }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" placeholder="Observaciones" name="type_controls_sealing_air_tightness_primary_packaging_obs[{{ $producto->id }}]">{{ $producto->obs->type_controls_sealing_air_tightness_primary_packaging }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @foreach ($producto->versiones as $item)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card shadow mb-4">
                                                                                    <a href="#collapseCardProductoV_4_{{$item->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                        role="button" aria-expanded="true" aria-controls="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <h6 class="m-0 font-weight-bold text-primary">Versión {{$item->version}}</h6>
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">6.- Microbiological Limits</h6>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <label class="font-weight-bold">For all products attach laboratory analysis and complete microbiological limits (ufc)</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Total Plate Count:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->total_plate_count }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Coliform:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->coliform }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        E. Coli:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->e_coli }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        E. Coli in 100ml:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->e_coli_100 }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        E. Coli 0157 H7:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->e_coli_0157_h7 }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Campylobacter:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->campylobacter }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Bacillus cereus:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->bacillus_cereus }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Staphylococcus:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->staphylococcus }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control"></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Clostridium perfringens:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->clostridium_perfringens }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Listeria Monocytogenes:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->listeria_monocytogenes }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Enterobacteria:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->enterobacteria }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Mold:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->mold }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Yeast:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->yeast }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Mold count:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->mold_count }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Yeast count:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->yeast_count }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Salmonella:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->salmonella_25 }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Salmonella:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->salmonella_50 }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Lactobacillus:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->lactobacillus }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        aerobic and anaerobic mesophilic microorganisms:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->aerobic_anaerobic_mesophilic_microorganisms }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Aerobic and anaerobic thermophilic microorganisms:
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->aerobic_anaerobic_thermophilic_microorganisms }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Thermophilic(commercial sterility):
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->thermophilic_commercial_sterility }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Thermophilic(commercial sterility):
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->anaerobic_spores_reducing_sulfites }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>
                                                                                                                        Thermophilic(commercial sterility):
                                                                                                                    </td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->cronobacter_10g }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </thead>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">7.- Chemical Values</h6>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td>pH:</td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->ph }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled ></textarea></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td>aw (Water Activity) %:</td>
                                                                                                                    <td><input type="text" class="form-control" disabled value="{{ $item->porcent_aw }}"></td>
                                                                                                                    <td><textarea rows="2" class="form-control" disabled></textarea></td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </thead>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">8.- Packaging</h6>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>Type of primary packaging used:</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->type_primary_packaging }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" placeholder="Observaciones" disabled></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Type of secundary packaging used:</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->type_secundary_packaging }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" placeholder="Observaciones" disabled></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Indicate type of controls used in sealing or air tightness of primary packaging:</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->type_controls_sealing_air_tightness_primary_packaging }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" placeholder="Observaciones" disabled></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    @endhasanyrole
                                    <div id="test-l-6" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card shadow mb-4">
                                                                                <a href="#collapseCardProductoVInitial_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                    role="button" aria-expanded="true" aria-controls="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <h6 class="m-0 font-weight-bold text-primary">Versión {{$producto->version}}</h6>
                                                                                </a>
                                                                                <div class="collapse" id="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">9.- Nutritional information</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">Tipo de producto:</label>
                                                                                                    <div class="col-sm-4">
                                                                                                        <select class="form-control form-control-sm" name="product_type[{{ $producto->id }}]">
                                                                                                            <option value="">Seleccione</option>
                                                                                                            <option {{ ($producto->product_type == 'ml') ? 'selected' : ''; }} value="ml">Liquido</option>
                                                                                                            <option {{ ($producto->product_type == 'gr') ? 'selected' : ''; }} value="gr">Solido</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th colspan="4">Nutritional Facts</th>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Serving Size:</td>
                                                                                                            <td colspan="3"><input type="text" class="form-control" name="serving_size[{{ $producto->id }}]" value="{{ $producto->serving_size }}"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Servings per Container:</td>
                                                                                                            <td colspan="3"><input type="text" class="form-control" name="servings_per_container[{{ $producto->id }}]" value="{{ $producto->servings_per_container }}"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="30%">100 g/ml</th>
                                                                                                            <th width="30%">1 serving</th>
                                                                                                            <th width="20%">Observación</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Energy ( kcal)</td>
                                                                                                            <td><input type="text" class="form-control" name="energy_100[{{ $producto->id }}]" value="{{ $producto->energy_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="energy_serving[{{ $producto->id }}]" value="{{ $producto->energy_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="energy_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->energy }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Proteins (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="proteins_100[{{ $producto->id }}]" value="{{ $producto->proteins_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="proteins_serving[{{ $producto->id }}]" value="{{ $producto->proteins_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="proteins_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->proteins }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_fat_100[{{ $producto->id }}]" value="{{ $producto->total_fat_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_fat_serving[{{ $producto->id }}]" value="{{ $producto->total_fat_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_fat_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Satured fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="satured_fat_100[{{ $producto->id }}]" value="{{ $producto->satured_fat_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="satured_fat_serving[{{ $producto->id }}]" value="{{ $producto->satured_fat_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="satured_fat_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->satured_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Trans fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="trans_fat_100[{{ $producto->id }}]" value="{{ $producto->trans_fat_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="trans_fat_serving[{{ $producto->id }}]" value="{{ $producto->trans_fat_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="trans_fat_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->trans_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Monosatured fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="monosatured_fat_100[{{ $producto->id }}]" value="{{ $producto->monosatured_fat_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="monosatured_fat_serving[{{ $producto->id }}]" value="{{ $producto->monosatured_fat_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="monosatured_fat_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->monosatured_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Polyunsatured fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="polyunsatured_fat_100[{{ $producto->id }}]" value="{{ $producto->polyunsatured_fat_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="polyunsatured_fat_serving[{{ $producto->id }}]" value="{{ $producto->polyunsatured_fat_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="polyunsatured_fat_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->polyunsatured_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Cholesterol (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="cholesterol_100[{{ $producto->id }}]" value="{{ $producto->cholesterol_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="cholesterol_serving[{{ $producto->id }}]" value="{{ $producto->cholesterol_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="cholesterol_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->cholesterol }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total Carbohydrate (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_carbohydrate_100[{{ $producto->id }}]" value="{{ $producto->total_carbohydrate_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_carbohydrate_serving[{{ $producto->id }}]" value="{{ $producto->total_carbohydrate_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_carbohydrate_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_carbohydrate }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Available carbohydrates(g)</td>
                                                                                                            <td><input type="text" class="form-control" name="available_carbohydrates_100[{{ $producto->id }}]" value="{{ $producto->available_carbohydrates_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="available_carbohydrates_serving[{{ $producto->id }}]" value="{{ $producto->available_carbohydrates_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="available_carbohydrates_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->available_carbohydrates }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total Sugars (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_sugars_100[{{ $producto->id }}]" value="{{ $producto->total_sugars_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_sugars_serving[{{ $producto->id }}]" value="{{ $producto->total_sugars_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_sugars_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_sugars }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Sucrose (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="sucrose_100[{{ $producto->id }}]" value="{{ $producto->sucrose_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="sucrose_serving[{{ $producto->id }}]" value="{{ $producto->sucrose_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="sucrose_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->sucrose }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Lactose(g)</td>
                                                                                                            <td><input type="text" class="form-control" name="lactos_100[{{ $producto->id }}]" value="{{ $producto->lactos_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="lactos_serving[{{ $producto->id }}]" value="{{ $producto->lactos_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="lactos_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->lactos }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Poliols (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="poliols_100[{{ $producto->id }}]" value="{{ $producto->poliols_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="poliols_serving[{{ $producto->id }}]" value="{{ $producto->poliols_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="poliols_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->poliols }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total Dietary fiber (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_dietary_fiber_100[{{ $producto->id }}]" value="{{ $producto->total_dietary_fiber_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_dietary_fiber_serving[{{ $producto->id }}]" value="{{ $producto->total_dietary_fiber_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_dietary_fiber_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_dietary_fiber }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Soluble fiber (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="soluble_fiber_100[{{ $producto->id }}]" value="{{ $producto->soluble_fiber_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="soluble_fiber_serving[{{ $producto->id }}]" value="{{ $producto->soluble_fiber_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="soluble_fiber_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->soluble_fiber }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Insoluble fiber (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="insoluble_fiber_100[{{ $producto->id }}]" value="{{ $producto->insoluble_fiber_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="insoluble_fiber_serving[{{ $producto->id }}]" value="{{ $producto->insoluble_fiber_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="insoluble_fiber_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->insoluble_fiber }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Sodium (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="sodium_100[{{ $producto->id }}]" value="{{ $producto->sodium_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="sodium_serving[{{ $producto->id }}]" value="{{ $producto->sodium_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="sodium_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->sodium }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th colspan="5">Nutritional Facts RECONSTITUTED</th>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Serving Size:</td>
                                                                                                            <td colspan="4"><input type="text" class="form-control" name="serving_size_reconstitued[{{ $producto->id }}]" value="{{ $producto->serving_size }}"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Servings per Container:</td>
                                                                                                            <td colspan="4"><input type="text" class="form-control" name="servings_per_container_reconstitued[{{ $producto->id }}]" value="{{ $producto->servings_per_container }}"></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="20%">100 g/ml</th>
                                                                                                            <th width="20%">100g or ml reconstituted</th>
                                                                                                            <th width="20%"> 1 serving reconstituted</th>
                                                                                                            <th width="20%">Observación</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Energy ( kcal)</td>
                                                                                                            <td><input type="text" class="form-control" name="energy_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->energy_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="energy_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->energy_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="energy_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->energy_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="energy_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->energy_reconstitued }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Proteins (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="proteins_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->proteins_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="proteins_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->proteins_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="proteins_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->proteins_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="proteins_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->proteins }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_fat_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_fat_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_fat_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_fat_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_fat_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->total_fat_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_fat_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Satured fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="satured_fat_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->satured_fat_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="satured_fat_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->satured_fat_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="satured_fat_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->satured_fat_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="satured_fat_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->satured_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Trans fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="trans_fat_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->trans_fat_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="trans_fat_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->trans_fat_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="trans_fat_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->trans_fat_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="trans_fat_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->trans_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Monosatured fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="monosatured_fat_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->monosatured_fat_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="monosatured_fat_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->monosatured_fat_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="monosatured_fat_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->monosatured_fat_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="monosatured_fat_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->monosatured_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Polyunsatured fat (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="polyunsatured_fat_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->polyunsatured_fat_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="polyunsatured_fat_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->polyunsatured_fat_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="polyunsatured_fat_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->polyunsatured_fat_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="polyunsatured_fat_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->polyunsatured_fat }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Cholesterol (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="cholesterol_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->cholesterol_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="cholesterol_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->cholesterol_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="cholesterol_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->cholesterol_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="cholesterol_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->cholesterol }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total Carbohydrate (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_carbohydrate_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_carbohydrate_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_carbohydrate_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_carbohydrate_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_carbohydrate_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->total_carbohydrate_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_carbohydrate_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_carbohydrate }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Available carbohydrates(g)</td>
                                                                                                            <td><input type="text" class="form-control" name="available_carbohydrates_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->available_carbohydrates_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="available_carbohydrates_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->available_carbohydrates_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="available_carbohydrates_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->available_carbohydrates_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="available_carbohydrates_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->available_carbohydrates }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total Sugars (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_sugars_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_sugars_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_sugars_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_sugars_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_sugars_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->total_sugars_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_sugars_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_sugars }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Sucrose (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="sucrose_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->sucrose_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="sucrose_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->sucrose_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="sucrose_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->sucrose_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="sucrose_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->sucrose }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Lactose(g)</td>
                                                                                                            <td><input type="text" class="form-control" name="lactos_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->lactos_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="lactos_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->lactos_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="lactos_serving_reconstitued_r[{{ $producto->id }}]" value="{{  $producto->lactos_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="lactos_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->lactos }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Poliols (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="poliols_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->poliols_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="poliols_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->poliols_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="poliols_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->poliols_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="poliols_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->poliols }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Total Dietary fiber (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_dietary_fiber_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_dietary_fiber_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_dietary_fiber_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->total_dietary_fiber_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="total_dietary_fiber_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->total_dietary_fiber_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="total_dietary_fiber_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->total_dietary_fiber }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Soluble fiber (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="soluble_fiber_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->soluble_fiber_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="soluble_fiber_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->soluble_fiber_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="soluble_fiber_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->soluble_fiber_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="soluble_fiber_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->soluble_fiber }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Insoluble fiber (g)</td>
                                                                                                            <td><input type="text" class="form-control" name="insoluble_fiber_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->insoluble_fiber_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="insoluble_fiber_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->insoluble_fiber_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="insoluble_fiber_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->insoluble_fiber_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="insoluble_fiber_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->insoluble_fiber }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Sodium (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="sodium_100_reconstitued[{{ $producto->id }}]" value="{{ $producto->sodium_100_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="sodium_serving_reconstitued[{{ $producto->id }}]" value="{{ $producto->sodium_serving_reconstitued }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="sodium_serving_reconstitued_r[{{ $producto->id }}]" value="{{ $producto->sodium_serving_reconstitued_r }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="sodium_obs_reconstitued[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->sodium }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                    
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">10.- Vitaminas and Mineral</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th width="25%">Vitamins</th>
                                                                                                            <th width="25%">100 g/ml</th>
                                                                                                            <th width="25%">1 serving</th>
                                                                                                            <th width="25%">Observaciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Vitamin A (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_a_100[{{ $producto->id }}]" value="{{ $producto->vitamin_a_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_a_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_a_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_a_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_a }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin C ( mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_c_100[{{ $producto->id }}]" value="{{ $producto->vitamin_c_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_c_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_c_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_c_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_c }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin D (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_d_100[{{ $producto->id }}]" value="{{ $producto->vitamin_d_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_d_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_d_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_d_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_d }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin E (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_e_100[{{ $producto->id }}]" value="{{ $producto->vitamin_e_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_e_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_e_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_e_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_e }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin B1 ( mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b1_100[{{ $producto->id }}]" value="{{ $producto->vitamin_b1_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b1_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_b1_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_b1_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_b1 }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin B2 (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b2_100[{{ $producto->id }}]" value="{{ $producto->vitamin_b2_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b2_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_b2_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_b2_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_b2 }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Niacin ( mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="niacin_100[{{ $producto->id }}]" value="{{ $producto->niacin_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="niacin_serving[{{ $producto->id }}]" value="{{ $producto->niacin_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="niacin_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->niacin }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin B6 (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b6_100[{{ $producto->id }}]" value="{{ $producto->vitamin_b6_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b6_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_b6_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_b6_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_b6 }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Folic acid (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="folic_acid_100[{{ $producto->id }}]" value="{{ $producto->folic_acid_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="folic_acid_serving[{{ $producto->id }}]" value="{{ $producto->folic_acid_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="folic_acid_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->folic_acid }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin B12 (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b12_100[{{ $producto->id }}]" value="{{ $producto->vitamin_b12_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_b12_serving[{{ $producto->id }}]" value="{{ $producto->vitamin_b12_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_b12_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_b12 }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Pantothenic acid (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="pantothenic_acid_100[{{ $producto->id }}]" value="{{ $producto->pantothenic_acid_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="pantothenic_acid_serving[{{ $producto->id }}]" value="{{ $producto->pantothenic_acid_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="pantothenic_acid_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->pantothenic_acid }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Biotin (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="biotin_100[{{ $producto->id }}]" value="{{ $producto->biotin_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="biotin_serving[{{ $producto->id }}]" value="{{ $producto->biotin_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="biotin_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->biotin }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Choline (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="choline_100[{{ $producto->id }}]" value="{{ $producto->choline_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="choline_serving[{{ $producto->id }}]" value="{{ $producto->choline_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="choline_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->choline }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Vitamin K (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_k_100[{{ $producto->id }}]" value="{{ $producto->vitamin_k_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="vitamin_k_serving[{{ $producto->id }}]"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="vitamin_k_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->vitamin_k }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Betacarotene (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="betacarotene_100[{{ $producto->id }}]" value="{{ $producto->betacarotene_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="betacarotene_serving[{{ $producto->id }}]" value="{{ $producto->betacarotene_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="betacarotene_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->betacarotene }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th>Minerals</th>
                                                                                                            <th>100 g/ml</th>
                                                                                                            <th>1 serving</th>
                                                                                                            <th>Observaciones</th>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Calcium (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="calcium_100[{{ $producto->id }}]" value="{{ $producto->calcium_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="calcium_serving[{{ $producto->id }}]" value="{{ $producto->calcium_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="calcium_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->calcium }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Chromium (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="chromium_100[{{ $producto->id }}]" value="{{ $producto->chromium_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="chromium_serving[{{ $producto->id }}]" value="{{ $producto->chromium_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="chromium_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->chromium }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Copper (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="copper_100[{{ $producto->id }}]" value="{{ $producto->copper_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="copper_serving[{{ $producto->id }}]" value="{{ $producto->copper_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="copper_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->copper }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Yodo (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="yodo_100[{{ $producto->id }}]" value="{{ $producto->yodo_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="yodo_serving[{{ $producto->id }}]" value="{{ $producto->yodo_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="yodo_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->yodo }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Iron ( mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="iron_100[{{ $producto->id }}]" value="{{ $producto->iron_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="iron_serving[{{ $producto->id }}]" value="{{ $producto->iron_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="iron_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->iron }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Magnesium (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="magnesium_100[{{ $producto->id }}]" value="{{ $producto->magnesium_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="magnesium_serving[{{ $producto->id }}]" value="{{ $producto->magnesium_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="magnesium_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->magnesium }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Manganese ( mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="manganese_100[{{ $producto->id }}]" value="{{ $producto->manganese_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="manganese_serving[{{ $producto->id }}]" value="{{ $producto->manganese_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="manganese_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->manganese }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Molybdenum ( ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="molybdenum_100[{{ $producto->id }}]" value="{{ $producto->molybdenum_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="molybdenum_serving[{{ $producto->id }}]" value="{{ $producto->molybdenum_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="molybdenum_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->molybdenum }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Phosphorus (mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="phosphorus_100[{{ $producto->id }}]" value="{{ $producto->phosphorus_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="phosphorus_serving[{{ $producto->id }}]" value="{{ $producto->phosphorus_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="phosphorus_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->phosphorus }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Zinc ( mg)</td>
                                                                                                            <td><input type="text" class="form-control" name="zinc_100[{{ $producto->id }}]" value="{{ $producto->zinc_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="zinc_serving[{{ $producto->id }}]" value="{{ $producto->zinc_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="zinc_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->zinc }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Selenium (ug)</td>
                                                                                                            <td><input type="text" class="form-control" name="selenium_100[{{ $producto->id }}]" value="{{ $producto->selenium_100 }}"></td>
                                                                                                            <td><input type="text" class="form-control" name="selenium_serving[{{ $producto->id }}]" value="{{ $producto->selenium_serving }}"></td>
                                                                                                            <td><textarea rows="3" class="form-control" name="selenium_obs[{{ $producto->id }}]" placeholder="Observaciones">{{ $producto->obs->selenium }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @foreach ($producto->versiones as $item)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card shadow mb-4">
                                                                                    <a href="#collapseCardProductoV_4_{{$item->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                        role="button" aria-expanded="true" aria-controls="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <h6 class="m-0 font-weight-bold text-primary">Versión {{$item->version}}</h6>
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">9.- Nutritional information</h6>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-4 col-form-label font-weight-bold">Tipo de producto:</label>
                                                                                                        <div class="col-sm-4">
                                                                                                            <select class="form-control form-control-sm" disabled>
                                                                                                                <option value="">Seleccione</option>
                                                                                                                <option {{ ($item->product_type == 'ml') ? 'selected' : ''; }} value="ml">Liquido</option>
                                                                                                                <option {{ ($item->product_type == 'gr') ? 'selected' : ''; }} value="gr">Solido</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th colspan="4">Nutritional Facts</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Serving Size:</td>
                                                                                                                <td colspan="3"><input type="text" class="form-control" disabled value="{{ $item->serving_size }}"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Servings per Container:</td>
                                                                                                                <td colspan="3"><input type="text" class="form-control" disabled value="{{ $item->servings_per_container }}"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="30%">100 g/ml</th>
                                                                                                                <th width="30%">1 serving</th>
                                                                                                                <th width="20%">Observación</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>Energy ( kcal)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->energy_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->energy_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Proteins (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->proteins_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->proteins_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_fat_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_fat_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Satured fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->satured_fat_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->satured_fat_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Trans fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->trans_fat_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->trans_fat_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Monosatured fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->monosatured_fat_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->monosatured_fat_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Polyunsatured fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->polyunsatured_fat_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->polyunsatured_fat_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Cholesterol (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cholesterol_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cholesterol_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total Carbohydrate (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_carbohydrate_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_carbohydrate_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Available carbohydrates(g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->available_carbohydrates_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->available_carbohydrates_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total Sugars (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_sugars_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_sugars_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Sucrose (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sucrose_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sucrose_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Lactose(g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->lactos_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->lactos_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Poliols (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->poliols_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->poliols_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total Dietary fiber (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_dietary_fiber_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_dietary_fiber_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Soluble fiber (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->soluble_fiber_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->soluble_fiber_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Insoluble fiber (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->insoluble_fiber_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->insoluble_fiber_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Sodium (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sodium_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sodium_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th colspan="5">Nutritional Facts RECONSTITUTED</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Serving Size:</td>
                                                                                                                <td colspan="4"><input type="text" class="form-control" disabled value="{{ $item->serving_size }}"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Servings per Container:</td>
                                                                                                                <td colspan="4"><input type="text" class="form-control" disabled value="{{ $item->servings_per_container }}"></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="20%">100 g/ml</th>
                                                                                                                <th width="20%">100g or ml reconstituted</th>
                                                                                                                <th width="20%"> 1 serving reconstituted</th>
                                                                                                                <th width="20%">Observación</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>Energy ( kcal)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->energy_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->energy_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->energy_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Proteins (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->proteins_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->proteins_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->proteins_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_fat_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_fat_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_fat_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Satured fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->satured_fat_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->satured_fat_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->satured_fat_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Trans fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->trans_fat_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->trans_fat_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->trans_fat_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Monosatured fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->monosatured_fat_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->monosatured_fat_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->monosatured_fat_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Polyunsatured fat (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->polyunsatured_fat_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->polyunsatured_fat_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->polyunsatured_fat_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Cholesterol (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cholesterol_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cholesterol_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cholesterol_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total Carbohydrate (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_carbohydrate_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_carbohydrate_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_carbohydrate_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Available carbohydrates(g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->available_carbohydrates_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->available_carbohydrates_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->available_carbohydrates_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total Sugars (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_sugars_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_sugars_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_sugars_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Sucrose (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sucrose_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sucrose_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sucrose_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Lactose(g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->lactos_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->lactos_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{  $item->lactos_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Poliols (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->poliols_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->poliols_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->poliols_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Total Dietary fiber (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_dietary_fiber_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_dietary_fiber_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_dietary_fiber_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Soluble fiber (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->soluble_fiber_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->soluble_fiber_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->soluble_fiber_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Insoluble fiber (g)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->insoluble_fiber_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->insoluble_fiber_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->insoluble_fiber_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Sodium (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sodium_100_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sodium_serving_reconstitued }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sodium_serving_reconstitued_r }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                        
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">10.- Vitaminas and Mineral</h6>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th width="25%">Vitamins</th>
                                                                                                                <th width="25%">100 g/ml</th>
                                                                                                                <th width="25%">1 serving</th>
                                                                                                                <th width="25%">Observaciones</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>Vitamin A (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_a_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_a_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin C ( mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_c_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_c_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin D (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_d_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_d_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin E (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_e_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_e_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin B1 ( mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b1_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b1_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin B2 (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b2_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b2_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Niacin ( mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->niacin_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->niacin_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin B6 (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b6_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b6_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Folic acid (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->folic_acid_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->folic_acid_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin B12 (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b12_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_b12_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Pantothenic acid (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->pantothenic_acid_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->pantothenic_acid_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Biotin (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->biotin_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->biotin_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Choline (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->choline_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->choline_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Vitamin K (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->vitamin_k_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabledtd>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Betacarotene (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->betacarotene_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->betacarotene_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th>Minerals</th>
                                                                                                                <th>100 g/ml</th>
                                                                                                                <th>1 serving</th>
                                                                                                                <th>Observaciones</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Calcium (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->calcium_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->calcium_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Chromium (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->chromium_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->chromium_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Copper (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->copper_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->copper_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Yodo (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->yodo_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->yodo_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Iron ( mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->iron_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->iron_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Magnesium (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->magnesium_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->magnesium_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Manganese ( mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->manganese_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->manganese_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Molybdenum ( ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->molybdenum_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->molybdenum_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Phosphorus (mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->phosphorus_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->phosphorus_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Zinc ( mg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->zinc_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->zinc_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Selenium (ug)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->selenium_100 }}"></td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->selenium_serving }}"></td>
                                                                                                                <td><textarea rows="3" class="form-control" disabled placeholder="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="test-l-7" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card shadow mb-4">
                                                                                <a href="#collapseCardProductoVInitial_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                    role="button" aria-expanded="true" aria-controls="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <h6 class="m-0 font-weight-bold text-primary">Versión {{$producto->version}}</h6>
                                                                                </a>
                                                                                <div class="collapse" id="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">12.-Multiresidue Statement</h6>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Mycotoxin</th>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Total Aflatoxins  (B1, B2, G1, G2)(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="total_aflatoxins[{{ $producto->id }}]" value="{{ $producto->total_aflatoxins }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="total_aflatoxins_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->total_aflatoxins }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Aflatoxina M1(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="aflatoxina_m1[{{ $producto->id }}]" value="{{ $producto->aflatoxina_m1 }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="aflatoxina_m1_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->aflatoxina_m1 }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Zearalenone(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="zearalenone[{{ $producto->id }}]" value="{{ $producto->zearalenone }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="zearalenone_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->zearalenone }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Patulin(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="patulin[{{ $producto->id }}]" value="{{ $producto->patulin }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="patulin_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->patulin }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Ochratoxin(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="ochratoxin[{{ $producto->id }}]" value="{{ $producto->ochratoxin }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="ochratoxin_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->ochratoxin }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Deoxynivalenol(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="deoxynivalenol[{{ $producto->id }}]" value="{{ $producto->deoxynivalenol }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="deoxynivalenol_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->deoxynivalenol }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Fumomisinas(ppb)</td>
                                                                                                            <td><input type="text" class="form-control" name="fumonisinas[{{ $producto->id }}]" value="{{ $producto->fumonisinas }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="fumonisinas_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->fumonisinas }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Heavy Metals</th>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>Zn(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="zn[{{ $producto->id }}]" value="{{ $producto->zn }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="zn_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->zn }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Pb(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="pb[{{ $producto->id }}]" value="{{ $producto->pb }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="pb_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->pb }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Cd(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="cd[{{ $producto->id }}]" value="{{ $producto->cd }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="cd_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->cd }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Hg(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="hg[{{ $producto->id }}]" value="{{ $producto->hg }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="hg_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->hg }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Sn(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="sn[{{ $producto->id }}]" value="{{ $producto->sn }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="sn_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->sn }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Cu(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="cu[{{ $producto->id }}]" value="{{ $producto->cu }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="cu_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->cu }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Ars(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="ars[{{ $producto->id }}]" value="{{ $producto->ars }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="ars_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->ars }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Se(mg/kg final product)</td>
                                                                                                            <td><input type="text" class="form-control" name="se[{{ $producto->id }}]" value="{{ $producto->se }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="se_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->se }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Veterinary Drugs</th>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th width="20%">Campo</th>
                                                                                                            <th width="40%">Valor</th>
                                                                                                            <th width="40%">Observaciones</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>chloramphenicol(ug/kg)</td>
                                                                                                            <td><input type="text" class="form-control" name="chloramphenicol[{{ $producto->id }}]" value="{{ $producto->chloramphenicol }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="chloramphenicol_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->chloramphenicol }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>tetracycline(ug/kg)</td>
                                                                                                            <td><input type="text" class="form-control" name="tetracycline[{{ $producto->id }}]" value="{{ $producto->tetracycline }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="tetracycline_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->tetracycline }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>quinolones(ug/kg)</td>
                                                                                                            <td><input type="text" class="form-control" name="quinolones[{{ $producto->id }}]" value="{{ $producto->quinolones }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="quinolones_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->quinolones }}</textarea></td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>sulfonamides(ug/kg)</td>
                                                                                                            <td><input type="text" class="form-control" name="sulfonamides[{{ $producto->id }}]" value="{{ $producto->sulfonamides }}"></td>
                                                                                                            <td><textarea rows="2" class="form-control" name="sulfonamides_obs[{{ $producto->id }}]" placeholders="Observaciones">{{ $producto->obs->sulfonamides }}</textarea></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">Pesticides (mg/kg)</label>
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">Fresh fruits and vegetables, nuts, meat (pork, beef, sheep, poultry), milk, eggs, beans, oats, rice and wheat:</label>
                                                                                                    <div class="col-sm-12">
                                                                                                        <input type="text" class="form-control" name="pesticides[{{ $producto->id }}]" value="{{ $producto->pesticides }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">Dioxin / furan(pg EQT/OMS/g fat):</label>
                                                                                                    <div class="col-sm-12">
                                                                                                        <input type="text" class="form-control" name="dioxin_furan[{{ $producto->id }}]" value="{{ $producto->dioxin_furan }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-sm-12 col-form-label font-weight-bold">STEROIDS(ug/kg):</label>
                                                                                                    <div class="col-sm-12">
                                                                                                        <input type="text" class="form-control" name="steroids[{{ $producto->id }}]" value="{{ $producto->steroids }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @foreach ($producto->versiones as $item)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="card shadow mb-4">
                                                                                    <a href="#collapseCardProductoV_4_{{$item->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                        role="button" aria-expanded="true" aria-controls="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <h6 class="m-0 font-weight-bold text-primary">Versión {{$item->version}}</h6>
                                                                                    </a>
                                                                                    <div class="collapse" id="collapseCardProductoV_4_{{$item->id}}">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <h6 class="mb-2 font-weight-bold text-primary">12.-Multiresidue Statement</h6>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>Mycotoxin</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>Total Aflatoxins  (B1, B2, G1, G2)(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->total_aflatoxins }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Aflatoxina M1(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->aflatoxina_m1 }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Zearalenone(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->zearalenone }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Patulin(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->patulin }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Ochratoxin(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->ochratoxin }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Deoxynivalenol(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->deoxynivalenol }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Fumomisinas(ppb)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->fumonisinas }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>Heavy Metals</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>Zn(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->zn }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Pb(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->pb }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Cd(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cd }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Hg(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->hg }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Sn(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sn }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Cu(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->cu }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Ars(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->ars }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>Se(mg/kg final product)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->se }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                                                                                        <thead>
                                                                                                            <tr>
                                                                                                                <th>Veterinary Drugs</th>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <th width="20%">Campo</th>
                                                                                                                <th width="40%">Valor</th>
                                                                                                                <th width="40%">Observaciones</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td>chloramphenicol(ug/kg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->chloramphenicol }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>tetracycline(ug/kg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->tetracycline }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>quinolones(ug/kg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->quinolones }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>sulfonamides(ug/kg)</td>
                                                                                                                <td><input type="text" class="form-control" disabled value="{{ $item->sulfonamides }}"></td>
                                                                                                                <td><textarea rows="2" class="form-control" disabled placeholders="Observaciones"></textarea></td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-12 col-form-label font-weight-bold">Pesticides (mg/kg)</label>
                                                                                                        <label class="col-sm-12 col-form-label font-weight-bold">Fresh fruits and vegetables, nuts, meat (pork, beef, sheep, poultry), milk, eggs, beans, oats, rice and wheat:</label>
                                                                                                        <div class="col-sm-12">
                                                                                                            <input type="text" class="form-control" disabled value="{{ $item->pesticides }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-12 col-form-label font-weight-bold">Dioxin / furan(pg EQT/OMS/g fat):</label>
                                                                                                        <div class="col-sm-12">
                                                                                                            <input type="text" class="form-control" disabled value="{{ $item->dioxin_furan }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group row">
                                                                                                        <label class="col-sm-12 col-form-label font-weight-bold">STEROIDS(ug/kg):</label>
                                                                                                        <div class="col-sm-12">
                                                                                                            <input type="text" class="form-control" disabled value="{{ $item->steroids }}">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    {{-- 
                                                                        AGERGAR CERTIFIFCACIONES
                                                                        <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h6 class="mb-2 font-weight-bold text-primary">11.- HACCP ( Hazard Analysis and Critical Control Point) or Certifications</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-12 col-form-label font-weight-bold">Do you have HACCP?</label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control form-control-sm" name="haccp[{{ $producto->id }}]">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{ ($producto->haccp == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                        <option {{ ($producto->haccp == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="haccp_file[{{ $producto->id }}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-12 col-form-label font-weight-bold">Do you have other certifications?</label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control form-control-sm" name="others_certifications[{{ $producto->id }}]">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{ ($producto->others_certifications == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                        <option {{ ($producto->others_certifications == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="others_certifications_file[{{ $producto->id }}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="test-l-8" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card shadow mb-4">
                                                                                <a href="#collapseCardProductoVInitial_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                    role="button" aria-expanded="true" aria-controls="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <h6 class="m-0 font-weight-bold text-primary">Versión {{$producto->version}}</h6>
                                                                                </a>
                                                                                <div class="collapse" id="collapseCardProductoVInitial_4_{{$producto->id}}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">Certificaciones</h6>
                                                                                            </div>
                                                                                        </div>
                                                                                        @foreach ($certificaciones_fijas as $certificacion)
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <label for="" class="font-weight-bold">- {{$certificacion->nombre}}</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12 ml-3">
                                                                                                            <div class="form-group row">
                                                                                                                <label class="col-sm-4 col-form-label">Nombre Laboratorio:</label>
                                                                                                                <div class="col-sm-6">
                                                                                                                    <input type="text" class="form-control form-control-sm" name="nombre_laboratorio_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Nombre Laboratorio" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-12 ml-3">
                                                                                                            <div class="form-group row">
                                                                                                                <label class="col-sm-4 col-form-label">Número Certificado:</label>
                                                                                                                <div class="col-sm-6">
                                                                                                                    <input type="text" class="form-control form-control-sm" name="numero_certificado_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Número Certificado" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-12 ml-3">
                                                                                                            <div class="form-group row">
                                                                                                                <label class="col-sm-4 col-form-label">Fecha Análisis:</label>
                                                                                                                <div class="col-sm-6">
                                                                                                                    <input type="date" class="form-control form-control-sm" name="fecha_analisis_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Fecha Análisis" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-12 ml-3">
                                                                                                            <div class="form-group row">
                                                                                                                <label class="col-sm-4 col-form-label">Duración de validez:</label>
                                                                                                                <div class="col-sm-6">
                                                                                                                    <input type="text" class="form-control form-control-sm" name="duracion_validez_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Duración de validez" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-12 ml-3">
                                                                                                            <div class="form-group row">
                                                                                                                <label class="col-sm-4 col-form-label">Fecha vencimiento:</label>
                                                                                                                <div class="col-sm-6">
                                                                                                                    <input type="date" class="form-control form-control-sm" name="fecha_vencimiento_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Fecha vencimiento" >
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @if ($certificacion->file == 1)
                                                                                                            <div class="col-md-12 ml-3">
                                                                                                                <div class="form-group row">
                                                                                                                    <label class="col-sm-4 col-form-label">Adjunto:</label>
                                                                                                                    <div class="col-sm-6">
                                                                                                                        <div class="custom-file">
                                                                                                                            <input type="file" class="custom-file-input" name="adjunto_f[{{$producto->id}}][{{$certificacion->id}}]">
                                                                                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif
                                                                                                        @if (!empty($adjunto_certificaciones_fijas_producto[$producto->id][$certificacion->id]))
                                                                                                            <div class="col-md-12" id="documento_fijo_{{ $item->id }}">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                            <a class="btn btn-primary btn-sm" download="" href="{{$adjunto_certificaciones_fijas_producto[$producto->id][$certificacion->id]['url']}}" target="_blank">
                                                                                                                                Descargar Adjunto
                                                                                                                            </a>
                                                                                                                            @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                                                                <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteBibliotecaFile_2('{{ route('biblioteca.delete') }}',{{ $item->id }},null,'documento_fijo_{{ $item->id }}')">Eliminar Adjunto</button>
                                                                                                                            @endif
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endif
                                                                                                        <div class="col-md-12">
                                                                                                            <hr>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                        <div class="row mt-4">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">14.- Flow chart</h6>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="custom-file">
                                                                                                    <input type="file" class="custom-file-input" name="flow_chart_file[{{ $producto->id }}]">
                                                                                                    <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                  </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row mt-4">
                                                                                            <div class="col-md-12">
                                                                                                <h6 class="mb-2 font-weight-bold text-primary">15.- Label design</h6>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="custom-file">
                                                                                                    <input type="file" class="custom-file-input" name="label_design_file[{{ $producto->id }}]">
                                                                                                    <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                  </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- 
                                                                        AGREGAR CERTIFICACIONES
                                                                        <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h6 class="mb-2 font-weight-bold text-primary">13.- Other Analysis</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-12 col-form-label font-weight-bold">*Gluten free</label>
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Is the product Gluten Free?:</label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control form-control-sm" name="gluten_free[{{ $producto->id }}]">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{ ($producto->gluten_free == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                        <option {{ ($producto->gluten_free == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="gluten_free_file[{{ $producto->id }}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-12 col-form-label font-weight-bold">*Hidroxianthracene</label>
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Does it contain Hidrxianthracene?:</label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control form-control-sm" name="hidroxianthracene[{{ $producto->id }}]">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{ ($producto->hidroxianthracene == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                        <option {{ ($producto->hidroxianthracene == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="hidroxianthracene_file[{{ $producto->id }}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-12 col-form-label font-weight-bold">*Aloine</label>
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Does it contain Aloine?:</label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control form-control-sm" name="aloine[{{ $producto->id }}]">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{ ($producto->aloine == 'sí') ? 'selected' : ''; }} value="sí">Sí</option>
                                                                                        <option {{ ($producto->aloine == 'no') ? 'selected' : ''; }} value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="aloine_file[{{ $producto->id }}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="test-l-9" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->product_name}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Estado:</label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="row">
                                                                                        @if ((Auth::user()->hasRole('comercial') && $producto->estado_cl == 1) || Auth::user()->hasRole('calidad'))
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input {{($producto->estado_cl == 1) ? 'checked' : ''}}  class="form-check-input" type="radio" name="estado_cl[{{$producto->id}}]" id="estado_cl_p_{{$producto->id}}" value="1">
                                                                                                    <label class="form-check-label badge badge-warning" for="estado_cl_p_{{$producto->id}}">Pendiente</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                        @if ((Auth::user()->hasRole('comercial') && $producto->estado_cl == 2) || Auth::user()->hasRole('calidad'))
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input {{($producto->estado_cl == 2) ? 'checked' : ''}}  class="form-check-input" type="radio" name="estado_cl[{{$producto->id}}]" id="estado_cl_a_{{$producto->id}}" value="2">
                                                                                                    <label class="form-check-label badge badge-success" for="estado_cl_a_{{$producto->id}}">Aprobado</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                        @if ((Auth::user()->hasRole('comercial') && $producto->estado_cl == 3) || Auth::user()->hasRole('calidad'))
                                                                                            <div class="col-md-4">
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input  {{($producto->estado_cl == 3) ? 'checked' : ''}}  class="form-check-input" type="radio" name="estado_cl[{{$producto->id}}]" id="estado_cl_r_{{$producto->id}}" value="3">
                                                                                                    <label class="form-check-label badge badge-danger" for="estado_cl_r_{{$producto->id}}">Rechazado</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Observación:</label>
                                                                                <div class="col-md-8">
                                                                                    <textarea name="observacion_solicitud[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="5" style="resize: none" 
                                                                                   {{  (Auth::user()->hasRole('comercial')) ? 'readonly' : '' }}>{{ $producto->observacion_solicitud }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <!--a class="btn btn-success" href="{{route('prospectos.pdf',$producto->id)}}" target="_blank">PDF de {{$producto->product_name}}</a-->
                                                                            <a class="btn btn-success" href="{{route('prospectos.importados.excel.ficha-tecnica',$producto->id)}}" target="_blank">Ficha de {{$producto->product_name}}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class="card shadow ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Tabla de Revisiones</h6>
                        </div>
                        <div class="card-body border-left-success">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-stripped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Numero de revisión</th>
                                                <th>Fecha</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>1</td>
                                            <td>2024-14-3</td>
                                            <td>Prueba</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div-->
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary" type="button" onclick="stepper.previous()">Atras</button>
                            <button class="btn btn-primary" type="button" onclick="stepper.next()">Siguiente</button>
                        </div>
                        <div class="col-md-4 text-center">
                            @hasrole('comercial')
                                @if (empty($prospecto->id_comercial) || $prospecto->id_comercial != Auth::user()->id)
                                    <button class="btn btn-danger" type="button" onclick="$('#id_comercial').val({{Auth::user()->id}});$('#solicitudForm').submit();">Ser Responsable Comercial</button>    
                                @endif
                            @endhasrole
                            @hasrole('calidad')
                                @if (empty($prospecto->id_calidad) || $prospecto->id_calidad != Auth::user()->id)
                                    <button class="btn btn-danger" type="button" onclick="$('#id_calidad').val({{Auth::user()->id}});$('#solicitudForm').submit();">Ser Responsable Calidad</button>    
                                @endif
                            @endhasrole
                        </div>
                        <div class="col-md-4 text-right">
                           @if (($prospecto->estado_solicitud > 0 && Auth::user()->hasRole('calidad')) || ($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')))
                                @hasrole('calidad')
                                    @if ($prospecto->estado_solicitud != 1 && $prospecto->estado_solicitud != 0 && $prospecto->status != 2)
                                        <button class="btn btn-warning" type="button" onclick="$('#estado_solicitud').val(1);$('#solicitudForm').submit();">Enviar a Comercial</button>
                                    @endif
                                    <a class="btn btn-secondary" href="{{ route('prospectos.importados.excel.planilla-solicitud',$prospecto->id) }}">Planilla Solicitud</a>
                                    
                                @endhasrole
                                @hasrole('comercial')
                                    @if (($prospecto->estado_solicitud == 2 || $prospecto->estado_solicitud == 0) && $prospecto->status != 2 )
                                        <button class="btn btn-warning" type="button" onclick="$('#estado_solicitud').val(2);$('#solicitudForm').submit();">Enviar a Calidad</button>
                                    @endif
                                @endhasrole
                                @if ($prospecto->status != 2)
                                    <button class="btn btn-primary" type="submit">Guardar Solicitud</button>    
                                @endif
                                
                                <input type="hidden" name="status" value="">
                            @endif
                            @if ($prospecto->status == 2)
                            <input type="hidden" name="status" value="1">
                                <button class="btn btn-success" type="submit">Abrir Solicitud</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var ProveedoresTable=$('#tableProveedores').DataTable({
                "ajax": {
                    "url": "{{ route('buscarProveedor') }}",
                    "type": "GET", 
                    "data": function(d) {
                        d.search = $('.dataTables_filter input').val();
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nombre" },
                    { "data": "rut" },
                    { "data": "btn" }
                ],
                "searching": true, // Habilitar la funcionalidad de búsqueda
                "dom": 'lBfrtip' // Mostrar el campo de búsqueda
            });

            // Evento para detectar cambios en el campo de búsqueda y actualizar la tabla
            $('.dataTables_filter input')
                .off()
                .on('keyup', function() {
                    $('#tableProveedores').DataTable().ajax.reload();
            });
        });
         stepperEl = document.getElementById('stepper1')
         stepper = new Stepper(stepperEl,{
            animation: true,
            linear: false,
        });
        @if(!empty(session('stepp')))
            stepper.to({{session('stepp')}});
        @endif
        stepperEl.addEventListener('show.bs-stepper', function (event) {
            $('#stepp').val(event.detail.indexStep);
        });
        function fnAddMoreImageProducto(id_producto) {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#imagen_producto_").clone().removeClass("hide");
            clone.attr("id", "imagen_producto_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.imagen_producto').attr('name','imagen_producto['+id_producto+'][]');
            clone.find('.btn-delete-imagen-producto').attr("onclick","$('#imagen_producto_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.imagen-producto-div-'+id_producto).append(clone.show());
        }
        function fnAddMoreCertificacionVencimiento(id_producto) {
            //certificacionesVencimientoDiv_
            //certificacionVencimiento_
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#certificacionVencimiento_").clone().removeClass("d-none");
            clone.attr("id", "certificacionVencimiento_"+number).removeClass("d-none");
            clone.find('.certificacion_vencimiento').attr('name','certificacion_vencimiento['+id_producto+'][]');
            clone.find('.fecha_emision_v').attr('name','fecha_emision_v['+id_producto+'][]');
            clone.find('.fecha_vencimiento_v').attr('name','fecha_vencimiento_v['+id_producto+'][]');
            clone.find('.adjunto_v').attr('name','adjunto_v['+id_producto+'][]');
            clone.find('.btn-delete-certificacion-vencimiento').attr("onclick","$('#certificacionVencimiento_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.certificaciones-vencimiento-div-'+id_producto).append(clone.show());
        }
        
    </script>
    <script>
		jQuery(document).ready(function(){
			$('#collapseProspectosProductos').addClass('show');
		});
	</script>
</x-layout>