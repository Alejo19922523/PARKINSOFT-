var tableTipoVehiculo;

document.addEventListener('DOMContentLoaded', function() {

    tableTipoVehiculo = $('#tableTipoVehiculo').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": base_url + "tipoVehiculo/selectTipoVehiculos",
            "dataSrc": "data"
        },
        "columns": [
            { "data": "id_tp_vehiculo" },
            { "data": "nom_vehiculo" },
            {
                "data": null,
                "render": function(data, type, row) {
                    return `
                        <button class="btn btn-sm btn-info btnEditTpVehiculo" data-id="${row.id_tp_vehiculo}">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btnDelTpVehiculo" data-id="${row.id_tp_vehiculo}">
                            <i class="fa fa-trash"></i>
                        </button>`;
                }
            }
        ],
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    });

    // Editar
    $('#tableTipoVehiculo tbody').on('click', '.btnEditTpVehiculo', function() {
        var id = $(this).data('id');
        $.get(base_url + 'tipoVehiculo/selectTpVehiculo/' + id, function(res) {
            if (res.status === 'success') {
                $('#id_tp_vehiculo').val(res.data[0].id_tp_vehiculo);
                $('#nom_vehiculo').val(res.data[0].nom_vehiculo);
                $('#tituloModal').text('Editar Tipo Vehículo');
                $('#modalTipoVehiculo').modal('show');
            }
        });
    });

    // Eliminar
    $('#tableTipoVehiculo tbody').on('click', '.btnDelTpVehiculo', function() {
        var id = $(this).data('id');
        if (confirm('¿Deseas eliminar este tipo de vehículo?')) {
            $.ajax({
                url: base_url + 'tipoVehiculo/deleteTipoVehiculo/' + id,
                type: 'DELETE',
                success: function(res) {
                    if (res.status === 'success') {
                        alert(res.message);
                        tableTipoVehiculo.ajax.reload();
                    } else {
                        alert(res.message);
                    }
                }
            });
        }
    });
});

function insertTpVehiculo() {
    var nom_vehiculo = $('#nom_vehiculo').val();
    var id = $('#id_tp_vehiculo').val();

    if (nom_vehiculo === '') {
        alert('El nombre del vehículo es obligatorio');
        return;
    }

    if (id !== '') {
        $.ajax({
            url: base_url + 'tipoVehiculo/updateTpVehiculo',
            type: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify({ id_tp_vehiculo: id, nom_vehiculo: nom_vehiculo }),
            success: function(res) {
                if (res.status === 'success') {
                    $('#modalTipoVehiculo').modal('hide');
                    tableTipoVehiculo.ajax.reload();
                    alert(res.message);
                } else {
                    alert(res.message);
                }
            }
        });
    } else {
        $.ajax({
            url: base_url + 'tipoVehiculo/insertTpVehiculo',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ nom_vehiculo: nom_vehiculo }),
            success: function(res) {
                if (res.status === 'success') {
                    $('#modalTipoVehiculo').modal('hide');
                    $('#nom_vehiculo').val('');
                    tableTipoVehiculo.ajax.reload();
                    alert(res.message);
                } else {
                    alert(res.message);
                }
            }
        });
    }
}