<x-layout>
	<x-slot name="breadcrumb">
		documentos
	</x-slot>

	<div class="row">
		<div class="col-lg-12">
	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Listado de documentos <a class="btn btn-primary" href="{{route('documentos.create')}}">Nueva Certificación</a></h6>
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
                                        <th>Certificación</th>
                                        <th>Tipo</th>
                                        <th>Tags</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($documentos as $documento)
                                        <tr>
                                            <td>{{$documento->nombre}}</td>
                                            <td>{{$documento->tipo_documento}}</td>
                                            <td>{{$documento->ultima_conexion}}</td>
                                            <td>
                                                <form class="form-inline" id="certForm_{{$documento->id}}" action="{{route('documentos.destroy',$documento->id)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="btn btn-primary btn-circle btn-sm" href="{{route('documentos.edit',$documento->id)}}">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <button class="ml-2 btn btn-danger btn-circle btn-sm" type="button" onclick="fnDeleteCertificacion({{$documento->id}},'{{$documento->nombre}}')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
        function fnDeleteCertificacion(id,text) {
            Swal.fire({
                title: 'La Certificación "'+text+'" será eliminada permanentemente. ¿Continuar?',                
                //showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar registro',
                cancelButtonText: 'No, cancelar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('#certForm_'+id).submit();
                    //Swal.fire('Saved!', '', 'success')
                }
            })
        }
    </script>
    <script>
		jQuery(document).ready(function(){
			$('#collapseAdministracion').addClass('show');
		});
	</script>
</x-layout>