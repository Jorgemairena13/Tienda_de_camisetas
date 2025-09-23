<?php

use LDAP\Result;

class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getImagen() {
        return $this->imagen;
    }

    // SETTERS
    public function setId($id) {
        $this->id = $this->db->real_escape_string($id);
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    public function setPassword($password) {
        // primero escapamos, luego ciframos
        $password = $this->db->real_escape_string($password);
        $this->password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
    }

    public function setRol($rol) {
        $this->rol = $this->db->real_escape_string($rol);
    }

    public function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    public function save(){
    $sql = "INSERT INTO usuarios (id, nombre, apellidos, email, password, rol, imagen) 
            VALUES (NULL, 
                    '{$this->getNombre()}', 
                    '{$this->getApellidos()}', 
                    '{$this->getEmail()}', 
                    '{$this->getPassword()}', 
                    'user', 
                    NULL);";

    $save = $this->db->query($sql);

    $result = false;
    if($save){
        $result = true;
    }
    return $result;
    }

    public function login($contrasena){
            $email = $this->email;
            
            
            $result = false;
            // Creamos la sentencia sql para sacar los datos del usuario
            $sql = "SELECT * FROM USUARIOS WHERE email = '$email' ";
            // Lanzamos la query
            $user = $this->db->query($sql);
            
            if($user->num_rows === 1){
                // Recogemos los datos del usuario en un array asociativo
                $usuario = $user->fetch_object();
                // Guardamos la contraseña del usuario para compararla con la que hay guardada
                
                $user_password = $usuario->password;
                $verify = password_verify($contrasena,$user_password);
                
                if($verify){
                    $result = $usuario;
                    return $result;
                }

            }
            
            return $result;
            
        
    }



}
?>
