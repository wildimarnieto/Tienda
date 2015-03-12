<?php
	require ('../Modelos/Model_Categoria.php');
	

	class Controller_Categoria{
		private $categoria;
		private $datos;
		public function __construct(){
			$this->categoria=new Model_Categoria();
			$this->datos=array();
		}

		function get_Categorias(){
			$this->datos=$this->categoria->get_categorias();
			return $this->datos;
		}
	}


?>