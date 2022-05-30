<?php

class Categoria{
	private $id;
	private $nombre;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	//He realizado cambios en esta funcion para poder obtener todos los dato solicitado en el crud
	public function getAll(){
		
		/*$categorias=$this->db->query("SELECT c.id, c.nombre, p.categoria_id, sum(p.stock) AS stock, sum(p.precio) AS total FROM categorias c, productos p WHERE c.id=p.categoria_id GROUP by c.id ORDER BY c.id DESC;");*/
		
		$categorias = $this->db->query("SELECT c.id, c.nombre, (SELECT sum(stock) FROM productos WHERE categoria_id = c.id) AS 'stock', (SELECT sum(precio) FROM productos WHERE categoria_id = c.id) AS 'total' FROM categorias c ORDER by id DESC;");

		
		return $categorias;
	}
	
	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	//agregue funcion editar categoria
	public function edit(){
		$sql = "UPDATE categorias SET nombre='{$this->getNombre()}' ";

		$sql .= " WHERE id={$this->id};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	//Tambien he agregado esta funcion para poder borrar un dato de categoria de la tabla o bbdd
	public function delete(){
		$sql = "DELETE FROM categorias WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}


	
}