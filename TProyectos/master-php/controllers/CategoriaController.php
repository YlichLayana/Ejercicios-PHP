<?php
require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}
	
	//esta funcion sirve solo para guardar una categoria nueva
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['nombre'])){
			// Guardar la categoria en bd
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();
		}

		if ($save) {
			$_SESSION['creaCate'] = "complete";
		}
		else{
			$_SESSION['creaCate'] = 'failed';
		}
		header("Location:".base_url."categoria/index");
	}

	//agrego esta funcion para editar la categoria
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$categoria = new Categoria();
			$categoria->setId($id);
			
			$cate = $categoria->getOne();
			
			require_once 'views/categoria/crear.php';
			
		}else{
			header('Location:'.base_url.'Categoria/index');
		}
	}

	//agregue esta funcion para eliminar 
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$categoria = new Categoria();
			$categoria->setId($id);
			
			$delete = $categoria->delete();
			if($delete){
				$_SESSION['deleteCate'] = 'complete';
			}else{
				$_SESSION['deleteCate'] = 'failed';
			}
		}else{
			$_SESSION['deleteCate'] = 'failed';
		}	
		header('Location:'.base_url.'Categoria/index');
	}

	//Esta funcion sera para guarda cuando se cambie el nombre de una categoria 
	public function saveEditado()
	{
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;

			if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
				if ($nombre) {
					$categoria = new Categoria();
					$categoria->setNombre($nombre);

					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						$categoria->setId($id);
						$cambiado = $categoria->edit();
					}

					if ($cambiado) {
						$_SESSION['editeCate'] = "complete";
					}
				} else {
					$_SESSION['editeCate'] = "failed";
				}
			} 
		}
			header("Location:" . base_url . 'categoria/index'); 
	}
	
}