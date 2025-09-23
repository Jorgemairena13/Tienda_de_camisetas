<?php
// Clase para la conexion a la base de datos
class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','root','tienda_ropa');  
        $db->query("SET NAMES 'UTF8'");
        return $db;
    }
}

?>