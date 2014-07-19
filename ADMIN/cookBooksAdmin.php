<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
    <script src="../LIBS/jquery.js" type="text/javascript"></script>
    <title>Bienvenidos</title>
    <script type="text/javascript" src="/JAMP/JS/eventosDeTeclas.js"></script>

    <script src="../LIBS/codigologin.js" type="text/javascript"></script>
    <script type="text/javascript" src="../LIBS/validar.js"></script>
    <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="../LIBS/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!--<div class="container">-->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <label class="navbar-brand">CookBooks</label> 
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <p class="navbar-text"> Identificado como: <?php echo "<span class='glyphicon glyphicon-hand-right'> ".$_SESSION['usuario']."</span>"; ?></p>
          <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="../PORTI/llamadaController.php?action=volverInicio&clase=admin"> Inicio </a></li>  
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../PORTI/llamadaController.php?action=cargarEtiqueta&clase=entidad"> Administración Etiqueta </a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarAutor&clase=entidad"> Administración Autor</a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarEditorial&clase=entidad"> Administración Editorial</a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarLibro&clase=entidad"> Administración Libro</a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarUsuario&clase=entidad"> Administración Usuario</a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarIdioma&clase=entidad"> Administración Idiomas</a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarCarritosAdmin&clase=entidad"> Ver Carritos de Compras </a></li>
                <li><a href="../PORTI/llamadaController.php?action=verVentasGenerales&clase=entidad"> Ventas y Busquedas </a></li>              
              </ul>
            </li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
          </ul>          
          <!--<form class="navbar-form navbar-right" method="POST" onSubmit="return confirmar()" role="search" action="/JAMP/PORTI/llamadaController.php?action=bajaAdminRegistrado&clase=entidad">
            <button class="btn btn-info" type="submit">Darme de Baja </button>
          </form>-->
          <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=mostrarPerfilAdministrador&clase=entidad&id_usuario"=<?php echo $_SESSION['id_usuario']?>>
            <?php
              echo "<input type='hidden' name='id_usuario' value='".$_SESSION['id_usuario']."'>";
            ?>
            <button class="btn btn-info" type="submit">Mi perfil </button>
          </form>
        </div>
      </nav>
    </head>
  <body onkeydown="presionaTecla()"> 
    <?php
      echo "<input type='hidden' name='sesion_usuario' id='sesion_usuario' value='".$_SESSION['usuario']."'>";
      echo "<input type='hidden' name='sesion_permiso' id='sesion_permiso' value='".$_SESSION['permiso']."'>";
      echo "<input type='hidden' name='sesion_id_usuario' id='sesion_id_usuario' value='".$_SESSION['id_usuario']."'>";
    ?>
  <div>
    <div class="jumbotron">
      <div class="container">
        <div class= "row">
          <div class="col-md-5">
            <img src="/JAMP/IMG/cookbooks.png" width="390px" height="160px">
          </div>
          <div class="col-md-1"> </div>
          <div class="col-md-4">
            <h2>Bienvenido administrador!</h2>
            <h3>Atajos de teclado disponibles:</h3>
            <h4>alt+l  => alta de libros</h4>
            <h4>alt+a  => alta de usuarios</h4>
            <h4>alt+c  => vista de carritos</h4>
            <h4>alt+v  => vista de ventas</h4>
          </div>
          
        </div>
        <!--<img src="/JAMP/IMG/background.png">-->
      </div>
    </div>
    <?php        
        if(isset($noBajaUltimoAdmin)){
            echo" <div class='alert alert-danger'>Cuidado! No puede eliminar el unico admin activo del sistema!!</div>";
        }
    ?>
  </div>
  <div id="socalo">
  </div>           
</body>
</html>