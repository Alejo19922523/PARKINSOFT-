
<?php headerAdmin($data); ?>

<!-- Modal Tarifas -->
<div class="modal fade" id="modalTarifas" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title">Nueva Tarifa</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo Vehículo</label>
                            <select class="form-control" id="id_tp_vehiculo">
                                <option value="">Seleccione...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tarifa por Minuto</label>
                            <input type="number" class="form-control" id="tarifa_minuto" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tarifa por Hora</label>
                            <input type="number" class="form-control" id="tarifa_hora" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tarifa Diaria</label>
                            <input type="number" class="form-control" id="tarifa_diaria" placeholder="0.00">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="insertTarifa()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-users"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalTarifas">
                    <i class="fas fa-plus-circle"></i> Nuevo
                </button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>tarifas/index"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableTarifas">
                            <thead>
                                <tr>
                                    <th>Tipo Vehiculo</th>
                                    <th>Tarifa minuto</th>
                                    <th>Tarifa hora</th>
                                    <th>Tarifa diaria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>