<?php headerAdmin($data); ?>

<input type="hidden" id="id_tp_vehiculo" value="">

<div class="modal fade" id="modalTipoVehiculo" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="tituloModal">Nuevo Tipo Vehículo</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nombre Vehículo</label>
                            <input type="text" class="form-control" id="nom_vehiculo" placeholder="Nombre del tipo de vehículo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="insertTpVehiculo()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-car"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalTipoVehiculo"
                    onclick="$('#id_tp_vehiculo').val(''); $('#nom_vehiculo').val(''); $('#tituloModal').text('Nuevo Tipo Vehículo');">
                    <i class="fas fa-plus-circle"></i> Nuevo
                </button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>tipoVehiculo/index"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableTipoVehiculo">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
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