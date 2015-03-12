<?php
session_start();
if(!isset($_SESSION["user"])){
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
			<h1>Nuevo Videojuego</h1>
		</header><!--Termina header del body-->
		<section id="NJuegos">
			<article id='NuevoJuego'>
				<form name="registroform" id="registroform" action="../Controladores/Controller_Juegos.php" method="post" enctype="multipart/form-data">
					<p>
						<label >Nombre<br />
						<input type="text" name="nombre" id="nombre" class="input" size="32" value=""  /></label>
					</p>
					<p>
						<label >Descripcion<br />
						<input type="text" name="descripcion" id="descripcion" class="input" size="32" value=""  /></label>
					</p>		
					<p>
						<label >Cantidad<br />
						<input type="number" name="cantidad" id="cantidad" class="input" value="" size="32" /></label>
					</p>	
					<p>
						<label >Precio<br />
						<input type="number" name="precio" id="precio" class="input" value="" size="32" /></label>
					</p>
					<p>
						<label >Plataforma<br />
						<input type="text" name="plataforma" id="plataforma" class="input" value="" size="32" /></label>
					</p>
					<p>
						<label >Imagen<br />
						<input type="file" name="imagen" /></label>
					</p>
					<p>						
						<label >Video<br />
						<img src='../../img/youtube.jpg'></img><br>
						<input type="text" name="video" id="video" class="input" value="" size="32" /></label>
					</p>	
					<p>
						<label >Categoria<br />
						<input type="text" name="categoria1" list="categoria" id='categoria1'>
							<datalist id='categoria' >
   								<option value='1'>Deportes</option>
   								<option value='2'>Accion</option>
   								<option value='3'>Aventura</option>
							</datalist>
						</input>
					</p>
					<p class="submit">
						<input type="submit" name="registrar" id="registrar" class="button" value="Crear Juego" />
					</p>
				</form>	
			</article>			
		</section>
	</body>	
	<aside>
		
		<?php
			require '../Controladores/Controller_Categoria.php';
			if(isset($_SESSION["user"])){
				echo "
					<div id='infoUser'>USER: ".$_SESSION['user']."
					<br>
					<a href='../Controladores/logout.php' >CERRAR SESION</a></div>
				";

			}
		?>
		</ul>
	</aside>
	<footer>

	</footer>
</html>