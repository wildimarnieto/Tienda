<?php
	require ('../Modelos/Model_Masbuscado.php');
	
	
	class Controller_Masbuscado{
		private $masbuscado;
		private $datos;
		private $juego;
		public function __construct(){
			$this->masbuscado=new Model_Masbuscado();
			$this->juego=new Model_Juego();
			$this->datos=array();
		}

		function get_masbuscado(){
			$this->datos=$this->masbuscado->get_masbuscado();
			return $this->datos;
		}
	}


?>