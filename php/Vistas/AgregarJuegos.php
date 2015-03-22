<?php
session_start();
if(!isset($_SESSION["user"])){
		header("Location: ../../index.php");
}
require '../Modelos/Db.php';
require '../Controladores/Controller_Categoria.php';
require '../Controladores/Controller_Juegos.php';
$categorias= new Controller_Categoria();
$categorias=$categorias->get_Categorias();
$juegos= new Controller_Juegos();
$juegos=$juegos->get_Juegos();
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
                            
                            <h1>Nuevo Videojuego</h1>
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
						<input type="text" name="categoria" id="" class="input" value="" size="32" /></label>
							
						
					</p>
					<p class="submit">
						<input type="submit" name="registrar" id="registrar" class="button" value="Crear Juego" />
					</p>
				</form>	
			</article>			
		</section>
	
	
       
                                        
                                        
                                        
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
                
                
                
                
                
                <section id="NJuegos">
                
                
                
                
                
                <section id="NJuegos">
			<article id='NuevoJuego'>
                            
                            <h1>Nuevo Videojuego</h1>
		
				
                                <form name="registroform" id="registroform" action="../Controladores/Controller_Juegos.php" method="post" enctype="multipart/form-data">
				<p>
					<label >Categoria<br />
						<input type="text" name="id" list="categoria" id='ID'>
							<datalist id='categoria' >
								<?php
								foreach ($juegos as $juego){
									echo "
										<option value='".$juego["IDJUEGO"]."'>".$juego["NOMBRE"]."</option>

									";
								}
								?>
							</datalist>
						</input>
				</p>
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
						<input type="text" name="categoria" id="" class="input" value="" size="32" /></label>
							
						
					</p>
					<p class="submit">
						<input type="submit" name="modificar" id="modificar" class="button" value="Modificar juego" />
				</p>
				</form>
			</article>
			</article>			
		</section>
                    
                    
                    
                    
			
	
	<section id="NJuegos">
	<article class="CRCategoria">
				<header>ELIMINAR</header>
                                <form name="registroform" id="registroform" action="../Controladores/Controller_Juegos.php" method="post" enctype="multipart/form-data">
				<p>
					<label >ID<br />
						<input type="text" name="categoria2" list="categoria" id='categoria2'>
							<datalist id='categoria2' >
								<?php
								
								foreach ($categorias as $categoria){
									echo "
										<option value='".$categoria["IDJUEGO"]."' >".$categoria["NOMBRE"]."</option>

									";
								}
								?>
							</datalist>
						</input>

				</p>
					<p class="submit">
						<input type="submit" name="eliminar" id="eliminar" class="button" value="Eliminar juego" />
				</p>
				</form>
		
		
        </section>
                    </body>	
	<footer>

	</footer>
</html>