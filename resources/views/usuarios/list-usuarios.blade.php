<x-layout>
	<x-slot name="breadcrumb">
		Usuarios
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios <a class="btn btn-primary" href="{{route('nuevoUsuario')}}">Nuevo Usuario</a></h6>
	            </div>
	            <div class="card-body">
	            	<div class="col-md-12">
	            		<label class="m-0 font-weight-bold text-black">Buscador</label>
	            	</div>
	            	<div class="col-md-12">
	            		<form method="POST" action="{{ route('listUsuarios')}}">
		               		@csrf
		               		
			            	<div class="col-md-12">
			            		<table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
			                        <thead>
			                            <tr>
			                                <th>Usuario</th>
			                                <th>Email</th>
			                                <th>Fecha Último Ingreso</th>
			                                <th>Estado</th>
			                                <th>Ver</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        	@foreach($usuarios as $usuario)
			                        		<tr>
				                                <td>{{$usuario->name.' '.$usuario->last_name}}</td>
				                                <td>{{$usuario->email}}</td>
				                                <td>{{$usuario->ultima_conexion}}</td>
				                                <td>{{$usuario->status}}</td>
				                                <td>
				                                	<a class="btn btn-primary btn-circle btn-sm" href="{{route('editUsuario',$usuario->id)}}">
				                                        <i class="fa fa-check"></i>
				                                    </a>
				                                </td>
				                            </tr>
			                        	@endforeach
			                        </tbody>
			                    </table>
			            	</div>
	               		</form>
	            	</div>
	            	<div class="col-md-12">
	            		<hr class="sidebar-divider">
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</x-layout>