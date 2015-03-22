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
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<script type="text/javascript" src="../../js/script.js"></script>
		<title>Catalogo de VideoJuegos</title>	
	</head>
 		
	<body>
		<header id='Titulo'>
			<h1>Prestamo de Videojuegos</h1>
		</header><!--Termina header del body-->
		<section id="Juegos">
			<header id='TituloJuegoSelect'>
				<h1>Carrito de compras!!!</h1>
			</header>
					<?php
						require '../Modelos/Db.php';
						require '../Controladores/Controller_Carrito.php';
						require '../Controladores/Controller_Cliente.php';
						require '../Controladores/Controller_Juegos.php';
						$clien = new Controller_Cliente();
						$carr = new Controller_Carrito();
						$jueg = new Controller_Juegos();
						$cliente = $clien->get_Cliente1($_SESSION["user"]);
						$cliente = $cliente[0];
						$datos = $carr->get_Carro();
						if(count($cliente)>0){
							foreach ($datos as &$dato) {
								$juego=$jueg->get_Juego($dato["IDJUEGO"]);
								$juego=$juego[0];
								$canti = $dato["PAGO"]/ $juego["PRECIO"];
									echo  "
										<article class='Producto'>
											<img class='ImagenJuego' src='../../".$juego["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$juego["IDJUEGO"]."></img>
											<div class='Text'>Cantidad:  ".$canti." </div>
											<div class='Text'>Valor Total: $".$dato["PAGO"]."</div>

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
					<a href='PrestamosUsuario.php' >PERFIL</a>
					<br>
					<a href='Inicio.php' >INICIO</a>
					<br>
					<a href='../Controladores/logout.php' >CERRAR SESION</a>
					
					<button type='button' id='terminar' onclick='Terminar(\"".$_SESSION["user"]."\")' style='margin-left:2%'>
						<img src='../../img/carrito.png' width='120' height='120' ></img>
					</button>


					</div>
				";

			}


		?>



	</aside>
	<footer>

	</footer>
</html>