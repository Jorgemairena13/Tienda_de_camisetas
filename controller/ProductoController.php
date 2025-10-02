<?php
require_once 'models/producto.php';
class ProductoController{
    public function index(){
        $producto = new Producto;
        $productos = $producto->getRamdom(6);
        require_once 'views/producto/destacados.php';
    }

    

    public function gestion(){
        Utils::isAdmin();
        $producto = new Producto;

        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        if(isset($_POST)){
            Utils::isAdmin();
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;


            if($nombre && $descripcion && $precio && $stock && $categoria){
                $producto = new Producto;
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                
                
            }else{
                $_SESSION['producto'] = 'failed';
            }

            //  Recoger imagen
            if(isset($_FILES['imagen'])){
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" ||$mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif" ){
                if(!is_dir('uploads/images')){
                    mkdir('uploads/images',0777,true);

                }
                $producto->setImagen($filename);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }
                

                if($save){
                    $_SESSION['producto'] = 'complete';
                }else{
                    $_SESSION['producto'] = 'failed';
                }
                move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);

            }
            }
            

            

            
        }else{
            $_SESSION['producto'] = 'failed';
        }
        header("Location: ".base_url.'producto/gestion');

    }

    public function editar() {
    Utils::isAdmin();
    $edit = true;

    $id = $_GET['id'] ?? null;
    if ($id) {
        $producto = new Producto;
        $producto->setId($id);
        $pro = $producto->getOne($id);

        // Cargar la vista después de tener los datos
        require_once 'views/producto/crear.php';
    } else {
        header("Location: ". base_url.'producto/gestion');
        exit();
    }
}



    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
                $id = $_GET['id'];
                $producto = new Producto;
                $producto->setId($id);
                $delete = $producto->delete();
                if($delete){
                    $_SESSION['delete'] = 'complete';
                }else{
                    $_SESSION['delete'] = 'failed';
                }

            }else{
                $_SESSION['delete'] = 'failed';
            }
            header("Location: ". base_url.'producto/gestion');
        
        } 
    public function ver(){

        $id = $_GET['id'];
        if ($id) {
            $producto = new Producto;
            $producto->setId($id);
            $pro = $producto->getOne($id);

            // Cargar la vista después de tener los datos
            require_once 'views/producto/ver.php';
        } else {
            header("Location: ". base_url);
            
        }
        }

    } // Fin clase
    

?>