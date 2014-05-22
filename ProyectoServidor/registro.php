<?php
 
// respuesta json
$json = array();
 
/*---- 
    Registrando el dispositivo del usuario
    guardamos el id de registro(registration id) en la tabla de usuarios
 ----*/
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["regId"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gcm_regid = $_POST["regId"]; // GCM ID de Registro
    // Guardamos lo detalles del usuario en la DB
    include_once 'funciones.php';
    include_once 'GCM.php';
 
    $db = new DB_Functions();
    $gcm = new GCM();
 
    $res = $db->storeUser($name, $email, $gcm_regid);
 
    $registatoin_ids = array($gcm_regid);
    $message = array("product" => "shirt");
 
    $result = $gcm->send_notification($registatoin_ids, $message);
 
    echo $result;
} else {
    // user details missing
}
?>
