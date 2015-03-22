<?php
	require ('../Modelos/Model_Categoria.php');
	

	class Controller_Categoria{
		private $categoria;
		private $datos;
		public function __construct(){
			$this->categoria=new Model_Categoria();
			$this->datos=array();
		}

		function get_Categorias(){
			$this->datos=$this->categoria->get_categorias();
			return $this->datos;
		}

		function set_Categoria($id, $descripcion){
			$this->datos=$this->categoria->set_categoria($id, $descripcion);
			return $this->datos;
		}

		function mod_Categoria($id, $descripcion){
			$this->datos=$this->categoria->mod_categoria($id, $descripcion);
			return $this->datos;
		}

		function del_Categoria($id){
			$this->datos=$this->categoria->del_categoria($id);
			return $this->datos;
		}
	}


	if(isset($_POST["registrar"])){
		require ('../Modelos/Db.php');
		if(!empty($_POST['Descripcion']) && !empty($_POST['ID'])){
			$categoriaNueva= new Controller_Categoria();
			$desc=$_POST['Descripcion'];
			$id=$_POST['ID'];
			$categoriaNueva->set_Categoria($id, $desc);
			echo "<SCRIPT>
				alert('Categoria Creada, verificar cambios');
				window.location='../Vistas/Categorias.php';</SCRIPT>"; 
		}else{
			echo "<SCRIPT>
				alert('Error en los datos ingresados');
				window.location='../Vistas/Categorias.php';</SCRIPT>"; 
		}	

	}	
	if(isset($_POST["modificar"])){
		require ('../Modelos/Db.php');
		if(!empty($_POST['categoria1']) && !empty($_POST['Descripcion'])){
			$categoriaNueva= new Controller_Categoria();
			$desc=$_POST['Descripcion'];
			$id=$_POST['categoria1'];
			$categoriaNueva->mod_Categoria($id, $desc);
			echo "<SCRIPT>
				alert('Categoria Modificada, verificar cambios');
				window.location='../Vistas/Categorias.php';</SCRIPT>"; 
		}else{
			echo "<SCRIPT>
				alert('Error en los datos ingresados');
				window.location='../Vistas/Categorias.php';</SCRIPT>"; 
		}		

	}


	if(isset($_POST["eliminar"])){
		require ('../Modelos/Db.php');
		echo "<SCRIPT>
					alert('Si algun juego pertenece a esta categoria, no podra ser eliminada');
			  </SCRIPT>"; 
		if(!empty($_POST['categoria2'])){
			$categoriaNueva= new Controller_Categoria();
			$id=$_POST['categoria2'];
			$categoriaNueva->del_Categoria($id);
			echo "<SCRIPT>
					alert('Se intento eliminar, verificar cambios');
					window.location='../Vistas/Categorias.php';</SCRIPT>"; 
		}else{
			echo "<SCRIPT>
				alert('Seleccione una categoria a eliminar');
				window.location='../Vistas/Categorias.php';</SCRIPT>"; 
		}		

	}





?>