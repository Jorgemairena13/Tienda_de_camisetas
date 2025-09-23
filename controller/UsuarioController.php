<?php
require_once 'models/usuario.php';
class UsuarioController{
    public function index(){
        // Renderizar vista
        
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
        
    }

    public function save(){
        
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; 
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($nombre && $apellidos && $email && $password){
                // Creamos el objeto usuario y le damos los nombres de las variables que hemos recogido por post
                $usuario = new Usuario;
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                // Guardar datos de usuario
                $save = $usuario->save();
                
                if($save){
                    $_SESSION['register'] ='complete';
                }else{
                    $_SESSION['register'] ='failed';
                }
                

            }else{
                $_SESSION['register'] = 'failed';
            }

            

        }else{
            echo 'Hemos llegado';
            $_SESSION['register'] ='failed';
        }
        header("Location:".base_url.'usuario/registro');
    }

    public function login(){
        if(isset($_POST)){
            // Indetificamos al usuario
            // Guardamos los datos que nos llegan por post
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena']: false;
            // Consulta a la base de datos
            $usuario = new Usuario;
            $usuario->setEmail($email);
            $identity = $usuario->login($contrasena);

            if($identity && is_object($identity)){
                
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'identificacion fallida!!';
            }
            // Crear sesion
        }

        
        header('Location: '.base_url);

    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
            
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
            
        }

        header("Location: ".base_url);

    }
    
} // Fin clase
?>