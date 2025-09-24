<?php
class Producto {
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct() {
        $this->db = Database::connect(); // inicializamos la conexión
        if (!$this->db) {
            die("Error: No se pudo conectar a la base de datos");
        }
    }

    // ID
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = (int)$id; // Cast a entero por seguridad
    }

    // Categoria_id
    public function getCategoria_id() {
        return $this->categoria_id;
    }
    public function setCategoria_id($categoria_id) {
        $this->categoria_id = (int)$categoria_id; // Cast a entero
    }

    // Nombre
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    // Descripcion
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    // Precio
    public function getPrecio() {
        return $this->precio;
    }
    public function setPrecio($precio) {
        $this->precio = (float)$precio; // Cast a float
    }

    // Stock
    public function getStock() {
        return $this->stock;
    }
    public function setStock($stock) {
        $this->stock = (int)$stock; // Cast a entero
    }

    // Oferta
    public function getOferta() {
        return $this->oferta;
    }
    public function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    // Fecha
    public function getFecha() {
        return $this->fecha;
    }
    public function setFecha($fecha) {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    // Imagen
    public function getImagen() {
        return $this->imagen;
    }
    public function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
}

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return $productos;
    }

    public function save(){
    $sql = "INSERT INTO productos (id, categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) 
        VALUES (NULL, 
                '{$this->getCategoria_id()}', 
                '{$this->getNombre()}', 
                '{$this->getDescripcion()}', 
                '{$this->getPrecio()}', 
                '{$this->getStock()}', 
                null, 
                CURDATE(),
                '{$this->getImagen()}');";

    $save = $this->db->query($sql);

    $result = false;
    if($save){
        $result = true;
    }
    return $result;
    }


} //Fin clase


?>

