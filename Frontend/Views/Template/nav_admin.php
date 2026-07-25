<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="<?= media(); ?>images/uploads/avatar.png" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">ALEJANDRO  TELLO</p>
            <p class="app-sidebar__user-designation">Administrador</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= base_url(); ?>dashboard/index"><i class="app-menu__icon fa fa-id-badge"
                    aria-hidden="true"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>usuarios/index">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span
                    class="app-menu__label">Usuarios</span></a>
        </li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>rolesUsuarios/index">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i><span
                    class="app-menu__label">Roles Usuarios</span></a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-car" aria-hidden="true"></i><span
                    class="app-menu__label">Vehiculos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>tipoVehiculo/index"><i
                            class="icon fa fa-circle-o"></i> Tipo vehiculo</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>registroVehiculos/index"><i
                            class="icon fa fa-circle-o"></i> Registrar vehiculos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>ingresoVehiculos/index"><i
                            class="icon fa fa-circle-o"></i> Ingreso vehiculos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>salidaVehiculos/index"><i
                            class="icon fa fa-circle-o"></i> Salida vehiculos</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>tarifas/index"><i
                    class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tarifas</span></a></li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>reportes/index"><i class="app-menu__icon fa fa-file-text-o"
                    aria-hidden="true"></i><span class="app-menu__label">Reportes</span></a>
        </li>
        <li><a class="app-menu__item" href="<?= base_url(); ?>logout/index"><i class="app-menu__icon fa fa-sign-out"
                    aria-hidden="true"></i><span class="app-menu__label">Cerrar
                    sesión</span></a></li>
    </ul>
</aside>