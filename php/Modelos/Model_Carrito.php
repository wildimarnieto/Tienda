<?php
class Model_Carrito{
	private $db;
	private $carro;
	
	public function __construct(){
		$this->db=new Db();
		$this->carro=array();
		
	}

	public function get_carro(){
		$this->carro=$this->db->db_select("Select * from CARRITO");
		return $this->carro;
	}


	public function set_carro($Id, $tiempo, $pago){
		$query="Insert into CARRITO (IDJUEGO, TIEMPO, PAGO) values('$Id','$tiempo', '$pago')";
		$this->carro=$this->db->db_query($query);
		return $this->carro;		
	}

	public function del_carro(){
		$query="delete from CARRITO";
		$this->carro=$this->db->db_query($query);
		return $this->carro;	
	}

}

?>