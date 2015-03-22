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
			<h1>CRUD CATEGORIAS</h1>
		</header><!--Termina header del body-->
		<?php
			require ('../Modelos/Db.php');
			require ('../Controladores/Controller_Categoria.php');
			$categorias= new Controller_Categoria();
			$categorias=$categorias->get_Categorias();

		?>
		<section id="NJuegos">
			<article class="CRCategoria">

				<header>NUEVA CATEGORIA</header>
				<form name="registroform" id="registroform" action="../Controladores/Controller_Categoria.php" method="post" enctype="multipart/form-data">
					<p>
						<label >Descripcion<br />
						<input type="text" name="Descripcion" id="Descripcion" class="input" size="32" value=""  /></label>
					</p>
					<p>
						<label >ID<br />
						<input type="text" name="ID" id="ID" class="input" size="32" value=""  /></label>
					</p>		

					<p class="submit">
						<input type="submit" name="registrar" id="registrar" class="button" value="Crear Categoria" />
					</p>
				</form>	
			</article>
					
			<article class="CRCategoria">
				<header>MODIFICAR CATEGORIA</header>
				<form name="registroform" id="registroform" action="../Controladores/Controller_Categoria.php" method="post" enctype="multipart/form-data">
				<p>
					<label >Categoria<br />
						<input type="text" name="categoria1" list="categoria" id='categoria1'>
							<datalist id='categoria' >
								<?php
								foreach ($categorias as $categoria){
									echo "
										<option value='".$categoria["ID"]."'>".$categoria["DESCRIPCION"]."</option>

									";
								}
								?>
							</datalist>
						</input>
				</p>
				<p>
					<label >Descripcion<br />
					<input type="text" name="Descripcion" id="Descripcion" class="input" size="32" value=""  /></label>
				</p>

					<p class="submit">
						<input type="submit" name="modificar" id="modificar" class="button" value="Modificar Categoria" />
				</p>
				</form>
			</article>
				
			<article class="CRCategoria">
				<header>ELIMINAR</header>
				<form name="registroform" id="registroform" action="../Controladores/Controller_Categoria.php" method="post" enctype="multipart/form-data">
				<p>
					<label >ID<br />
						<input type="text" name="categoria2" list="categoria" id='categoria2'>
							<datalist id='categoria2' >
								<?php
								
								foreach ($categorias as $categoria){
									echo "
										<option value='".$categoria["ID"]."' >".$categoria["DESCRIPCION"]."</option>

									";
								}
								?>
							</datalist>
						</input>

				</p>
					<p class="submit">
						<input type="submit" name="eliminar" id="eliminar" class="button" value="Eliminar Categoria" />
				</p>
				</form>
			</article>

		</section>
	</body>	
	<aside>
	
		<?php
			if(isset($_SESSION["user"])){
				echo "
					<div id='infoUser'>USER: ".$_SESSION['user']."
          			<br>
			        <a href='AgregarJuegos.php' >JUEGOS</a>
          			<br>      
        			<a href='Categorias.php' >CATEGORIAS</a>
		          	<a href='listadoUsuarios.php' >USUARIOS</a>
		          	<br>
          			<a href='../Controladores/logout.php' >CERRAR SESION</a></div>

					
				";

			}
		?>
		
	</aside>
	<footer>

	</footer>
</html>