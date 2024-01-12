<x-layoutnologin>
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-light">
							<img src="/img/logo-login.png" style="display: block;margin-left: auto;margin-right: auto;margin-top: 25%;">
						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
								</div>
								<form method="POST" action="{{route('loggear')}}" class="user">
									@csrf
									<div class="form-group">
										<input type="email" class="form-control form-control-user"
										name="email" aria-describedby="emailHelp"
										placeholder="Usuario" value="{{old('email')}}">
										@error('email')
											<small class="text-danger">{{$message}}</small>
										@enderror
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user"
										name="password" placeholder="Clave">
										@error('password')
											<small class="text-danger">{{$message}}</small>
										@enderror
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Ingresar
									</button>
									<hr>
									<a href="{{route('recuperar_clave')}}" class="btn btn-google btn-user btn-block"> Recuperar Clave
									</a>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-layoutnologin>