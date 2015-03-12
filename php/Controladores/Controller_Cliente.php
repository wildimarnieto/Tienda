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

	if (!empty($mensaje)) {
		echo "
			<script>
				alert('".$mensaje."')
				window.location.href = '../Vistas/Registro.php'
			</script>";		
	}


?>