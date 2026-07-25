<!-- Modal -->
<div class="modal fade" id="modalFormTipoVehiculo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo tipo de Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTipoVehiculo" name="formTipoVehiculo">
                    <input type="hidden" id="idTpVehiculo" name="idTpVehiculo" value="">
                    <div class="form-group">
                        <label class="control-label">Datos tipo de vehiculo</label>
                        <input class="form-control" id="txtnomTp" name="txtnomTp" type="text"
                            placeholder="Nombre vehiculo" required>
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