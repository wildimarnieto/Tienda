<?php



class Model_Cliente{
	private $db;
	private $clientes;
	
	public function __construct(){
		$this->db=new Db();
		$this->clientes=array();
		
	}

	public function set_cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass){
		$imagen= 'img_clientes/defecto.jpg';
		$query = "Insert into CLIENTE (CEDULA, NOMBRE, APELLIDO, TELEFONO, IMAGEN, EMAIL, USER, PASS) values ('$cedula','$nombre','$apellido','$telefono', '$imagen', '$email', '$user','$pass');";
		$this->clientes=$this->db->db_query($query);
		return $this->clientes;
	}

	public function mod_cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass, $imagen){
		$query="Update CLIENTE set CEDULA='$cedula' , NOMBRE='$nombre', APELLIDO='$apellido', TELEFONO='$telefono', EMAIL='$email', USER='$user', PASS='$pass', IMAGEN='$imagen'  where CEDULA='$cedula' ; ";
		$this->clientes=$this->db->db_query($query);
		return $this->clientes;	
	}

	public function get_clientes(){
		$this->clientes=$this->db->db_select("Select * from CLIENTE");
		return $this->clientes;
	}

	public function get_cliente($id){
		$this->cliente=$this->db->db_select("Select * from CLIENTE where CEDULA=".$id.";");
		return $this->cliente;
	}

	public function get_cliente1($user){
		$this->cliente=$this->db->db_select("Select * from CLIENTE where USER='".$user."';");
		return $this->cliente;
	}

}

?>