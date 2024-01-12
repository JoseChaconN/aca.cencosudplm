<div class="modal" tabindex="-1" data-backdrop="static" data-keyboard="false" id="selectTiendaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tiendas Asignadas</h5>
            </div>
            <form method="POST" action="{{route('setTiendaUsuario')}}">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <h5>Seleccione una tienda con la cual desea trabajar.</h5>
                    </div>
                    <div class="col-md-12">
                        <label>Tienda Actual: {{session('u_codigo_tienda').' - '.session('u_nombre_tienda')}}</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tienda</label>
                            <select class="form-control" name="tienda">
                                @foreach(session('tiendas_usuario') as $tienda)
                                    <option value="{{$tienda->id}}">{{$tienda->codigo.' '.$tienda->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>