<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <!--div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div-->
            <div class="sidebar-brand-text mx-3">Cencosud PLM ACA</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gestión
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        @hasanyrole('aca|aca importado')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProspectosProductos"
                aria-expanded="true" aria-controls="collapseProspectosProductos">
                <i class="fas fa-fw fa-cog"></i>
                <span>Prospectos Productos</span>
            </a>
            <div id="collapseProspectosProductos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">                
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Prospectos Productos:</h6>
                    @role('aca')
                        @role('comercial')
                            <a class="collapse-item" href="{{route('prospectos.create')}}">Nueva Solicitud</a>
                        @endrole
                        @hasanyrole('comercial|calidad')
                            <a class="collapse-item" href="{{route('prospectos.list.proceso')}}">Solicitudes en Proceso</a>
                            <a class="collapse-item" href="{{route('prospectos.list.cerrado')}}">Solicitudes Cerradas</a>
                        @endhasanyrole
                    @endrole
                    @role('aca importado')
                        @role('comercial')
                            <a class="collapse-item" href="{{route('prospectos-importados.create')}}">Nueva Solicitud</a>
                        @endrole
                        @hasanyrole('comercial|calidad')
                            <a class="collapse-item" href="{{route('prospectos.importados.list.proceso')}}">Solicitudes en Proceso</a>
                            <a class="collapse-item" href="{{route('prospectos.importados.list.cerrado')}}">Solicitudes Cerradas</a>
                        @endhasanyrole
                        <a class="collapse-item" href="{{route('prospectos.importados.fichas-tecnicas')}}">Fichas Tecnicas</a>
                    @endrole
                </div>
            </div>
        </li>
        @endhasanyrole
        <!-- Nav Item - Utilities Collapse Menu -->
        @hasanyrole('admin|administrador|auditor')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuditoria"
                    aria-expanded="true" aria-controls="collapseAuditoria">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Auditorias</span>
                </a>
                <div id="collapseAuditoria" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Auditorias:</h6>
                        <a class="collapse-item" href="{{route('auditorias.pre_create')}}">Nueva Auditoría</a>
                        <a class="collapse-item" href="{{route('auditorias.index')}}">Listado de Auditorias</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVisitas"
                    aria-expanded="true" aria-controls="collapseVisitas">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Visitas Inspectivas</span>
                </a>
                <div id="collapseVisitas" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Visitas Inspectivas:</h6>
                        <a class="collapse-item" href="{{route('visita.inspectiva.pre_create')}}">Nueva Visita</a>
                        <a class="collapse-item" href="{{route('visita.inspectiva.index')}}">Listado de Visitas</a>
                    </div>
                </div>
            </li>
        @endhasanyrole

        <!-- Nav Item - Utilities Collapse Menu -->        
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBiblioteca"
                    aria-expanded="true" aria-controls="collapseBiblioteca">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Biblioteca</span>
                </a>
                <div id="collapseBiblioteca" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Biblioteca:</h6>
                        <a class="collapse-item" href="{{route('biblioteca.index')}}">Biblioteca</a>
                        <a class="collapse-item" href="{{route('biblioteca.create')}}">Cargar Documento</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlantasProveedor"
                    aria-expanded="true" aria-controls="collapsePlantasProveedor">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Plantas proveedor</span>
                </a>
                <div id="collapsePlantasProveedor" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('plantas-proveedor.index') }}">Listado</a>
                        <a class="collapse-item" href="{{ route('plantas-proveedor.pre-create') }}">Nueva Planta</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReportes"
                    aria-expanded="true" aria-controls="collapseReportes">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseReportes" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Reporte Productos</a>
                        <a class="collapse-item" href="#">Reporte Auditorias</a>
                    </div>
                </div>
            </li>
        @hasanyrole('admin|administrador')
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministracion"
                    aria-expanded="true" aria-controls="collapseAdministracion">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseAdministracion" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Administración:</h6>
                        <a class="collapse-item" href="{{route('documentos.index')}}">Listado tipo Documentos</a>
                        <a class="collapse-item" href="{{route('tags.index')}}">Etiquetas/Tags</a>
                    </div>
                </div>
            </li>
        @endhasanyrole
    </ul>
    <!-- End of Sidebar -->