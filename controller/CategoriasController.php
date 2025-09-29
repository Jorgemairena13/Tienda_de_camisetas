<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriasController{
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria;
        $categorias = $categoria->getAll();
        
        require_once 'views/categoria/index.php'; 
    }
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function ver(){
        
        if(isset($_GET['id'])){
            
            $id = $_GET['id'];
            // Consegir categoria
            $categoria = new Categoria;
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            // Conseguir productos
            $producto = new Producto;
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            
        }
        require_once 'views/categoria/ver.php';
    }

    public function save(){
        Utils::isAdmin();
        
        // Guardar categoria
        $categoria = new Categoria;
        if(isset($_POST['nombre'])){
    
            $nombre = $_POST['nombre'];
            $categoria->setNombre($nombre);
            $save= $categoria->save();
        }

        header("Location: ".base_url."categorias/index");
    }
}
?>