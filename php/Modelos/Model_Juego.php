<?php
class Model_Juego{
	private $db;
	private $juegos;
	
	public function __construct(){
		$this->db=new Db();
		$this->juegos=array();
		
	}

	public function get_juegos(){
		$this->juegos=$this->db->db_select("Select * from JUEGO");
		return $this->juegos;
	}

	public function get_juego($id){
		$this->juegos=$this->db->db_select("Select * from JUEGO where IDJUEGO=".$id.";");
		return $this->juegos;
	}

	public function set_juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria){
		$query="Insert into JUEGO (NOMBRE, DESCRIPCION, CANTIDAD, PRECIO, PLATAFORMA, IMAGEN, VIDEO, IDCATEGORIA) values('$nombre','$descripcion','$cantidad','$precio','$plataforma','$imagen','$video','$categoria');";
		$this->juegos=$this->db->db_query($query);
		return $this->juegos;		
	}

}

?>