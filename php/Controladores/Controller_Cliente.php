<?php

	require ('../Modelos/Model_Cliente.php');
	

	class Controller_Cliente{

		private $cliente;
		private $datos;
		
		function __construct(){
			$this->cliente=new Model_Cliente();
		}

		function get_Clientes(){
			$this->datos=$this->cliente->get_clientes();
			return $this->datos;
		}

		function get_Cliente($id){
			$this->datos=$this->cliente->get_cliente($id);
			return $this->datos;
		}

		function get_Cliente1($user){
			$this->datos=$this->cliente->get_cliente1($user);
			return $this->datos;
		}

		function mod_Cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass, $imagen){
			$this->datos=$this->cliente->mod_cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass, $imagen);
			return $this->datos;
		}

		function set_Cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass){
			$this->datos = $this->cliente->set_cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass);
			return $this->datos;
		}
	}

	if(isset($_POST["registrar"])){
		require ('../Modelos/Db.php');
		$registro = new Controller_Cliente();
		if(!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['telefono']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
			$email=$_POST['email'];
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$telefono=$_POST['telefono'];
			$cedula=$_POST['cedula'];
			$user=$_POST['user'];
			$pass=$_POST['pass'];
			$numrows=$registro->get_Cliente($cedula);
			if((count ($numrows))==0){
				$result=$registro->set_Cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass);
				if($result){
					echo "
						<script>
							alert('Cuenta Correctamente Creada')
							window.location.href = '../../index.php'
						</script>";	
				} else {
		 			$mensaje = "Error al ingresar datos de la informacion!";
				}
			} else {
				$mensaje = "El nombre de usuario ya existe! Por favor, intenta con otro!";
			}

		} else {
		 	$mensaje = "Todos los campos no deben de estar vacios!";
		}
	}

	if(isset($_POST["modificar"])){
		require ('../Modelos/Db.php');
		$registro = new Controller_Cliente();

		if(empty($_FILES['imagen'])) {
      		echo "No he recibido la imagen";
   			exit;
   		}
		if(!empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['cedula']) && !empty($_POST['telefono']) && !empty($_POST['user']) && !empty($_POST['pass'])  && !empty($_FILES['imagen']) ) {
			$email=$_POST['email'];
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$telefono=$_POST['telefono'];
			$cedula=$_POST['cedula'];
			$user=$_POST['user'];
			$pass=$_POST['pass'];

			$archivo = $_FILES['imagen']['tmp_name'];
			$nombre1 = $_FILES['imagen']['name'];
			move_uploaded_file($archivo, "../../img_clientes/".$nombre1);
			$imagen = "img_clientes/".$nombre1;


			$rta=$registro->mod_Cliente($cedula, $nombre, $apellido, $telefono, $email, $user, $pass, $imagen);
			echo $rta;
			echo "
			<script>
				window.location.href = '../Vistas/PrestamosUsuario.php'
			</script>";	
		}else{
			$mensaje1 = "Error en los datos ingresados";
			echo "
			<script>
				alert('".$mensaje1."')
				window.location.href = '../Vistas/PrestamosUsuario.php'
			</script>";	
		}
		
	}

	if (!empty($mensaje)) {
		echo "
			<script>
				alert('".$mensaje."')
				window.location.href = '../Vistas/Registro.php'
			</script>";		
	}


?>