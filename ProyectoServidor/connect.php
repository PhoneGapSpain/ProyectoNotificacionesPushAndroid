<?php
  
class DB_Connect {
  
    // constructor
    function __construct() {
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Conexion a la DB
    public function connect() {
        require_once 'config.php';
        // conectando con mysql
        $conexion = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // Seleccionando nuestra DB
        mysql_select_db(DB_DATABASE);
  
        return $conexion;
    }
  
    // cerrando nuestra conexion
    public function close() {
        mysql_close();
    }
  
} 
?>