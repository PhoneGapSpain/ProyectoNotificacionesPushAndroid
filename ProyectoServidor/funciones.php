<?php
 
class DB_Functions {
    private $db;

    function __construct() {
        include_once 'connect.php';
        // Conectando con la DB
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    function __destruct() {
    }
 
    /*---- Almacenando nuevo usuario ----*/
    public function storeUser($name, $email, $gcm_regid) {
        // Insertamos el usuario en la DB
        $result = mysql_query("INSERT INTO gcm_devices(name, email, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW())");
        // Verificamos que se insertó correctamente
        if ($result) {
            // obtenemos los detalles del usuario
            $id = mysql_insert_id(); // ultimo ID insertado
            $result = mysql_query("SELECT * FROM gcm_devices WHERE id = $id") or die(mysql_error());
            // retornamos detalles del usuario
            if (mysql_num_rows($result) > 0) {
                return mysql_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
 
    /*--- Obtenemos todos los usuarios registrados ----*/
    public function getAllUsers() {
        $result = mysql_query("SELECT * FROM gcm_devices");
        return $result;
    }
}
?>