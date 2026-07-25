<?php

// Cabeceras CORS para peticiones AJAX
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Solo poner JSON si es peticion AJAX, no cuando el navegador pide una vista HTML
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
$isJson = strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false;

if ($isAjax || $isJson) {
    header('Content-Type: application/json; charset=utf-8');
}

// Leer variables desde index.php
global $controller, $method, $params;

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . '/../../Controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerName)) {
        $obj = new $controllerName();

        if (method_exists($obj, $method)) {
            if (!empty($params)) {
                $arrParams = explode(',', $params);
                call_user_func_array([$obj, $method], $arrParams);
            } else {
                $obj->$method();
            }
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => "Método '$method' no encontrado en $controllerName"
            ]);
        }
    }
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => "Controlador '$controllerName' no encontrado"
    ]);
}
?>
