<?php 

    headerAdmin($data); 
    getModal('modalVehiculo',$data);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-users"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" onclick="openModalVehiculos();"><i class="fas fa-plus-circle"></i>
                    Nuevo </button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>usuarios"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableVehiculos">
                            <thead>
                                <tr>
                                    <th>Placa Vehiculo</th>
                                    <th>Numero Documento</th>
                                    <th>Tipo Documento</th>
                                    <th>Tipo de Vehiculo</th>
                                    <th>Modelo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>