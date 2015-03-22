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

	public function get_juego1($nombre){
		$this->juegos=$this->db->db_select("Select * from JUEGO where NOMBRE='".$nombre."';");
		return $this->juegos;
	}
        function mod_Juego($id,$nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria){
			$query="Update juego set NOMBRE='$nombre',DESCRIPCION=$descripcion, CANTIDAD=$cantidad,PRECIO= $precio,PLATAFORMA= $plataforma,IMAGEN=$imagen,VIDEO=$video,IDCATEGORIA=$categoria,  where IDJUEGO=".$id."";
			$this->juegos=$this->db->db_query($query);
			return $this->juegos;
		}

	public function set_juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria){
		$query="Insert into JUEGO (NOMBRE, DESCRIPCION, CANTIDAD, PRECIO, PLATAFORMA, IMAGEN, VIDEO, IDCATEGORIA) values('$nombre','$descripcion','$cantidad','$precio','$plataforma','$imagen','$video','$categoria');";
		$this->juegos=$this->db->db_query($query);
		return $this->juegos;		
	}

	public function mod_cant_juego($id, $cantidad){
		$query="Update juego set CANTIDAD='$cantidad' where IDJUEGO=".$id." ;";
		$this->juegos=$this->db->db_query($query);
		return $this->juegos;		
	}
        function del_juego($id){
			$query="Delete from juego where IDJUEGO=".$id.";";
			$this->juegos=$this->db->db_query($query);
			return $this->juegos;
		}

}

?>