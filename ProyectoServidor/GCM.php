<?php
class GCM {
    function __construct() {
         
    }
 
    /*--- Enviando notificaciones push ----*/
    public function send_notification($registatoin_ids, $message) {
        include_once 'config.php';
        // variable post http://developer.android.com/google/gcm/http.html#auth
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
 
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // abriendo la conexion
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Deshabilitamos soporte de certificado SSL temporalmente
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // ejecutamos el post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Cerramos la conexion
        curl_close($ch);
        echo $result;
    }
 
} 
?>