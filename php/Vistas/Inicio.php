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
				<h1>Prestamo de VideoJuegos</h1>
			</header>
					<?php
						require ('../Modelos/Db.php');
						require '../Controladores/Controller_Juegos.php';
						$cont = new Controller_Juegos();
						$datos = $cont->get_Juegos();
						
						foreach ($datos as &$dato) {
							echo  "
								<article class='Producto'>
									<img class='ImagenJuego' src='../../".$dato["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$dato["IDJUEGO"]."></img>
									<div class='Text'>Cantidad:  ".$dato["CANTIDAD"]." </div>
									<div class='Text'>Precio por dia: $".$dato["PRECIO"]."</div>
								</article>
									";
						}
					?>
		</section>
	</body>	
	<aside>
		
		<?php
			require '../Controladores/Controller_Categoria.php';
			require '../Controladores/Controller_Cliente.php';
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
					<a href='PrestamosUsuario.php' >PERFIL</a>
					<br>
					<a href='../Controladores/logout.php' >CERRAR SESION</a></div>
				";

			}
			echo "<h1>CATEGORIAS</h1>
			<ul id='Categorias'>
			";
			$cate = new Controller_Categoria();
			$datos = $cate->get_Categorias();
			foreach ($datos as &$dato) {
				echo  "<li ><a href='InicioCategoria.php?ID=".$dato["ID"]."' >".$dato["DESCRIPCION"]."</a></li>";
			}

		?>
		<li ><a href='Inicio.php' >Todas</a></li>
		</ul>
		<h1>MAS ALQUILADOS</h1>
		<ul id='masquilados'>
			<?php
			     require '../Controladores/Controller_Masbuscado.php';
			     $mas = new Controller_Masbuscado();
			     $cont = new Controller_Juegos();
			     $datos = $mas->get_masbuscado();
			      foreach ($datos as &$dato) {
			      	$dato=$cont->get_Juego($dato['IDJUEGO']);
			      	$dato=$dato[0];
				  echo  "<li>
				  		<img class='ImagenJuego' src='../../".$dato["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$dato["IDJUEGO"]."></img>
				  		</li>";
			     }
			  ?>   				 
			  
		</ul> 


	</aside>
	<footer>

	</footer>
</html>