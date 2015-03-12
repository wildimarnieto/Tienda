<?php
session_start();
if(!isset($_SESSION["user"])){
		// echo "Session is set"; // for testing purposes
		header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
 		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
		<script type="text/javascript" src="../../js/script.js"></script>
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<title>Catalogo de VideoJuegos</title>	
	</head>
 		
	<body>
		<header id='Titulo'>
			<h1>Prestamo de Videojuegos</h1>
		</header><!--Termina header del body-->
		<section id="Juegos">
			<header id='TituloJuegoSelect'>
				<h1>Historial VideoJuegos Alquilados</h1>
			</header>
					<?php
						require ('../Modelos/Db.php');
						require '../Controladores/Controller_Prestamo.php';
						require '../Controladores/Controller_Cliente.php';
						require '../Controladores/Controller_Juegos.php';
						$clien = new Controller_Cliente();
						$cont = new Controller_Prestamo();
						$jueg = new Controller_Juegos();
						$cliente = $clien->get_Cliente1($_SESSION["user"]);
						$cliente = $cliente[0];
						$datos = $cont->get_Prestamo($cliente["CEDULA"]);
						if(count($cliente)>0){
							foreach ($datos as &$dato) {
								$juego=$jueg->get_Juego($dato["IDJUEGO"]);
								$juego=$juego[0];
								$canti = $dato["PAGO"]/ $juego["PRECIO"];
									echo  "
										<article class='Producto1'>
											<img class='ImagenJuego' src='../../".$juego["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$juego["IDJUEGO"]."></img>
											<div class='Text'>Cantidad:  ".$canti." </div>
											<div class='Text'>Fecha Alquiler:  ".$dato["FECHA1"]." </div>
											<div class='Text'>Fecha Entrega:  ".$dato["FECHA2"]." </div>
											<div class='Text'>Pago realizado: $".$dato["PAGO"]."</div>
										</article>
											";
							}
						}else{
							echo"<article class='Producto'>
									<p>No ha alquilado ningun juego</p>
								</article>";
						}
					?>
		</section>
	</body>	
	<aside>
		
		<?php
			require '../Controladores/Controller_Categoria.php';
			
			$cont = new Controller_Cliente();
			
			if(isset($_SESSION["user"])){
				$datos = $cont->get_Cliente1($_SESSION["user"]);
				$datos = $datos[0];
				echo "
					<div id='infoUser'>
					USER: ".$datos['USER']."
					<br>

					<img width='80' height='80' src='../../".$datos["IMAGEN"]."''  ></img>
					<br>
					<a href='Carrito.php' >VER CARRITO</a>
					<br>
					<a href='Inicio.php' >INICIO</a>
					<br>
					<a href='../Controladores/logout.php' >CERRAR SESION</a></div>
				";

			}


		?>



	</aside>
	<footer>

	</footer>
</html>