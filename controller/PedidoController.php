<?php
require_once 'models/pedido.php';
class PedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia']:false; 
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:false; 
            $direccion = isset($_POST['direccion']) ? $_POST['direccion']:false; 
            $stas = Utils::statsCarrito();
            $coste = $stas['total'];

            if($provincia && $direccion && $ciudad){
                // Guardar en base de datos
                $pedido = new Pedido;
                $pedido->setUsuarioId($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($ciudad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                
                $save = $pedido->save();

                // Guardar linea pedido
                $save_lineas = $pedido->save_linea();

                if($save && $save_lineas){
                    $_SESSION['pedido'] = 'complete';
                }else{
                    $_SESSION['pedido'] = 'failed';
                }

            }else{
                    $_SESSION['pedido'] = 'failed';
                }
            header('Location:'.base_url. 'pedido/confirmado');

        }else{
            // Redirigir
            header('Location:'.base_url);
        }
    }
    
    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido;
            $pedido->setUsuarioId($identity);
            $pedido = $pedido->getOneByUser();
            $pedido_productos = new Pedido;
            $productos = $pedido_productos->getProductsByPedido($pedido->id);
            
        }
        require_once 'views/pedido/confirmado.php';
        
    }

    public function misPedidos(){
        Utils::isLoged();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido;
        // Sacar los pedidos del usuario
        $pedido->setUsuarioId($usuario_id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isLoged();
        if(isset($_GET['id'])){
            $pedido_id = $_GET['id'];

            // Sacar el pedido
            $pedido = new Pedido;
            $pedido->setId($pedido_id);

            $pedido = $pedido->getOne();

            $pedido_productos = new Pedido;
            $pedido_productos->setId($pedido_id);

            $productos_pedido = $pedido_productos->getProductsByPedido($pedido_id);
            require_once 'views/pedido/detalle.php';

        }else{
            header('Location:'. base_url.'pedido/mis_pedidos');
        }

        
    }


}




?>