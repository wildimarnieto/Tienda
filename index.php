<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/main.css"> 
        <link rel="stylesheet" href="css/default.css"> 

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 align="center" size=9 > BIENVENIDO A LA TIENDA DE VIDEOJUEGOS</h1>
        <p align="center">La mejor tienda de videojuegos de latinoamerica</p>

        <section >
        <article id='login'>
           
            <form name="loginform" id="loginform" action="php/Controladores/login.php" method="POST">            
                
               
                <p>LOGIN</p>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimun-scale=1">
                <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                <p>
                    <label for="user_login">Nombre De Usuario<br />
                    <input type="text" name="user" id="user" class="input" value="" size="20" /></label>
                </p>
                <p>
                    <label for="user_pass">Contraseña<br />
                    <input type="password" name="pass" id="pass" class="input" value="" size="20" /></label>
                </p>
                <p class="submit">
                    <input type="submit" name="login" class="btn btn-primary" value="Entrar" />
                </p>
                <p class="regtext">¿No estas registrado? <a href="php/Vistas/Registro.php" >Registrate Aquí</a></p>
            </form>
        </article>
    </section>

        <
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Derechos de Autor o Copyright</h2>
          <p>Copyright is a legal right created by the law of a country, that grants the creator of an original work exclusive rights to its use and distribution, usually for a limited time, with the intention of enabling the creator (e.g. the photographer of a photograph or the author of a book) to receive compensation for their intellectual effort. The exclusive rights are however not absolute, and do not give the creator total control of their works because they are limited by limitations and exceptions to copyright law.

Copyright is a form of intellectual property, applicable to any expressed representation of a creative work. It is often shared among multiple authors, each of whom holds a set of rights to use or license the work, and who are commonly referred to as rightsholders.[1] These rights frequently include reproduction, control over derivative works, distribution, public performance, and "moral rights" such as attribution.[2] </p>
          <p><a class="btn btn-default" href="#" role="button">Regresar &raquo;</a></p>
        </div>
        
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
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
</html>
