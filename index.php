<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <title>Catalogo de VideoJuegos</title>  

</head>

<body>
    <section >
        <article id='login'>
            <form name="loginform" id="loginform" action="php/Controladores/login.php" method="POST">            
                <h1>LOGIN</h1>
                <p>
                    <label for="user_login">Nombre De Usuario<br />
                    <input type="text" name="user" id="user" class="input" value="" size="20" /></label>
                </p>
                <p>
                    <label for="user_pass">Contraseña<br />
                    <input type="password" name="pass" id="pass" class="input" value="" size="20" /></label>
                </p>
                <p class="submit">
                    <input type="submit" name="login" class="button" value="Entrar" />
                </p>
                <p class="regtext">No estas registrado? <a href="php/Vistas/Registro.php" >Registrate Aquí</a>!</p>
            </form>
        </article>
    </section>
</body>
</html>
