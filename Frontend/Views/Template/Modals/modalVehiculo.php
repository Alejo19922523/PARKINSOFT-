<!-- Modal -->
<div class="modal fade" id="modalFormVehiculo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formVehiculo" name="formVehiculo">
                    <div class="form-group">
                        <label class="control-label">Datos del vehiculo</label>
                        <input class="form-control" id="txtPlaca" name="txtPlaca" type="text"
                            placeholder="Placa" required>
                        <input class="form-control" id="txtDocumento" name="txtDocumento" type="text"
                            placeholder="Numero de documento">
                            <select class="form-control" name="txtTpDocumento" id="txtTpDocumento" required>
                            <option value="0">Seleccione</option>
                            <option value="1">Cedula ciudadania</option>
                            <option value="2">Cedula extranjeria</option>
                            <option value="3">Tarjeta de identidad</option>
                            <option value="4">Pasaporte</option>
                        </select>
                        <select class="form-control" name="txtTpVehiculo" id="txtTpVehiculo" required>
                            <option value="0">Seleccione</option>
                            <option value="1">Automovil</option>
                            <option value="2">Bicicleta</option>
                            <option value="3">Motocicleta</option>
                            <option value="4">Camioneta</option>
                            <option value="5">Otro</option>
                        </select>
                        <input class="form-control" id="txtNumeroModelo" name="txtNumeroModelo" type="text"
                            placeholder="Numero modelo" required>
                        <input class="form-control" id="txtNombreArchivo" name="txtNombreArchivo" type="text"
                            placeholder="Nombre de Archivo">
                        <input class="form-control" id="txtTpArchivo" name="txtTpArchivo" type="text"
                            placeholder="Tipo de Archivo" required>
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto del Vehiculo</label>
                        <!--Esta es la parte de la foto-->
                        
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="estadoUs" id="estadoUs">
                            <option value="0">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                    </div>
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i><span
                                id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary"
                            data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>