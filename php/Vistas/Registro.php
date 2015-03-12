<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script type="text/javascript" src="../../js/script.js"></script>
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<title>Registro</title>	

</head>
<body>
	<section >
        <article id='registro'>
		<h1>Registrar</h1>

		<form name="registroform" id="registroform" action="../Controladores/Controller_Cliente.php" method="post">
			<p>
				<label for="user_login">E-mail<br />
				<input type="text" name="email" id="email" class="input" size="32" value=""  /></label>
			</p>
			<p>
				<label for="user_login">Nombre<br />
				<input type="text" name="nombre" id="nombre" class="input" size="32" value=""  /></label>
			</p>
			<p>
				<label for="user_login">Apellido<br />
				<input type="text" name="apellido" id="apellido" class="input" size="32" value=""  /></label>
			</p>		
			<p>
				<label for="user_pass">Cedula<br />
				<input type="text" name="cedula" id="cedula" class="input" value="" size="32" /></label>
			</p>	
			<p>
				<label for="user_pass">Telefono<br />
				<input type="text" name="telefono" id="telefono" class="input" value="" size="32" /></label>
			</p>
			<p>
				<label for="user_pass">Usuario<br />
				<input type="text" name="user" id="user" class="input" value="" size="15" /></label>
			</p>	
			<p>
				<label for="user_pass">Contraseña<br />
				<input type="password" name="pass" id="pass" class="input" value="" size="20" /></label>
			</p>	
			<p class="submit">
				<input type="submit" name="registrar" id="registrar" class="button" value="Registrar" />
			</p>	
			<p class="regtext">Ya tienes una cuenta? <a href="../../index.php" >Entra Aquí!</a></p>
		</form>
		</article>
	</section>
</body>
</html>