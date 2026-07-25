<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'parkingsoft');
    define('BASE_URL', 'http://localhost/parkingsoft/');

    // Configuración del servicio de reconocimiento de placas (Plate Recognizer)
    // Reemplaza 'TU_API_KEY_AQUI' con tu API key real de https://platerecognizer.com/
    define('PLATE_RECOGNIZER_API_KEY', 'TU_API_KEY_AQUI');
    define('PLATE_RECOGNIZER_URL', 'https://api.platerecognizer.com/v1/plate-reader/');
    define('PLATE_RECOGNIZER_REGION', 'co'); // Colombia
?>
