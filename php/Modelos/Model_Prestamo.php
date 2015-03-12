<?php
class Model_Prestamo{
	private $db;
	private $prestamo;
	
	public function __construct(){
		$this->db=new Db();
		$this->prestamo=array();
		
	}

	public function set_prestamo($fecha1, $fecha2, $pago, $cliente, $juego){
		$IDCLIENTE=$this->db->db_select("select CEDULA from CLIENTE where USER='".$cliente."';");
		$id=$IDCLIENTE[0];
		$query = "Insert into PRESTAMO (FECHA1, FECHA2, PAGO, IDCLIENTE, IDJUEGO) values (FROM_UNIXTIME('$fecha1'),FROM_UNIXTIME('$fecha2'),'$pago',".$id["CEDULA"].",'$juego');";
		$this->prestamo=$this->db->db_query($query);
		$CANTIDAD=$this->db->db_select("select CANTIDAD from JUEGO where IDJUEGO='$juego';");
		$cant=$CANTIDAD[0];
		$cant=$cant["CANTIDAD"];
		$cant--;
		$query = "Update JUEGO set CANTIDAD='$cant' where IDJUEGO='$juego';";
		$this->prestamo=$this->db->db_query($query);
		return $this->prestamo;
	}

	public function get_prestamo($cliente){
		$this->prestamo=$this->db->db_select("Select * from PRESTAMO where IDCLIENTE=".$cliente.";");
		return $this->prestamo;
	}

}

?>