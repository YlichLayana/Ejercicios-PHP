<?php
require_once 'models/Pedido.php';
require_once 'models/Usuario.php';

class pedidoController{
	
	public function hacer(){
		
		require_once 'views/pedido/hacer.php';
	}
	
	public function add(){
		if(isset($_SESSION['identity'])){
			$usuario_id = $_SESSION['identity']->id;
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
			
			$stats = Utils::statsCarrito();
			$coste = $stats['total'];
				
			if($provincia && $localidad && $direccion){
				// Guardar datos en bd
				$pedido = new Pedido();
				$pedido->setUsuario_id($usuario_id);
				$pedido->setProvincia($provincia);
				$pedido->setLocalidad($localidad);
				$pedido->setDireccion($direccion);
				$pedido->setCoste($coste);
				
				$save = $pedido->save();
				
				// Guardar linea pedido
				$save_linea = $pedido->save_linea();
				
				if($save && $save_linea){
					$_SESSION['pedido'] = "complete";
				}else{
					$_SESSION['pedido'] = "failed";
				}
				
			}else{
				$_SESSION['pedido'] = "failed";
			}
			
			header("Location:".base_url.'pedido/confirmado');			
		}else{
			// Redigir al index
			header("Location:".base_url);
		}
	}
	
	public function confirmado(){
		if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];
			$pedido = new Pedido();
			$pedido->setUsuario_id($identity->id);
			
			$pedido = $pedido->getOneByUser();
			
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($pedido->id);
			//modificacion en clase por alberto
			unset($_SESSION['carrito']);
		}
		require_once 'views/pedido/confirmado.php';
	}
	
	//este metodo mostrara los datos de mis pedido osea el del usuario logeado
	public function mis_pedidos(){
		Utils::isIdentity();
		$usuario_id = $_SESSION['identity']->id;
		$pedido = new Pedido();
		
		// Sacar los pedidos del usuario
		$pedido->setUsuario_id($usuario_id);
		$pedidos = $pedido->getAllByUser();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function detalle(){
		Utils::isIdentity();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Sacar el pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido = $pedido->getOne();

			//Sacar el dato del usuario
			$usuario = new Usuario();
			$usuario -> setId($pedido->usuario_id);
			$usuario = $usuario->getOne();
			
			// Sacar los poductos
			$pedido_productos = new Pedido();
			$productos = $pedido_productos->getProductosByPedido($id);
			
			require_once 'views/pedido/detalle.php';
		}else{
			header('Location:'.base_url.'pedido/mis_pedidos');
		}
	}
	
	//esta funcion mostrara todos los datos de la tabla pedido en la parte de Gestionar pedidos
	// es decir mostrar el id del pedido id del usuario coste de cada pedido fecha y estado
	public function gestion(){
		Utils::isAdmin();
		$gestion = true;
		
		$pedido = new Pedido();
		$pedidos = $pedido->getAll();
		//agregre esta siguiente para invocar la funcion que me mostrara los nombres de los clientes
		$usuarios = $pedido -> usuarioByPedido();
		
		require_once 'views/pedido/mis_pedidos.php';
	}
	
	public function estado(){
		Utils::isAdmin();
		if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
			// Recoger datos form
			$id = $_POST['pedido_id'];
			$estado = $_POST['estado'];
			
			// Upadate del pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido->setEstado($estado);
			$pedido->edit();
			
			header("Location:".base_url.'pedido/detalle&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
	
	
}