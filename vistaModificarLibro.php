<!DOCTYPE HTML>
<html>
  <head>
    <script src="../LIBS/jquery.js" type="text/javascript"></script>
    <script src="../LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="../LIBS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <script type="text/javascript" src="../LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>


  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <label class="navbar-brand">CookBooks</label> 
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li><a href="../ADMIN/cookBooksAdmin.php">Inicio</a></li>
              <li><a href="/JAMP/PORTI/llamadaController.php?action=cargarEtiqueta&clase=entidad">Administrar Etiquetas</a></li>
              <li class="active"><a href="">Modificar Etiqueta</a></li>
              <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosEtiqueta&clase=entidad">Etiquetas Borradas </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
        </div>
      </nav>
  </head>
  <body class="laboratorix text-pag">
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
          <ul class="nav navbar-nav">
              <li><a href="../ADMIN/cookBooksAdmin.php">Inicio</a></li>
              <li><a href="/JAMP/PORTI/llamadaController.php?action=cargarLibro&clase=entidad">Administrar Libros</a></li>
              <li class="active"><a href="">Modificar Libro</a></li>
              <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosLibro&clase=entidad">Libros Borradas </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
        </div>
      </nav><br><br><br>
      <div class="row">
       <div class="col-md-12">
      <form class="formulario" method="POST" action="llamadaController.php?action=confirmarModificacionLibro&clase=entidad" onSubmit="return validar()">
      <table class="table table">
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese nombre Libro" name="nom_libro">
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese ISBN" name="isbn_libro">
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese cantidad de hojas" name="cantHojas_libro"> 
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese cantidad de libros" name="cant_libro">
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese precio" name="precio_libro">
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese editorial" name="editorial_libro"> 
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese etiqueta" name="etiqueta_libro">
      </td>
    </tr>
    <tr>
    <td>
      <input id="nombre" type="text" placeholder="Ingrese autor" name="autor_libro">
      </td>
    </tr>

    </td>
    <td>
      <button class="btn btn-info" type="submit">Enviar</button>

    </td>
    </tr>
  </table>
      <!-- falta poner los demás inputs para toooodos los campos que tiene el libro -->
      <?php echo "<input name='id_Libro' type='hidden' value='".$id."'/>"?>
      <input type="submit" class="btn btn-info" value="Modificar"/>
      </form>
      <a href="llamadaController.php?action=cargarLibro&clase=entidad">Volver</a>
      </div>
      <div>
<?php
  if(isset($existe)){
    echo "Ya existe el nombre ingresado, busque en la lista o en los borrados";
  }
?>
</div>
     <!-- </div>-->
   <!-- </div>-->
  </body>
</html>