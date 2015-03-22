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
				<h1>PERFIL</h1>
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

				echo"
				<article id='datos'>
				<form name='modificar' id='modificar' action='../Controladores/Controller_Cliente.php' method='post' enctype='multipart/form-data'>
				<table border=1 id='tablaDatos'>
					<tr>
						<td>
							<label>E-mail</label>
						</td>
						<td>
							<input type='text' name='email' id='email' class='input' size='32' value='".$cliente["EMAIL"]."'/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Nombre</label>
						</td>
						<td>
							<input type='text' name='nombre' id='nombre' class='input' size='32' value='".$cliente["NOMBRE"]."'  />
						</td>
					</tr>
					<tr>
						<td>
							<label>Apellido</label>
						</td>
						<td>
							<input type='text' name='apellido' id='apellido' class='input' size='32' value='".$cliente["APELLIDO"]."' />
						</td>
					</tr>
					<tr>
						<td>
							<label>Cedula</label>
						</td>
						<td>
							<input type='text' name='cedula' id='cedula' class='input' value='".$cliente["CEDULA"]."' size='32' readonly='readonly'/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Telefono</label>
						</td>
						<td>
							<input type='text' name='telefono' id='telefono' class='input' value='".$cliente["TELEFONO"]."' size='32' />
						</td>
					</tr>
					<tr>
						<td>
							<label>Usuario</label>
						</td>
						<td>
							<input type='text' name='user' id='user' class='input' value='".$cliente["USER"]."'  size='15' />
						</td>
					</tr>
					<tr>
						<td>
							<label>Contraseña</label>
						</td>
						<td>
							<input type='password' name='pass' id='pass' class='input' value='".$cliente["PASS"]."' size='15' />
						</td>
					</tr>
					<tr>
						<td>
							<label>Imagen de perfil</label>
						</td>
						<td>
							<input name='imagen' id='imagen' type='file'> 
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='modificar' id='modificar' class='button' value='Actualizar Datos' /></td>
					</tr>
				</table>
				</form>
			</article>

				";
			?>
			
			
			<h1 class='Text'>Historial de juegos alquilados</h1>
			<hr>
					<?php
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