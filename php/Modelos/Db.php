<?php

class Db{

	//La conexion de la base de datos
	//Define la conexion como una variable estatica, para evitar que se conecten mas de una vez 
	protected static $connection;

	function db_connect(){

		//prueba que conecta a la base de datos, si la conexion no se ha establecido aun 
		if(!isset(self::$connection)){
			//carga la configuracion como un array
			$config = parse_ini_file('config.ini');
			self::$connection = mysqli_connect('localhost', $config['user'], $config['password'], $config['dbname']);
		}

		//si la conexion no se logro, se administra el error 
		if(self::$connection == false){
			//administra el error - notifica al administrador, registra en un log, ext.
			return mysqli_connect_error();
		}
		return self::$connection;
	}

	function db_query($query){
		//conecta a la base de datos
		$connection = $this->db_connect();

		//consulta a la base de datos
		$result = mysqli_query($connection, $query);

		return $result;
	}

	function db_error(){
		$connection = $this->db_connect();
		return mysqli_error($connection);
	}

	function db_select($query){
		$rows = array();
		$result= $this->db_query($query);

		//si la consulta falla se envia un false
		if($result === false){
			return false;
		}

		//si la consulta es exitosa se retorna el array de los reusltados
		while ($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
		}

		return $rows;
	}

}

?>