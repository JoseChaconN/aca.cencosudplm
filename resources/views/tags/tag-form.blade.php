<x-layout>
	<x-slot name="breadcrumb">
		Certificación
	</x-slot>
	<div class="col-lg-12">
		<div class="card shadow ">
	        <div class="card-header py-3">
	            <h6 class="m-0 font-weight-bold text-primary">Etiqueta/Tag</h6>
	        </div>
	        <form method="POST" action="{{ (!empty($tag->id)) ? route('tags.update',$tag->id) : route('tags.store') }}">
	        	@csrf
	        	@if(!empty($tag->id))
	        		@method('PATCH')
	        	@endif
	        	<div class="card-body border-left-primary">
	        		<div class="row">
	        			<div class="col-md-12">
		        			<div class="form-group row">
								<label class="col-sm-4 col-form-label font-weight-bold">Nombre Etiqueta/Tag:</label>
								<div class="col-sm-8">
									<input type="text" name="name" placeholder="Nombre Etiqueta/Tag" class="form-control" value="{{ old('name' , $tag->name)}}">
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
	<script>
		jQuery(document).ready(function(){
			$('#collapseAdministracion').addClass('show');
		});
	</script>
</x-layout>