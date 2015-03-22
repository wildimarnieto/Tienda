<?php
	require ('../Modelos/Model_Juego.php');
	
	class Controller_Juegos{

		private $juego;
		private $datos;
		
		function __construct(){
			$this->juego=new Model_Juego();
		}

		function get_Juegos(){
			$this->datos=$this->juego->get_juegos();
			return $this->datos;
		}

		function get_Juego($id ){
			$this->datos=$this->juego->get_juego($id);
			return $this->datos;
		}

		function get_Juego1($nombre){
			$this->datos=$this->juego->get_juego1($nombre);
			return $this->datos;
		}

		function set_Juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria){
			$this->datos = $this->juego->set_juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria);
			return $this->datos;
		}
                
                function mod_Juego($id,$nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria){
			$this->datos=$this->juego->mod_juego($id,$nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria);
			return $this->datos;
		}
                function del_juego($id){
			$this->datos=$this->juego->del_juego($id);
			return $this->datos;
		}
                
	}

	if(isset($_POST["registrar"])){
		require ('../Modelos/Db.php');
	if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['cantidad']) && !empty($_POST['plataforma']) && !empty($_POST['video']) && !empty($_FILES['imagen']) && !empty($_POST['categoria1'])) {		
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$plataforma=$_POST['plataforma'];

		$archivo = $_FILES['imagen']['tmp_name'];
		$nombre1 = $_FILES['imagen']['name'];
		move_uploaded_file($archivo, "../../img/".$nombre1);
		$imagen = "img/".$nombre1;

		$video=$_POST['video'];
		$categoria=$_POST['categoria1'];
		$registro = new Controller_Juegos();		
		$result=$registro->set_Juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria);
			if($result){
					echo "
						<script>
							alert('Juego Creado Correctamente')
							window.location.href = '../Vistas/AgregarJuegos.php'
						</script>";	
				} else {
		 			$mensaje = "Error al ingresar datos de la informacion!";
		 			echo "
			<script>
				alert('".$mensaje."')
				window.location.href = '../Vistas/AgregarJuegos.php'
			</script>";	
				}
			} else {
				$mensaje = "Error en los datos ingresados!";
				echo "
					<script>
						#alert('".$mensaje."')
						#window.location.href = '../Vistas/AgregarJuegos.php'
					</script>";	
			}

		}


		if(isset($_POST["Buscar"])){
			require ('../Modelos/Db.php');
			if(isset($_POST["buscar"])){
				$registro = new Controller_Juegos();
				$nombre=$_POST["buscar"];
				$juego=$registro->get_Juego1($nombre);
				if(count($juego)>0){
					$juego=$juego[0];

					echo "<script>
							window.location.href = '../Vistas/VerJuego.php?ID=".$juego["IDJUEGO"]."'
						</script>";
				}else{
					echo "<script>
							alert('El juego no existe')
							window.location.href = '../Vistas/Inicio.php'
						</script>";					
				}

			}
		} 
                
                if(isset($_POST["modificar"])){
		require ('../Modelos/Db.php');
		if(!empty($_POST['id']) &&!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['cantidad']) && !empty($_POST['plataforma']) && !empty($_POST['video']) && !empty($_FILES['imagen']) && !empty($_POST['categoria1'])) {		
		$id=$_POST['id'];
                    $nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$plataforma=$_POST['plataforma'];

		$archivo = $_FILES['imagen']['tmp_name'];
		$nombre1 = $_FILES['imagen']['name'];
		move_uploaded_file($archivo, "../../img/".$nombre1);
		$imagen = "img/".$nombre1;

		$video=$_POST['video'];
		$categoria=$_POST['categoria1'];
		$registro = new Controller_Juegos();		
		$result=$registro->set_mod($id,$nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria);
			
			echo "<SCRIPT>
				alert('Categoria Modificada, verificar cambios');
				window.location='../Vistas/AgregarJuegos.php';</SCRIPT>"; 
		}else{
			echo "<SCRIPT>
				alert('Error en los datos ingresados');
				window.location='../Vistas/AgregarJuegos.php';</SCRIPT>"; 
		}		

	}
        
        if(isset($_POST["eliminar"])){
		require ('../Modelos/Db.php');
		
		if(!empty($_POST['categoria2'])){
			$categoriaNueva= new Controller_Juegos();
			$id=$_POST['categoria2'];
			$categoriaNueva->del_juego($id);
			echo "<SCRIPT>
					alert('Se intento eliminar, verificar cambios');
					window.location='../Vistas/AgregarJuegos.php';</SCRIPT>"; 
		}else{
			echo "<SCRIPT>
				alert('Seleccione un juego  a eliminar');
				window.location='../Vistas/AgregarJuegos.php';</SCRIPT>"; 
		}		

	}
	
?>