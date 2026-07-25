<!-- Modal -->
<div class="modal fade" id="modalFormTarifas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva Tarifa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTarifas" name="formTarifas">
                    <input type="hidden" id="idTarifa" name="idTarifa" value="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="listTipoVehiculo">Tipo Vehiculo</label>
                            <select  id="listTipoVehiculo" name="listTipoVehiculo" required></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="floatTarifaMinuto">Tarifa Minuto</label>
                            <input class="form-control" type="text" id="floatTarifaMinuto" name="floatTarifaMinuto" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="floatTarifaHora">Tarifa Hora</label>
                            <input class="form-control" type="text" id="floatTarifaHora" name="floatTarifaHora" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="floatTarifaDia">Tarifa Día</label>
                            <input class="form-control" type="text" id="floatTarifaDia" name="floatTarifaDia" required>
                        </div>
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