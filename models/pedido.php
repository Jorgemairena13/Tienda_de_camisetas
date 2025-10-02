<?php

use LDAP\Result;

class Pedido
{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect(); // inicializamos la conexión
        if (!$this->db) {
            die("Error: No se pudo conectar a la base de datos");
        }
    }


    // ID
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    // Usuario ID
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }
    public function setUsuarioId($usuario_id)
    {
        if (is_object($usuario_id)) {
            $this->usuario_id = (int)$usuario_id->id;
        } else {
            $this->usuario_id = (int)$usuario_id;
        }
    }

    // Provincia
    public function getProvincia()
    {
        return $this->provincia;
    }
    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    // Localidad
    public function getLocalidad()
    {
        return $this->localidad;
    }
    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    // Dirección
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    // Coste
    public function getCoste()
    {
        return $this->coste;
    }
    public function setCoste($coste)
    {
        $this->coste = $coste;
    }

    // Estado
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    // Fecha
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    // Hora
    public function getHora()
    {
        return $this->hora;
    }
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC;");
        return $productos;
    }


    public function getOne()
    {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()};");
        return $producto->fetch_object();
    }

    public function getOneByUser()
    {
        $sql = "SELECT p.id,p.coste FROM pedidos as p  "
            . "WHERE p.usuario_id={$this->getUsuarioId()} ORDER BY p.id DESC LIMIT 1 ;";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getProductsByPedido($pedido_id)
    {

        $sql = "SELECT pr.*,lp.unidades FROM productos pr "
            . "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
            . "where lp.pedido_id={$pedido_id}";
        $productos = $this->db->query($sql);

        return $productos;
    }



    public function save()
    {
        $sql = "INSERT INTO pedidos (id, usuario_id, provincia, localidad, direccion, coste, estado, fecha, hora) 
            VALUES (NULL, 
                    '{$this->getUsuarioId()}', 
                    '{$this->getProvincia()}', 
                    '{$this->getLocalidad()}', 
                    '{$this->getDireccion()}', 
                    '{$this->getCoste()}', 
                    'confirm', 
                    CURDATE(),
                    CURTIME());";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as pedido;";
        $query = $this->db->query($sql);

        if (!$query) return false;

        $pedido_id = (int)$query->fetch_object()->pedido;

        $result = false;

        foreach ($_SESSION['carrito'] as $elemento) {
            $productoId = (int)$elemento['id_producto'];
            $unidades   = (int)$elemento['unidades'];

            $insert = "INSERT INTO lineas_pedidos (id, pedido_id, producto_id, unidades)
            VALUES (NULL, {$pedido_id}, {$productoId}, {$unidades});";

            $save = $this->db->query($insert);

            if (!$save) return false; // si falla alguna inserción devolvemos false
            $result = true;
        }

        return $result;
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedidos as p  "
            . "WHERE p.usuario_id={$this->getUsuarioId()} ORDER BY p.id DESC  ;";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function updateOne()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
        $sql .= " WHERE id={$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }
        return $result;
    }
} //Fin clase
