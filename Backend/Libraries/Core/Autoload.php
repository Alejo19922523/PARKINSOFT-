<?php

spl_autoload_register(function ($className) {
    $basePath = __DIR__ . '/../../';

    $directories = [
        'Libraries/Core/',
        'Models/',
        'Controllers/',
        'Helpers/',
    ];

    foreach ($directories as $dir) {
        $file = $basePath . $dir . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Cargar clase base Mysql primero
require_once __DIR__ . '/Mysql.php';
?>
