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

	}


?>