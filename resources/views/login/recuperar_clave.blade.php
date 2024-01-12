<x-layoutnologin>
	<div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-light">
								<img src="/img/logo-login.png" style="display: block;margin-left: auto;margin-right: auto;margin-top:35%;">
							</div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Recuperar Clave</h1>
                                        <p class="mb-2">Estimado Usuario</p>
                                        <p class="mb-4">
											Se enviará un link a su correo para la recuperación de su Clave.
										</p>
										<p class="mb-4 text-danger">
											<b>
											ATENCIÓN: En caso de ser usuario Tienda y no tener un email válido, el correo será enviado al supervisor/tecnólogo de su local.
											</b>
										</p>
                                    </div>
                                    <form class="user">
                                    	@csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Usuario">
                                        </div>
                                        <a href="login.html" class="btn btn-primary btn-user btn-block">
                                            Enviar Email
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">Volver Atras</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</x-layoutnologin>