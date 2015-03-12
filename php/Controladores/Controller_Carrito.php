<?php
	require ('../Modelos/Model_Carrito.php');
	
	class Controller_Carrito{

		private $carro;
		private $datos;
		
		function __construct(){
			$this->carro=new Model_Carrito();
		}

		function get_Carro(){
			$this->datos=$this->carro->get_carro();
			return $this->datos;
		}

		function set_Carro($Id, $tiempo, $pago){
			$this->datos = $this->carro->set_carro($Id, $tiempo, $pago);
			return $this->datos;
		}	

		function del_Carro(){
			$this->datos = $this->carro->del_carro();
			return $this->datos;
		}

	}

	if(!empty($_POST['JUEGO']) && !empty($_POST['TIEMPO']) && !empty($_POST['PAGO'])){
		require ('../Modelos/Db.php');
		$cont = new Controller_Carrito();
		$id=$_POST['JUEGO'];
		$tiempo=$_POST['TIEMPO'];
		$pago=$_POST['PAGO'];
		$rta = $cont->set_Carro($id, $tiempo, $pago);
		echo $rta;
	}
?>