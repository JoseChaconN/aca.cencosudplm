<x-layout>
	<x-slot name="breadcrumb">
		Etiquetas/Tags
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de Etiquetas/Tags <a class="btn btn-primary" href="{{route('tags.create')}}">Nueva Etiqueta/Tag</a></h6>
	            </div>
	            <div class="card-body">
	            	<div class="col-md-12">
	            		<label class="m-0 font-weight-bold text-black">Buscador</label>
	            	</div>
	            	<div class="col-md-12">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-hover dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Etiqueta/Tag</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$tag->name}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-circle btn-sm" href="{{route('tags.edit',$tag->id)}}">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
	            	</div>
	            	<div class="col-md-12">
	            		<hr class="sidebar-divider">
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
	<script>
		jQuery(document).ready(function(){
			$('#collapseAdministracion').addClass('show');
		});
	</script>
</x-layout>