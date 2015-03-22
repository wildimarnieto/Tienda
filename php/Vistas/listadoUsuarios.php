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
      <h1>LISTADO DE USUARIOS REGISTRADOS</h1>
    </header><!--Termina header del body-->
    
    <section id="NJuegos">
      <article>
      <?php
            require ('../Modelos/Db.php');
            require '../Controladores/Controller_Cliente.php';
            $cont2 = new Controller_Cliente();
            $datos = $cont2->get_Clientes();
            
            echo "<table class='altrowstable' id='alternatecolor'>
                  <tr>
                    <th>IMAGEN</th><th>Nombre</th><th>Usuario</th><th>E-MAIL</th>
                  </tr>     ";
            foreach ($datos as &$dato) {
              echo  "                     
                  <tr>
                    <td><img class='ImagenJuego' src='../../".$dato["IMAGEN"]."'</td>
                    <td>".$dato["NOMBRE"]."</td>
                    <td>".$dato["USER"]."</td>
                    <td>".$dato["EMAIL"]."</td>
                  </tr>
              ";
            }
            echo "</table>";
            ?>
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