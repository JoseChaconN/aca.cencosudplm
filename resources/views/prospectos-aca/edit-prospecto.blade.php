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
            <form method="POST" action="{{route('prospectos.update',$prospecto->id)}}" id="solicitudForm" enctype="multipart/form-data">
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
                                                <span class="bs-stepper-label">Análisis de Rotulación Alimentos</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-4">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">4</span>
                                                <span class="bs-stepper-label">Información Nutricional y <br>Análisis Características Organolépticas</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-5">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">5</span>
                                                <span class="bs-stepper-label">Características Físicas y <br>Certificaciones</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-6">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">6</span>
                                                <span class="bs-stepper-label">Documentos Solicitados <br> a Proveedor</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#test-l-7">
                                            <button type="button" class="btn step-trigger">
                                                <span class="bs-stepper-circle">7</span>
                                                <span class="bs-stepper-label">Conclusiones</span>
                                            </button>
                                        </div>
                                    @endhasrole
                                    @hasrole('comercial')
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
                                    @endhasrole
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="test-l-1" class="content">
                                        <div class="col-md-12">
                                            <h6 class="font-weight-bold text-primary">Datos del proveedor</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="font-weight-bold">Nombre del proveedor:</label> {{$prospecto->nombre_proveedor}}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="font-weight-bold">Rut del proveedor:</label> {{$prospecto->rut_proveedor}}
                                        </div>
                                        <div class="col-md-12">
                                            <hr class="sidebar-divider">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card shadow mb-4">
                                                        <a href="#collapseCardComercial" class="d-block card-header py-3" data-toggle="collapse"
                                                            role="button" aria-expanded="true" aria-controls="collapseCardComercial">
                                                            <h6 class="m-0 font-weight-bold text-primary">Responsable comercial proveedor</h6>
                                                        </a>
                                                        <!-- Card Content - Collapse -->
                                                        <div class="collapse" id="collapseCardComercial">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreComercial()">
                                                                            <span class="icon text-white-50">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span class="text">Agregar Más</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-md-12" id="contacto_comercial_" style="display: none">
                                                                        <div class="col-md-12">
                                                                            <label>Contacto Comercial:</label>
                                                                            <button class="btn-danger btn-circle btn-sm btn-delete-contacto-comercial" type="button"><i class="fas fa-trash"></i></button>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Nombre Contacto:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm nombre_contacto_comercial" placeholder="Nombre Contacto" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">E-mail:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm email_contacto_comercial" placeholder="E-mail" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Teléfono:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm telefono_contacto_comercial" placeholder="Teléfono" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                    <div class="contacto-comercial-div col-md-12">
                                                                        @foreach ($contactos_comercial as $contacto)
                                                                            <div class="col-md-12" id="contacto_comercial_{{$contacto->id}}">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label>Contacto Comercial:</label>
                                                                                        @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                            <button class="btn-danger btn-circle btn-sm btn-delete-contacto-comercial" type="button"><i class="fas fa-trash"></i></button>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Nombre Contacto:</label> {{$contacto->nombre}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">E-mail:</label> {{$contacto->email}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Teléfono:</label> {{$contacto->telefono}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <hr>
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card shadow mb-4">
                                                        <a href="#collapseCardCalidad" class="d-block card-header py-3" data-toggle="collapse"
                                                            role="button" aria-expanded="true" aria-controls="collapseCardCalidad">
                                                            <h6 class="m-0 font-weight-bold text-primary">Responsable calidad proveedor</h6>
                                                        </a>
                                                        <!-- Card Content - Collapse -->
                                                        <div class="collapse" id="collapseCardCalidad">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 text-right">
                                                                        <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreCalidad()">
                                                                            <span class="icon text-white-50">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span class="text">Agregar Más</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-md-12" id="contacto_calidad_" style="display: none">
                                                                        <div class="col-md-12">
                                                                            <label>Contacto Calidad:</label>
                                                                            <button class="btn-danger btn-circle btn-sm btn-delete-contacto-calidad" type="button"><i class="fas fa-trash"></i></button>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Nombre Contacto:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm nombre_contacto_calidad" placeholder="Nombre Contacto" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">E-mail:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm email_contacto_calidad" placeholder="E-mail" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Teléfono:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm telefono_contacto_calidad" placeholder="Teléfono" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                    <div class="contacto-calidad-div col-md-12">
                                                                        @foreach ($contactos_calidad as $contacto)
                                                                            <div class="col-md-12" id="contacto_calidad_{{$contacto->id}}">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label>Contacto Calidad:</label>
                                                                                        @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                            <button class="btn-danger btn-circle btn-sm btn-delete-contacto-calidad" type="button"><i class="fas fa-trash"></i></button>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Nombre Contacto:</label> {{$contacto->nombre}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">E-mail:</label> {{$contacto->email}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Teléfono:</label> {{$contacto->telefono}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <hr>
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card shadow mb-4">
                                                        <a href="#collapseCardPlanta" class="d-block card-header py-3" data-toggle="collapse"
                                                            role="button" aria-expanded="true" aria-controls="collapseCardPlanta">
                                                            <h6 class="m-0 font-weight-bold text-primary">Plantas del proveedor</h6>
                                                        </a>
                                                        <!-- Card Content - Collapse -->
                                                        <div class="collapse" id="collapseCardPlanta">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    {{-- <div class="col-md-12 text-right">
                                                                        <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMorePlanta()">
                                                                            <span class="icon text-white-50">
                                                                                <i class="fas fa-plus"></i>
                                                                            </span>
                                                                            <span class="text">Agregar Más</span>
                                                                        </button>
                                                                    </div> --}}
                                                                    <div class="col-md-12" id="planta_" style="display: none">
                                                                        <div class="col-md-12">
                                                                            <label>Planta Proveedor:</label>
                                                                            {{-- <button class="btn-danger btn-circle btn-sm btn-delete-planta" type="button"><i class="fas fa-trash"></i></button> --}}
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Planta o Predio:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm nombre_planta" placeholder="Planta o Predio" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Dirección:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm direccion_planta" placeholder="Dirección" value="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Resolución Sanitaria:</label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input documento_planta">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                      </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                    <div class="planta-div col-md-12">
                                                                        @foreach ($plantas as $planta)
                                                                            <div class="col-md-12" id="planta_{{$planta->id}}">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label>Planta Proveedor:</label>
                                                                                        {{-- @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                            <button class="btn-danger btn-circle btn-sm btn-delete-planta" type="button"><i class="fas fa-trash"></i></button>
                                                                                        @endif --}}
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group ">
                                                                                            <label class="font-weight-bold">Planta o Predio: </label>{{$planta->nombre}}
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group ">
                                                                                            <label class="font-weight-bold">Dirección:</label>{{$planta->direccion}}
                                                                                        </div>
                                                                                    </div>
                                                                                    @if (!empty($planta->getMedia('resolucion_sanitaria_planta')->last()))
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group ">
                                                                                                <label class="font-weight-bold">Resolución Sanitaria:</label>
                                                                                                <a class="btn btn-primary btn-sm mt-1" download="" href="{{$planta->getMedia('resolucion_sanitaria_planta')->last()->getUrl()}}" target="_blank">Descargar
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                    <div class="col-md-12">
                                                                                        <hr>
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
                                        </div>
                                    </div>
                                    <div id="test-l-2" class="content">
                                        <div class="col-md-12" id="imagen_producto_" style="display: none">
                                            <div class="col-md-12">
                                                <button class="btn-danger btn-circle btn-sm btn-delete-imagen-producto" type="button"><i class="fas fa-trash"></i></button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bold">Imagen:</label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input imagen_producto">
                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        </div>
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <input type="hidden" name="id_producto[{{$producto->id}}]" value="{{$producto->id}}">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_2_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_2_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->nombre_producto}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_2_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Nombre producto:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" id="nombre_producto_0_{{$producto->id}}" name="nombre_producto[{{$producto->id}}]" placeholder="Nombre producto" value="{{$producto->nombre_producto}}" onkeyup="$('#nombre_producto_1_{{$producto->id}}').val(this.value)">
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
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Marca:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" name="marca_producto[{{$producto->id}}]" placeholder="Marca" value="{{$producto->marca}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Código de Barra:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" onkeyup="$('#codigo_barra_producto_1_{{$producto->id}}').val(this.value)" name="codigo_barra_producto[{{$producto->id}}]" id="codigo_barra_producto_0_{{$producto->id}}" placeholder="Código de Barra" value="{{$producto->codigo_barra}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Vida Útil:</label>
                                                                                <div class="col-sm-2">
                                                                                    <input type="text" class="form-control form-control-sm" name="vida_util_producto[{{$producto->id}}]" placeholder="Vida Útil" value="{{$producto->vida_util_producto}}">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control form-control-sm" name="tiempo_vida_util_producto[{{$producto->id}}]">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{($producto->tiempo_vida_util_producto == 'dia') ? 'selected' : '';}} value="dia">Día/s</option>
                                                                                        <option {{($producto->tiempo_vida_util_producto == 'mes') ? 'selected' : '';}} value="mes">Mes/es</option>
                                                                                        <option {{($producto->tiempo_vida_util_producto == 'ano') ? 'selected' : '';}} value="ano">Año/s</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <h6 class="m-0 font-weight-bold text-primary">
                                                                                Imagenes Producto
                                                                                <button class="btn btn-primary btn-icon-split btn-sm" type="button" onclick="fnAddMoreImageProducto({{$producto->id}})">
                                                                                    <span class="icon text-white-50">
                                                                                        <i class="fas fa-plus"></i>
                                                                                    </span>
                                                                                    <span class="text">Agregar Más</span>
                                                                                </button>
                                                                            </h6>
                                                                            <span>*Formatos permitidos jpg,png</span>
                                                                        </div>
                                                                        <div class="imagen-producto-div-{{$producto->id}} col-md-12">
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                @if (!empty($imagenes_productos[$producto->id]))
                                                                                    @foreach ($imagenes_productos[$producto->id] as $k => $imagen)
                                                                                        <div class="col-md-4 mb-4">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-group">
                                                                                                        <a href="{{$imagen['url']}}" target="_blank">
                                                                                                            <img src="{{$imagen['url']}}" alt="" style="max-height: 150px; max-width:auto">
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                                    <div class="col-md-12">
                                                                                                        <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteMediaFile('{{ route('biblioteca.delete.media') }}',{{ $imagen['id'] }},null,{{ $producto->id }},'prospecto-producto')">Eliminar Imagen</button>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                @endif
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
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->nombre_producto}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_3_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h6 class="mb-2 font-weight-bold text-primary">Producto Evaluado</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <table class="table table-bordered table-stripped table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th width="20%">Campo</th>
                                                                                        <th width="40%">Valor</th>
                                                                                        <th width="40%">Observaciones</th>
                                                                                    </tr>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Código de Barra</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" onkeyup="$('#codigo_barra_producto_0_{{$producto->id}}').val(this.value)" id="codigo_barra_producto_1_{{$producto->id}}" placeholder="Código de Barra" value="{{$producto->codigo_barra}}"></td>
                                                                                            <td><textarea name="codigo_barra_producto_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->codigo_barra_producto_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Nombre del Alimento</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" id="nombre_producto_1_{{$producto->id}}" placeholder="Nombre del Alimento" value="{{$producto->nombre_producto}}" onkeyup="$('#nombre_producto_0_{{$producto->id}}').val(this.value)"></td>
                                                                                            <td><textarea name="nombre_producto_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->nombre_producto_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Nombre del Fabricante</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="nombre_fabricante[{{$producto->id}}]" placeholder="Nombre del Fabricante" value="{{$producto->nombre_fabricante}}"></td>
                                                                                            <td><textarea name="nombre_fabricante_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->nombre_fabricante_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Nombre y domicilio del importador</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="nombre_domicilio_importador[{{$producto->id}}]" placeholder="Nombre y domicilio del importador" value="{{$producto->nombre_domicilio_importador}}"></td>
                                                                                            <td><textarea name="nombre_domicilio_importador_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->nombre_domicilio_importador_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Domicilio del proveedor</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="domicilio_prov[{{$producto->id}}]" placeholder="Domicilio del proveedor" value="{{$producto->domicilio_prov}}"></td>
                                                                                            <td><textarea name="domicilio_prov_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->domicilio_prov_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de Elaboración o envasado/lote</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="fecha_elab_envase[{{$producto->id}}]" placeholder="Fecha de Elaboración o envasado/lote" value="{{$producto->fecha_elab_envase}}"></td>
                                                                                            <td><textarea name="fecha_elab_envase_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->fecha_elab_envase_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Fecha de vencimiento/duración</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="fecha_venc_dura[{{$producto->id}}]" placeholder="echa de vencimiento/duración" value="{{$producto->fecha_venc_dura}}"></td>
                                                                                            <td><textarea name="fecha_venc_dura_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->fecha_venc_dura_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Resolución Sanitaria</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="res_sanitaria[{{$producto->id}}]" placeholder="Resolución Sanitaria" value="{{$producto->res_sanitaria}}"></td>
                                                                                            <td><textarea name="res_sanitaria_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->res_sanitaria_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Contenido Neto</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="cont_neto[{{$producto->id}}]" placeholder="Contenido Neto" value="{{$producto->cont_neto}}"></td>
                                                                                            <td><textarea name="cont_neto_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->cont_neto_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Contenido Drenado o escurrido</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="cont_drenado_escurrido[{{$producto->id}}]" placeholder="Contenido Drenado o escurrido" value="{{$producto->cont_drenado_escurrido}}"></td>
                                                                                            <td><textarea name="cont_drenado_escurrido_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->cont_drenado_escurrido_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>País de Origen</td>
                                                                                            <td>
                                                                                                <select class="form-control form-control-sm" name="pais_origen[{{$producto->id}}]" id="">
                                                                                                    <option value="">País</option>
                                                                                                    @foreach ($paises as $pais)
                                                                                                        <option {{($producto->pais_origen == $pais->id) ? 'selected' : '';}} value="{{$pais->id}}">{{$pais->nombre}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><textarea name="pais_origen_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->pais_origen_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Indicaciones de uso</td>
                                                                                            <td>
                                                                                                <select class="form-control form-control-sm" name="indica_uso[{{$producto->id}}]" id="">
                                                                                                    <option value="">Seleccionar</option>
                                                                                                    <option {{($producto->indica_uso == 'sí') ? 'selected' : '';}} value="sí">Sí</option>
                                                                                                    <option {{($producto->indica_uso == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                </select>
                                                                                            </td>
                                                                                            <td><textarea name="indica_uso_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->indica_uso_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Instrucciones de almacenamiento</td>
                                                                                            <td><input type="text" class="form-control form-control-sm" name="instru_almacena[{{$producto->id}}]" placeholder="Instrucciones de almacenamiento" value="{{$producto->instru_almacena}}"></td>
                                                                                            <td><textarea name="instru_almacena_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="2" style="resize: none">{{$producto->instru_almacena_obs}}</textarea></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Ingredientes(Para que un texto aparezca en negritas en el PDF, usted debe escribirlo entre asteriscos. Ejemplo: *frase o palabra*)</td>
                                                                                            <td>
                                                                                                <textarea name="ingredientes[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="5" style="resize: none">{{$producto->ingredientes}}</textarea>
                                                                                            </td>
                                                                                            <td><textarea name="ingredientes_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="5" style="resize: none">{{$producto->ingredientes_obs}}</textarea></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </thead>
                                                                            </table>
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
                                        <div id="test-l-4" class="content">
                                            @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->nombre_producto}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h6 class="mb-2 font-weight-bold text-primary">Producto Evaluado</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <h6 class="font-weight-bold">Información Nutricional</h6>
                                                                            <span>*Formatos permitidos jpg,png</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Imagen:</label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="imagen_nutricional_producto[{{$producto->id}}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($imagen_nutricional_productos[$producto->id]))
                                                                        <div class="col-md-4 mb-4">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <a href="{{$imagen_nutricional_productos[$producto->id]['url']}}" target="_blank">
                                                                                            <img src="{{$imagen_nutricional_productos[$producto->id]['url']}}" alt="" style="max-height: 150px; max-width:auto">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                        <div class="col-md-12">
                                                                                            <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteMediaFile('{{ route('biblioteca.delete.media') }}',{{ $imagen_nutricional_productos[$producto->id]['id'] }},'',{{ $producto->id }},'prospecto-producto')">Eliminar Imagen</button>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="col-md-12">
                                                                            <h6 class="font-weight-bold">Aplica Disco Pare Ley 20.606</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <table class="table table-hover table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Alto en Calorías</th>
                                                                                        <th>Alto en Grasas Saturadas</th>
                                                                                        <th>Alto en Azúcares</th>
                                                                                        <th>Alto en Sodio</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <select name="alto_calorias[{{$producto->id}}]" class="form-control form-control-sm">
                                                                                                <option {{($producto->alto_calorias == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                <option {{($producto->alto_calorias == 'sí') ? 'selected' : '';}} value="sí">Sí</option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <select name="alto_grasas_saturadas[{{$producto->id}}]" id="" class="form-control form-control-sm">
                                                                                                <option {{($producto->alto_grasas_saturadas == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                <option {{($producto->alto_grasas_saturadas == 'sí') ? 'selected' : '';}} value="sí">Sí</option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <select name="alto_azucares[{{$producto->id}}]" id="" class="form-control form-control-sm">
                                                                                                <option {{($producto->alto_azucares == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                <option {{($producto->alto_azucares == 'sí') ? 'selected' : '';}} value="sí">Sí</option>
                                                                                            </select>
                                                                                        </td>
                                                                                        <td>
                                                                                            <select name="alto_sodio[{{$producto->id}}]" id="" class="form-control form-control-sm">
                                                                                                <option {{($producto->alto_sodio == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                                <option {{($producto->alto_sodio == 'sí') ? 'selected' : '';}} value="sí">Sí</option>
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label for="">Observaciones Disco Pare Ley 20.606</label>
                                                                            <textarea name="disco_obs[{{$producto->id}}]" class="form-control form-control-sm" placeholder="Observaciones" rows="5" style="resize: none">{{$producto->disco_obs}}</textarea>
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
                                        <div id="test-l-5" class="content">
                                            <div class="row d-none" id="certificacionVencimiento_">
                                                <div class="col-md-12 ml-3">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Certificación:</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control form-control-sm certificacion_vencimiento">
                                                                <option value="">Seleccione</option>
                                                                @foreach ($certificaciones_vencimiento as $item)
                                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button class="btn btn-danger btn-delete-certificacion-vencimiento" type="button">X</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ml-3">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Fecha Emisión:</label>
                                                        <div class="col-sm-6">
                                                            <input type="date" class="form-control form-control-sm fecha_emision_v" placeholder="Fecha Emisión" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ml-3">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Fecha vencimiento:</label>
                                                        <div class="col-sm-6">
                                                            <input type="date" class="form-control form-control-sm fecha_vencimiento_v" placeholder="Fecha vencimiento" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ml-3">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Adjunto:</label>
                                                        <div class="col-sm-6">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input adjunto_v">
                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <hr class="sidebar-divider">
                                                </div>
                                            </div>
                                            @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->nombre_producto}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h6 class="mb-2 font-weight-bold text-primary">Producto Evaluado</h6>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <span>*Formatos permitidos jpg,png</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Logo, Productos unitarios (Sin envase):</label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" name="logo_producto[{{$producto->id}}]" class="custom-file-input">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($logo_producto[$producto->id]))
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <a class="btn btn-primary" href="{{$logo_producto[$producto->id]['url']}}" target="_blank">
                                                                                            Ver Imagen
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                    <div class="col-md-12">
                                                                                        <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteMediaFile('{{ route('biblioteca.delete.media') }}',{{ $logo_producto[$producto->id]['id'] }},'',{{ $producto->id }},'prospecto-producto')">Eliminar Imagen</button>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Razón Social:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" name="razon_social_logo_producto[{{$producto->id}}]" placeholder="Razón Social" value="{{$producto->razon_social_logo}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Especie:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" name="especie_logo_producto[{{$producto->id}}]" placeholder="Especie" value="{{$producto->especie_logo}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Variedad (Solo si aplica):</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" name="variedad_logo_producto[{{$producto->id}}]" placeholder="Variedad" value="{{$producto->variedad_logo}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Orgánico:</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-control form-control-sm" name="organico_logo_producto[{{$producto->id}}]" onchange="(this.value == 'sí') ? $('.organico_logo_producto_{{$producto->id}}').show() : $('.organico_logo_producto_{{$producto->id}}').hide()">
                                                                                        <option value="">Seleccione</option>
                                                                                        <option {{($producto->organico_logo == 'sí') ? 'selected' : '';}} value="sí">Sí</option>
                                                                                        <option {{($producto->organico_logo == 'no') ? 'selected' : '';}} value="no">No</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 organico_logo_producto_{{$producto->id}}" {{($producto->organico_logo == 'sí') ? '' : 'style="display: none;"';}} >
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Orgánico u orgánico en transición:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" name="tipo_organico_logo_producto[{{$producto->id}}]" placeholder="Orgánico u orgánico en transición" value="{{$producto->tipo_organico_logo}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 organico_logo_producto_{{$producto->id}}" {{($producto->organico_logo == 'sí') ? '' : 'style="display: none;"';}} >
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Certificado por:</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control form-control-sm" name="certificado_por_logo_producto[{{$producto->id}}]" placeholder="Certificado por" value="{{$producto->certificado_por_logo}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <span>*Formatos permitidos jpg,png</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Logo oficial del SAG (Solo orgánico):</label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="logo_oficial_sag_producto[{{$producto->id}}]">
                                                                                        <label class="custom-file-label" >Buscar Archivo</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($logo_oficial_sag[$producto->id]))
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <a class="btn btn-primary" href="{{$logo_oficial_sag[$producto->id]['url']}}" target="_blank">
                                                                                            Ver Imagen
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                    <div class="col-md-12">
                                                                                        <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteMediaFile('{{ route('biblioteca.delete.media') }}',{{ $logo_oficial_sag[$producto->id]['id'] }},'',{{ $producto->id }},'prospecto-producto')">Eliminar Imagen</button>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <div class="col-md-12">
                                                                            <div class="form-group row">
                                                                                <label class="col-sm-4 col-form-label font-weight-bold">Debe entregar muestras de producto en en oficina comercial Alto Las Condes:</label>
                                                                                <div class="col-sm-8">
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input {{($producto->entrega_muestra == 1) ? 'checked' : ''}} type="radio" id="customRadioInline1_{{$producto->id}}" name="entrega_muestra_producto[{{$producto->id}}]" value="1" class="custom-control-input">
                                                                                        <label class="custom-control-label" for="customRadioInline1_{{$producto->id}}">Sí Cumplió</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input {{($producto->entrega_muestra == 2) ? 'checked' : ''}} type="radio" id="customRadioInline2_{{$producto->id}}" name="entrega_muestra_producto[{{$producto->id}}]" value="2" class="custom-control-input">
                                                                                        <label class="custom-control-label" for="customRadioInline2_{{$producto->id}}">No Cumplió</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card shadow mb-4">
                                                                                        <a href="#collapseCardProductoCertificacionesV_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                            role="button" aria-expanded="true" aria-controls="collapseCardProductoCertificacionesV_{{$producto->id}}">
                                                                                            <h6 class="m-0 font-weight-bold text-primary">Certificaciones Vencimiento</h6>
                                                                                        </a>
                                                                                        <div class="collapse" id="collapseCardProductoCertificacionesV_{{$producto->id}}">
                                                                                            <div class="card-body">
                                                                                                <button class="btn btn-primary btn-icon-split btn-sm mb-3" type="button" onclick="fnAddMoreCertificacionVencimiento({{$producto->id}})">
                                                                                                    <span class="icon text-white-50">
                                                                                                        <i class="fas fa-plus"></i>
                                                                                                    </span>
                                                                                                    <span class="text">Agregar Más</span>
                                                                                                </button>
                                                                                                <div class="certificaciones-vencimiento-div-{{$producto->id}}">
                                                                                                    @if (!empty($certificaciones_vencimiento_producto[$producto->id]))
                                                                                                        @foreach ($certificaciones_vencimiento_producto[$producto->id] as $item)
                                                                                                            <div class="row" id="certificacionVencimiento_">
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <input type="hidden" name="id_exist_certificacion_vencimiento[{{$producto->id}}][{{$item->id}}]" value="{{!empty($certificaciones_vencimiento_producto[$producto->id][$item->id]->id) ? $certificaciones_vencimiento_producto[$producto->id][$item->id]->id : ''}}">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Certificación:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <select class="form-control form-control-sm" name="certificacion_vencimiento_exist[{{$producto->id}}][{{$item->id}}]">
                                                                                                                                <option value="">Seleccione</option>
                                                                                                                                @foreach ($certificaciones_vencimiento as $cert)
                                                                                                                                    <option {{(!empty($certificaciones_vencimiento_producto[$producto->id][$item->id]) && $certificaciones_vencimiento_producto[$producto->id][$item->id]->id_documento == $cert->id) ? 'selected' : ''}} value="{{$cert->id}}">{{$cert->nombre}}</option>
                                                                                                                                @endforeach
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-2">
                                                                                                                            <button class="btn btn-danger btn-delete-certificacion-vencimiento" type="button">X</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Fecha Emisión:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="date" class="form-control form-control-sm "  name="fecha_emision_v_exist[{{$producto->id}}][{{$item->id}}]" placeholder="Fecha Emisión" value="{{(!empty($certificaciones_vencimiento_producto[$producto->id][$item->id]->fecha_emision)) ? $certificaciones_vencimiento_producto[$producto->id][$item->id]->fecha_emision : ''}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Fecha vencimiento:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="date" class="form-control form-control-sm" name="fecha_vencimiento_v_exist[{{$producto->id}}][{{$item->id}}]" placeholder="Fecha vencimiento" value="{{(!empty($certificaciones_vencimiento_producto[$producto->id][$item->id]->fecha_vencimiento)) ? $certificaciones_vencimiento_producto[$producto->id][$item->id]->fecha_vencimiento : ''}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Adjunto:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <div class="custom-file">
                                                                                                                                <input type="file" class="custom-file-input adjunto_v">
                                                                                                                                <label class="custom-file-label" >Buscar Archivo</label>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                @if (!empty($adjunto_certificaciones_vencimiento_producto[$producto->id][$item->id]))
                                                                                                                    <div class="col-md-12" id="documento_vencimiento_{{ $item->id }}">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-12">
                                                                                                                                    <a class="btn btn-primary btn-sm" download="" href="{{$adjunto_certificaciones_vencimiento_producto[$producto->id][$item->id]['url']}}" target="_blank">
                                                                                                                                        Descargar Adjunto
                                                                                                                                    </a>
                                                                                                                                    @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                                                                        <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteBibliotecaFile_2('{{ route('biblioteca.delete') }}',{{ $item->id }},null,'documento_vencimiento_{{ $item->id }}')">Eliminar Adjunto</button>
                                                                                                                                    @endif
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endif
                                                                                                                <div class="col-sm-12">
                                                                                                                    <hr class="sidebar-divider">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="card shadow mb-4">
                                                                                        <a href="#collapseCardProductoCertificacionesF_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                                            role="button" aria-expanded="true" aria-controls="collapseCardProductoCertificacionesF_{{$producto->id}}">
                                                                                            <h6 class="m-0 font-weight-bold text-primary">Certificaciones Fijas</h6>
                                                                                        </a>
                                                                                        <div class="collapse" id="collapseCardProductoCertificacionesF_{{$producto->id}}">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    @foreach ($certificaciones_fijas as $certificacion)
                                                                                                        <input type="hidden" name="id_certificacion_fija[{{$producto->id}}][{{$certificacion->id}}]" value="{{$certificacion->id}}">
                                                                                                        <input type="hidden" name="id_exist_certificacion_fija[{{$producto->id}}][{{$certificacion->id}}]" value="{{!empty($certificaciones_fijas_producto[$producto->id][$certificacion->id]->id) ? $certificaciones_fijas_producto[$producto->id][$certificacion->id]->id : ''}}">
                                                                                                        <div class="col-md-12">
                                                                                                            <label for="" class="font-weight-bold">- {{$certificacion->nombre}}</label>
                                                                                                        </div>
                                                                                                        <div class="col-md-12">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Nombre Laboratorio:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="text" class="form-control form-control-sm" name="nombre_laboratorio_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Nombre Laboratorio" value="{{!empty($certificaciones_fijas_producto[$producto->id][$certificacion->id]->nombre_laboratorio) ? $certificaciones_fijas_producto[$producto->id][$certificacion->id]->nombre_laboratorio : ''}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Número Certificado:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="text" class="form-control form-control-sm" name="numero_certificado_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Número Certificado" value="{{!empty($certificaciones_fijas_producto[$producto->id][$certificacion->id]->numero_certificado) ? $certificaciones_fijas_producto[$producto->id][$certificacion->id]->numero_certificado : ''}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Fecha Análisis:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="date" class="form-control form-control-sm" name="fecha_analisis_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Fecha Análisis" value="{{!empty($certificaciones_fijas_producto[$producto->id][$certificacion->id]->fecha_analisis) ? $certificaciones_fijas_producto[$producto->id][$certificacion->id]->fecha_analisis : ''}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Duración de validez:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="text" class="form-control form-control-sm" name="duracion_validez_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Duración de validez" value="{{!empty($certificaciones_fijas_producto[$producto->id][$certificacion->id]->duracion_validez) ? $certificaciones_fijas_producto[$producto->id][$certificacion->id]->duracion_validez : ''}}">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-md-12 ml-3">
                                                                                                                    <div class="form-group row">
                                                                                                                        <label class="col-sm-4 col-form-label">Fecha vencimiento:</label>
                                                                                                                        <div class="col-sm-6">
                                                                                                                            <input type="date" class="form-control form-control-sm" name="fecha_vencimiento_f[{{$producto->id}}][{{$certificacion->id}}]" placeholder="Fecha vencimiento" value="{{!empty($certificaciones_fijas_producto[$producto->id][$certificacion->id]->fecha_vencimiento) ? $certificaciones_fijas_producto[$producto->id][$certificacion->id]->fecha_vencimiento : ''}}">
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
                                                                                                    @endforeach
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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
                                    @endhasanyrole
                                    <div id="test-l-6" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->nombre_producto}}</h6>
                                                            </a>
                                                            <div class="collapse" id="collapseCardProducto_4_{{$producto->id}}">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        @foreach ($documentos_solicitados_proveedor as $documento)
                                                                            <input type="hidden" name="id_documento_solicitado_proveedor[{{$producto->id}}][{{$documento->id}}]" value="{{$documento->id}}">
                                                                            <input type="hidden" name="id_exist_documento_solicitado_proveedor[{{$producto->id}}][{{$documento->id}}]" value="{{!empty($documentos_solicitados_proveedor_exist[$producto->id][$documento->id]->id) ? $documentos_solicitados_proveedor_exist[$producto->id][$documento->id]->id : ''}}">                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-4 col-form-label font-weight-bold">- {{$documento->nombre}}:</label>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="custom-file">
                                                                                            <input type="file" class="custom-file-input" name="documento_solicitado_proveedor[{{$producto->id}}][{{$documento->id}}]">
                                                                                            <label class="custom-file-label" >Buscar Archivo</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @if (!empty($adjunto_documentos_solicitados_proveedor_exist[$producto->id][$documento->id]))
                                                                                    <div class="col-md-12" id="documento_solicitados_prov_{{ $documento->id }}">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                    <a class="btn btn-primary btn-sm" download="" href="{{$adjunto_documentos_solicitados_proveedor_exist[$producto->id][$documento->id]['url']}}" target="_blank">
                                                                                                        Descargar Adjunto
                                                                                                    </a>
                                                                                                    @if (($prospecto->estado_solicitud == 0 && Auth::user()->hasRole('comercial')) || Auth::user()->hasRole('calidad'))
                                                                                                        <button class="btn btn-danger btn-sm" type="button" onclick="fnDeleteBibliotecaFile_2('{{ route('biblioteca.delete') }}',{{ $adjunto_documentos_solicitados_proveedor_exist[$producto->id][$documento->id]['documento_id'] }},'','documento_solicitados_prov_{{ $documento->id }}')">Eliminar Adjunto</button>
                                                                                                    @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                <div class="col-md-12">
                                                                                    <hr>
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
                                    <div id="test-l-7" class="content">
                                        @foreach ($prospecto->productos_solicitud_prospecto as $producto)
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card shadow mb-4">
                                                            <a href="#collapseCardProducto_4_{{$producto->id}}" class="d-block card-header py-3" data-toggle="collapse"
                                                                role="button" aria-expanded="true" aria-controls="collapseCardProducto_4_{{$producto->id}}">
                                                                <h6 class="m-0 font-weight-bold text-primary">{{$producto->nombre_producto}}</h6>
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
                                                                            <a class="btn btn-success" href="{{route('prospectos.pdf',$producto->id)}}" target="_blank">PDF de {{$producto->nombre_producto}}</a>
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
        })
        function fnAddMoreComercial() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#contacto_comercial_").clone().removeClass("hide");
            clone.attr("id", "contacto_comercial_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.nombre_contacto_comercial').attr('name','nombre_contacto_comercial[]');
            clone.find('.email_contacto_comercial').attr('name','email_contacto_comercial[]');
            clone.find('.telefono_contacto_comercial').attr('name','telefono_contacto_comercial[]');
            clone.find('.btn-delete-contacto-comercial').attr("onclick","$('#contacto_comercial_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.contacto-comercial-div').append(clone.show());
        }
        function fnAddMoreCalidad() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#contacto_calidad_").clone().removeClass("hide");
            clone.attr("id", "contacto_calidad_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.nombre_contacto_calidad').attr('name','nombre_contacto_calidad[]');
            clone.find('.email_contacto_calidad').attr('name','email_contacto_calidad[]');
            clone.find('.telefono_contacto_calidad').attr('name','telefono_contacto_calidad[]');
            clone.find('.btn-delete-contacto-calidad').attr("onclick","$('#contacto_calidad_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.contacto-calidad-div').append(clone.show());
        }
        function fnAddMorePlanta() {
            number= Math.round(Math.random()*(9999999999-1)+parseInt(1));
            clone = $("#planta_").clone().removeClass("hide");
            clone.attr("id", "planta_"+number).removeClass("hide");
            //clone.find('.res_sanitaria_importacion_')
            clone.find('.nombre_planta').attr('name','nombre_planta[]');
            clone.find('.direccion_planta').attr('name','direccion_planta[]');
            clone.find('.documento_planta').attr('name','documento_planta[]');
            clone.find('.btn-delete-planta').attr("onclick","$('#planta_"+number+"').remove()");        
            //clone.find('.idInvo').attr('name','idInvo[]').val('');
            $('.planta-div').append(clone.show());
        }
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