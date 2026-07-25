<?php
require_once __DIR__ . '/../Config/Config.php';
require_once __DIR__ . '/../Helpers/Helpers.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?= media(); ?>images/uploads/favicon.ico">
    <title>Login - PARKINGSOFT EVOLUTIONS</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-light bg-faded">
    <a class="navbar-brand" href="#">
      <img src="<?= media(); ?>images/uploads/icono.png" width="30" height="30" class="d-inline-block align-top" alt="Parkingsoft">
    </a>
  </nav>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>PARKINGSOFT</h1>
      </div>
      <div class="login-box">
        <form class="login-form" id="loginForm">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>iniciar session</h3>
          <div id="loginAlert" class="alert alert-danger" style="display:none;"></div>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" id="inputUsuario" type="text" placeholder="Usuario o email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contrasena</label>
            <input class="form-control" id="inputPassword" type="password" placeholder="Contrasena">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Recuerdame</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste tu contrasena?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="button" id="btnLogin" class="btn btn-primary btn-block">
              <i class="fa fa-sign-in fa-lg fa-fw"></i>Ingresar
            </button>
          </div>
        </form>
        <form class="forget-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste tu contrasena?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button type="button" class="btn btn-primary btn-block">
              <i class="fa fa-unlock fa-lg fa-fw"></i>Recuperar
            </button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0">
              <a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar a Login</a>
            </p>
          </div>
        </form>
      </div>
    </section>
    <script src="<?= media(); ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>js/popper.min.js"></script>
    <script src="<?= media(); ?>js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>js/main.js"></script>
    <script src="<?= media(); ?>js/plugins/pace.min.js"></script>
    <script>
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });

      $('#btnLogin').click(function() {
        var usuario  = $('#inputUsuario').val().trim();
        var password = $('#inputPassword').val();
        var alerta   = $('#loginAlert');

        if (!usuario || !password) {
          alerta.text('Por favor completa todos los campos.').show();
          return;
        }

        $('#btnLogin').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Ingresando...');
        alerta.hide();

        $.ajax({
          url: '<?= BASE_URL; ?>?url=login/login',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({ usuario: usuario, password: password }),
          success: function(res) {
            if (typeof res === 'string') {
              try { res = JSON.parse(res.trim()); } catch(e) {}
            }
            if (res.status === 'success') {
              localStorage.setItem('ps_user', JSON.stringify(res.data));
              window.location.href = '<?= BASE_URL; ?>?url=dashboard/index';
            } else {
              alerta.text(res.message || 'Error al iniciar sesion').show();
              $('#btnLogin').prop('disabled', false).html('<i class="fa fa-sign-in fa-lg fa-fw"></i>Ingresar');
            }
          },
          error: function(x) {
            try {
              var res = JSON.parse(x.responseText.trim());
              if (res.status === 'success') {
                localStorage.setItem('ps_user', JSON.stringify(res.data));
                window.location.href = '<?= BASE_URL; ?>?url=dashboard/index';
                return;
              }
            } catch(e) {}
            alerta.text('No se pudo conectar con el servidor.').show();
            $('#btnLogin').prop('disabled', false).html('<i class="fa fa-sign-in fa-lg fa-fw"></i>Ingresar');
          }
        });
      });

      $('#inputPassword').keypress(function(e) {
        if (e.which === 13) $('#btnLogin').click();
      });
    </script>
  </body>
</html>