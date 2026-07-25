<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUsuario" name="formUsuario">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    <div class="form-group">
                        <label class="control-label">Datos personales</label>
                        <input class="form-control" id="txtNombre1" name="txtNombre1" type="text"
                            placeholder="Primer nombre" required>
                        <input class="form-control" id="txtNombre2" name="txtNombre2" type="text"
                            placeholder="Segundo nombre">
                        <input class="form-control" id="txtApellido1" name="txtApellido1" type="text"
                            placeholder="Primer apellido" required>
                        <input class="form-control" id="txtApellido2" name="txtApellido2" type="text"
                            placeholder="Segundo apellido">
                        <input class="form-control" id="txtDocumento" name="txtDocumento" type="text"
                            placeholder="Documento" required>
                        <select class="form-control" name="intTpdocumento" id="intTpdocumento" required>
                            <option value="0">Seleccione</option>
                            <option value="1">Cedula ciudadania</option>
                            <option value="2">Cedula extranjeria</option>
                            <option value="3">Tarjeta de identidad</option>
                            <option value="4">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Datos de la cuenta de usuario</label>
                        <input class="form-control" id="txtUsuario" name="txtUsuario" type="text"
                            placeholder="Usuario opcional">
                        <input class="form-control" id="txtEmail" name="txtEmail" type="email"
                            placeholder="Ingrese email" required>
                        <input class="form-control" id="txtPassword" name="txtPassword" type="password"
                            placeholder="Contraseña" autocomplete="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Genero</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="1" name="txtGenero">Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="2" name="txtGenero">Femenino
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" value="3" name="txtGenero">Otros
                            </label>
                        </div>
                        <select class="form-control" name="intRol" id="intRol" required>
                            <option value="0">Seleccione rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                            <option value="3">Cliente</option>
                        </select>
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