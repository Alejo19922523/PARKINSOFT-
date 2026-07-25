<?php headerAdmin($data); ?>

<!-- Modal Usuarios -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="tituloModal">Nuevo Usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Número Documento</label>
                            <input type="text" class="form-control" id="num_documento" placeholder="Número documento">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tipo Documento</label>
                            <select class="form-control" id="id_tp_documento">
                                <option value="">Seleccione...</option>
                                <option value="1">Cédula de Ciudadanía</option>
                                <option value="2">Tarjeta de Identidad</option>
                                <option value="3">Pasaporte</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Primer Nombre</label>
                            <input type="text" class="form-control" id="prim_nom" placeholder="Primer nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Segundo Nombre</label>
                            <input type="text" class="form-control" id="seg_nombre" placeholder="Segundo nombre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input type="text" class="form-control" id="prim_apellido" placeholder="Primer apellido">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input type="text" class="form-control" id="seg_apellido" placeholder="Segundo apellido">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Género</label>
                            <select class="form-control" id="id_genero">
                                <option value="">Seleccione...</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                                <option value="3">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre Usuario</label>
                            <input type="text" class="form-control" id="nom_usuario" placeholder="Nombre de usuario">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo_electronico" placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Rol</label>
                            <select class="form-control" id="id_rol">
                                <option value="">Seleccione...</option>
                                <option value="1">Administrador</option>
                                <option value="2">Operario</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardar" onclick="insertUsuario()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-users"></i> <?= $data['page_title'] ?>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalUsuarios">
                    <i class="fas fa-plus-circle"></i> Nuevo
                </button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>usuarios/index"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableUsuarios">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Tipo documento</th>
                                    <th>Genero</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
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

    