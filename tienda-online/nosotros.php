<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $particulo = new player items\Articulos;
    $resultado = $pelicula->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: index.php');

       

    if(isset($_SESSION['carrito'])){ //SI EL CARRITO EXISTE
   
        if(array_key_exists($id,$_SESSION['carrito'])){
            actualizarArticulo($id);
        }else{
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            agregarArticulo($resultado, $id);
        }

    }else{
        //  SI EL CARRITO NO EXISTE
        agregarArticulo($resultado, $id);

    }

   

}  

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Player Ítems</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

    <style> 
    .contenedor{
    margin: 5em;
    }

    .social {
	position: fixed; /* Hacemos que la posición en pantalla sea fija para que siempre se muestre en pantalla*/
	left: 0; /* Establecemos la barra en la izquierda */
	top: 100px; /* Bajamos la barra 200px de arriba a abajo */
	z-index: 2000; /* Utilizamos la propiedad z-index para que no se superponga algún otro elemento como sliders, galerías, etc */
}

	.social ul {
		list-style: none;
	}

	.social ul li a {
		display: inline-block;
		color:#fff;
		background: #000;
		padding: 10px 15px;
		text-decoration: none;
		-webkit-transition:all 500ms ease;
		-o-transition:all 500ms ease;
		transition:all 500ms ease; /* Establecemos una transición a todas las propiedades */
	}

	.social ul li .icon-facebook {background:#3b5998;} /* Establecemos los colores de cada red social, aprovechando su class */
	.social ul li .icon-twitter {background: #00abf0;}
	.social ul li .icon-googleplus {background: #d95232;}
	.social ul li .icon-pinterest {background: #ae181f;}
	.social ul li .icon-mail {background: #666666;}

	.social ul li a:hover {
		background: #000; /* Cambiamos el fondo cuando el usuario pase el mouse */
		padding: 10px 30px; /* Hacemos mas grande el espacio cuando el usuario pase el mouse */
	}
    </style>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Player Ítems</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadPeliculas(); ?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <br><br><br><br><br><br><br>

    <div class="contenedor" style="width: 30%; float:left">
    <h1> Sobre Nosotros</h1>
    <br><br>
    <p style= "text-align: justify;"><font size="4" color="#0000ff" >Somos una empresa comprometida con brindar la mayor satisfacción a nuestros clientes. 
        Player Ítems es una empresa dedicada a vender periféricos y artículos para PC, PS4 y XBOX etc. 
        Tenemos elementos para hacer mas cómoda la experiencia de juego…</p>
        <p style= "text-align: justify;"><strong>Renueva tus equipos</strong><br />Las computadoras y consolas de videojuegos sufren 
        cierto desgaste con los años, mientras más tiempo tengan, van a estar sujetas a mayores problemas 
        de seguridad, desempeño, diversos gastos de actualización y mantenimiento, garantía e 
        incompatibilidad con nuevos programas y tecnologías, además de que van utilizando más energía 
        por el desgaste de sus componentes.</font></p>	
    </div>

    <div class="contenedor" style="width: 50%; float:right">  
    <br><br><br><br><br><br> 
        <iframe width="587" height="330" src="https://www.youtube.com/embed/RdfVy2lnmJ8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>
    </div>
    
    <div class="social">
		<ul>
			<li><a href="https://www.facebook.com/vania.amaya.79" target="_blank" class="icon-facebook">Facebook</a></li>
			<li><a href="https://www.instagram.com/van_iamaya/" target="_blank" class="icon-googleplus">Instagram</a></li>
		</ul>
	</div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>

</html>
