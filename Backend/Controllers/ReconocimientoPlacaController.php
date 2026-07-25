<?php

class ReconocimientoPlacaController
{
    // POST /reconocimientoPlaca/reconocerPlaca
    // Recibe una imagen (form-data, campo "imagen") y devuelve la placa detectada
    public function reconocerPlaca()
    {
        // 1. Validar que llegó un archivo
        if (empty($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
            response('error', [], 'No se recibió ninguna imagen válida');
            return;
        }

        $archivoTmp = $_FILES['imagen']['tmp_name'];

        // 2. Validar tipo de archivo (evita subir cualquier cosa al API externo)
        $tiposPermitidos = ['image/jpeg', 'image/png'];
        $tipoArchivo = mime_content_type($archivoTmp);

        if (!in_array($tipoArchivo, $tiposPermitidos, true)) {
            response('error', [], 'Formato no soportado. Usa una imagen JPG o PNG');
            return;
        }

        // 3. Validar que la API key ya fue configurada
        if (PLATE_RECOGNIZER_API_KEY === 'TU_API_KEY_AQUI') {
            response('error', [], 'Falta configurar PLATE_RECOGNIZER_API_KEY en Backend/Config/Config.php');
            return;
        }

        // 4. Armar y enviar la petición a Plate Recognizer
        $curlFile = new CURLFile($archivoTmp, $tipoArchivo, $_FILES['imagen']['name']);

        $ch = curl_init(PLATE_RECOGNIZER_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Token ' . PLATE_RECOGNIZER_API_KEY
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'upload'  => $curlFile,
            'regions' => PLATE_RECOGNIZER_REGION
        ]);

        $respuesta   = curl_exec($ch);
        $httpCode    = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errorCurl   = curl_error($ch);
        curl_close($ch);

        // 5. Manejo de errores de conexión
        if ($respuesta === false) {
            response('error', [], 'No se pudo conectar con el servicio de reconocimiento: ' . $errorCurl);
            return;
        }

        $json = json_decode($respuesta, true);

        if ($httpCode !== 200 && $httpCode !== 201) {
            $mensaje = $json['detail'] ?? 'El servicio de reconocimiento respondió con un error';
            response('error', [], $mensaje);
            return;
        }

        // 6. Sin placas detectadas
        if (empty($json['results'])) {
            response('empty', [], 'No se detectó ninguna placa en la imagen. Intenta con una foto más clara');
            return;
        }

        // 7. Tomamos el resultado con mayor confianza (score) que Plate Recognizer ya ordena de mayor a menor
        $mejorResultado = $json['results'][0];

        $placa     = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $mejorResultado['plate'] ?? ''));
        $confianza = isset($mejorResultado['score']) ? round($mejorResultado['score'] * 100, 1) : null;

        if ($placa === '') {
            response('empty', [], 'No se pudo interpretar la placa detectada');
            return;
        }

        response('success', [
            'placa'     => $placa,
            'confianza' => $confianza
        ], 'Placa reconocida correctamente');
    }
}
