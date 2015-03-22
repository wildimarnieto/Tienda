<?php
require ("../Modelos/Model_Prestamo.php");

class Controller_Prestamo{

		private $prestamo;
		private $datos;
		
		function __construct(){
			$this->prestamo=new Model_Prestamo();
		}

		function get_Prestamo($cliente){
			$this->datos=$this->prestamo->get_prestamo($cliente);
			return $this->datos;
		}

		function set_Prestamo($fecha1, $fecha2, $pago, $cliente, $juego){
			$this->datos = $this->prestamo->set_prestamo($fecha1, $fecha2, $pago, $cliente, $juego);
			return $this->datos;
		}
}

if(!empty($_POST['CARRITO'])){
	
	require ("../Modelos/Db.php");
	require ("../Modelos/Model_Carrito.php");
	require ("../Modelos/Model_Juego.php");

	$carrito=new Model_Carrito(); 
	$jueg=new Model_Juego();

	$Cjuegos=$carrito->get_carro();


	foreach ($Cjuegos as $juego) {
		$idjuego=$juego['IDJUEGO'];
		$juegos=$jueg->get_juego($idjuego);
		$juegos=$juegos[0];
		$cantidad=intval($juegos["CANTIDAD"]);
		$jueg->mod_cant_juego($idjuego,$cantidad);
		$user=$_POST['CARRITO'];
		$tiempo=$juego['TIEMPO'];
		$pago=$juego['PAGO'];
		$fecha1=strtotime("now");
		$fecha2=strtotime("+".$tiempo." days", $fecha1);
		$pres = new Controller_Prestamo();
		$rta=$pres->set_Prestamo($fecha1, $fecha2, $pago, $user, $idjuego);
		echo $rta;
	}
	$carrito->del_carro();
	
}

?>