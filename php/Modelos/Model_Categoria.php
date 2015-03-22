<?php
	class Model_Categoria{
		private $db;
		private $categorias;
	
		public function __construct(){
			$this->db=new Db();
			$this->categorias=array();
		
		}

		public function get_categorias(){
			$this->categorias=$this->db->db_select("Select * from CATEGORIA");
			return $this->categorias;
		}

		function set_categoria($id, $descripcion){
			$query="Insert into CATEGORIA values (".$id.",'$descripcion');";
			$this->cateorias=$this->db->db_query($query);
			return $this->categorias;
		}

		function mod_categoria($id, $descripcion){
			$query="Update CATEGORIA set DESCRIPCION='$descripcion' where ID=".$id."";
			$this->cateorias=$this->db->db_query($query);
			return $this->categorias;
		}

		function del_categoria($id){
			$query="Delete from CATEGORIA where ID=".$id.";";
			$this->cateorias=$this->db->db_query($query);
			return $this->categorias;
		}

	}


?>