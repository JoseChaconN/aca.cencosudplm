<x-layout>
	<x-slot name="breadcrumb">
		Inicio
	</x-slot>
    @hasrole('comercial')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardProspectosComercial" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardProspectosComercial">
                        <h6 class="m-0 font-weight-bold text-primary">Resumen Solicitudes de Prospecto {{$meses_array[date('m')].' '.date('Y')}}</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardProspectosComercial">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Solicitudes de Prospecto en Proceso</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_prospectos_proceso'])) ? $data_dashboard['resumen_mis_prospectos_proceso'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Solicitudes de Prospecto Cerradas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_prospectos_cerradas'])) ? $data_dashboard['resumen_mis_prospectos_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
    @endhasrole
    @hasrole('calidad')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardProspectosCalidad" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardProspectosCalidad">
                        <h6 class="m-0 font-weight-bold text-primary">Resumen Solicitudes de Prospecto {{$meses_array[date('m')].' '.date('Y')}}</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardProspectosCalidad">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Solicitudes de Prospecto en Proceso</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_prospectos_proceso'])) ? $data_dashboard['resumen_mis_prospectos_proceso'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Solicitudes de Prospecto Cerradas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_prospectos_cerradas'])) ? $data_dashboard['resumen_mis_prospectos_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">N° Solicitudes de Prospecto en Proceso Mis Secciones</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_prospectos_cerradas'])) ? $data_dashboard['resumen_mis_prospectos_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">N° Solicitudes de Prospecto Cerradas Mis Secciones</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasrole
    @hasrole('auditor')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardAuditoria" class="d-block card-header py-3" data-toggle="collapse"
                        role="button" aria-expanded="true" aria-controls="collapseCardAuditoria">
                        <h6 class="m-0 font-weight-bold text-primary">Resumen Auditorias - Visitas Inspectivas {{$meses_array[date('m')].' '.date('Y')}}</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardAuditoria">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Auditorias en Proceso</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_auditorias_proceso'])) ? $data_dashboard['resumen_mis_auditorias_proceso'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Auditorias Cerradas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_auditorias_cerradas'])) ? $data_dashboard['resumen_mis_auditorias_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">N° Auditorias en Proceso Total</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_total_auditorias_proceso'])) ? $data_dashboard['resumen_total_auditorias_proceso'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">N° Auditorias Cerradas Total</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_total_auditorias_cerradas'])) ? $data_dashboard['resumen_total_auditorias_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Visitas Inspectivas en Proceso</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_visitas_inespectivas_proceso'])) ? $data_dashboard['resumen_mis_visitas_inespectivas_proceso'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis N° Visitas Inspectivas Cerradas</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_mis_visitas_inespectivas_cerradas'])) ? $data_dashboard['resumen_mis_visitas_inespectivas_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">N° Visitas Inspectivas en Proceso Total</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_total_visitas_inespectivas_proceso'])) ? $data_dashboard['resumen_total_visitas_inespectivas_proceso'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">N° Visitas Inspectivas Cerradas Total</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{(!empty($data_dashboard['resumen_total_visitas_inespectivas_cerradas'])) ? $data_dashboard['resumen_total_visitas_inespectivas_cerradas'] : 0}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
    @endhasrole
    @hasrole('calidad')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <div class="d-block card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Certificaciones proximas a vencer (30 días antes)</h6>
                    </div>
                    <!-- Card Content - Collapse -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered tabla-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th>Proveedor</th>
                                            <th>Producto</th>
                                            <th>Certificación</th>
                                            <th>Fecha vencimiento</th>
                                            <th>Día/s Restantes</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasrole
</x-layout>