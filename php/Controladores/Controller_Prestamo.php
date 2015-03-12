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

if(!empty($_POST['JUEGO']) && !empty($_POST['USER']) && !empty($_POST['TIEMPO']) && !empty($_POST['PAGO'])) {
	require ("../Modelos/Db.php");
	$idjuego=$_POST['JUEGO'];
	$user=$_POST['USER'];
	$tiempo=$_POST['TIEMPO'];
	$pago=$_POST['PAGO'];
	$fecha1=strtotime("now");
	$fecha2=strtotime("+".$tiempo." days", $fecha1);
	$pres = new Controller_Prestamo();
	$rta=$pres->set_Prestamo($fecha1, $fecha2, $pago, $user, $idjuego);
	echo $rta;

}

?>