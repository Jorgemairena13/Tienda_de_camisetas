<?php
require_once 'models/categoria.php';
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