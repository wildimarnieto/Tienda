<?php
session_start();
if(!isset($_SESSION["user"])){
    // echo "Session is set"; // for testing purposes
    header("Location: ../../index.php");
}
?>

 <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/main.css">
      


        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <script type="text/javascript" src="../../js/script.js"></script>
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <title>Catalogo de VideoJuegos</title>  

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <header id='Titulo'>
       <h1>Prestamo de Videojuegos</h1>
      </header><!--Termina header del body--> 
    <section id="Juegos">
      <header id='TituloJuegoSelect'>
        <h1>Prestamo de VideoJuegos</h1>
      </header>
      <hr>
        <form name="busqueda" id="busqueda" action="../Controladores/Controller_Juegos.php" method="post">
          <p>
            <label >Buscar:
            <input type="text" name="buscar" id="buscar" class="input" size="40" value="Nombre Juego..."  /></label>
            <input type="submit" name="Buscar" id="Buscar" class="button" value="Buscar" />
          </p>
        </form>
      <hr>
          <?php
            require ('../Modelos/Db.php');
            require '../Controladores/Controller_Juegos.php';
            $cont = new Controller_Juegos();
            $datos = $cont->get_Juegos();
            
            foreach ($datos as &$dato) {
              echo  "
                <article class='Producto'>
                  <img class='ImagenJuego' src='../../".$dato["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$dato["IDJUEGO"]."></img>
                  <div class='Text'>Cantidad:  ".$dato["CANTIDAD"]." </div>
                  <div class='Text'>Precio por dia: $".$dato["PRECIO"]."</div>
                </article>
                  ";
            }
          ?>
    </section>
        
      </div>
    </div>

    <div class="container">
      <aside>
    
    <?php
      require ('../Controladores/Controller_Categoria.php');
      require ('../Controladores/Controller_Cliente.php');
      $cont = new Controller_Cliente();
      
      if(isset($_SESSION["user"])){
        $datos = $cont->get_Cliente1($_SESSION["user"]);
        $datos = $datos[0];
        echo "
          <div id='infoUser'>
          USER: ".$datos['USER']."
          <br>

          <img width='80' height='80' src='../../".$datos["IMAGEN"]."''  ></img>
          <br>
          <a href='Carrito.php' >VER CARRITO</a>
          <br>
          <a href='PrestamosUsuario.php' >PERFIL</a>
          <br>
          <a href='../Controladores/logout.php' >CERRAR SESION</a></div>
        ";

      }
      echo "<h1>CATEGORIAS</h1>
      <ul id='Categorias'>
      ";
      $cate = new Controller_Categoria();
      $datos = $cate->get_Categorias();
      foreach ($datos as &$dato) {
        echo  "<li ><a href='InicioCategoria.php?ID=".$dato["ID"]."' >".$dato["DESCRIPCION"]."</a></li>";
      }

    ?>
    <li ><a href='Inicio.php' >Todas</a></li>
    </ul>
    <h1>MAS ALQUILADOS</h1>
    <ul id='masquilados'>
      <?php
           require '../Controladores/Controller_Masbuscado.php';
           $mas = new Controller_Masbuscado();
           $cont = new Controller_Juegos();
           $datos = $mas->get_masbuscado();
            foreach ($datos as &$dato) {
              $dato=$cont->get_Juego($dato['IDJUEGO']);
              $dato=$dato[0];
          echo  "<li>
              <img class='ImagenJuego' src='../../".$dato["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$dato["IDJUEGO"]."></img>
              </li>";
           }
        ?>           
        
    </ul> 


  </aside>

    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
      
    </body>

    <footer>
    </footer>


    
</html>
