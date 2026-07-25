var tableTarifas;

document.addEventListener('DOMContentLoaded', function(){

    tableTarifas = $('#tableTarifas').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language":{
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"Tarifas/getTarifas",
            "dataSrc":""
        },
        "columns":[ 
            {"data": "nom_vehiculo"},
            {"data": "tarifa_minuto"},
            {"data": "tarifa_hora"},
            {"data": "tarifa_dia"},
            {"data": "options"}
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
        
    });
//Nuevo tipo de vehiculo
var formTipoVehiculo = document.querySelector("#formTipoVehiculo");
formTipoVehiculo.onsubmit = function(e) {
    e.preventDefault();
    
    var strIdUsuario = document.querySelector('#idTpVehiculo').value;
    var strNombreVehiculo = document.querySelector('#txtnomTp').value;
    if(strNombreVehiculo == '')
    {
        swal("Atención", "Todos los campos son obligatios." , "error");
        return false;
    }

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'TipoVehiculo/setTipoVehiculo';
    var formData = new FormData(formTipoVehiculo);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){

            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                $('#modalFormTipoVehiculo').modal("hide");
                formTipoVehiculo.reset();
                swal("Nuevo Vehiculo", objData.msg ,"success");
                tableTipoVehiculo.api().ajax.reload(function(){
                    ftnEditTpVehiculo();
                });
            } else {
                swal("Error", objData.msg , "error" );
            }
        }
    }
}
});

$('#tableTarifas').DataTable();

window.addEventListener('load', function () {
    ftnTpVehiculosTarifas();
}, false);

function ftnTpVehiculosTarifas(){
    var ajaxUrl = base_url+'TipoVehiculo/getSelectTpVehiculo';
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    request.open('GET',ajaxUrl,true);
    request.send();

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listTipoVehiculo').innerHTML = request.responseText;
            document.querySelector('#listTipoVehiculo').value = 1;
            $('#listTipoVehiculo').selectpicker('refresh');
        }
    }
}

function openModalTarifas(){

    /*document.querySelector('#idUsuario').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
    document.querySelector('#formUsuario').reset();*/

    $('#modalFormTarifas').modal('show');
}