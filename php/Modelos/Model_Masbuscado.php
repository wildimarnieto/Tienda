<?php
	class Model_Masbuscado{
		private $db;
		private $masbuscado;
	    
		public function __construct(){
			$this->db=new Db();
			$this->masbuscado=array();
		
		}

		public function get_masbuscado(){
			$this->masbuscado=$this->db->db_select("SELECT IDJUEGO FROM `prestamo` GROUP BY IDJUEGO ORDER BY count(IDJUEGO) desc LIMIT 5");
			return $this->masbuscado;
		}

	}


?>