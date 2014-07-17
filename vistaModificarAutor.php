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
  </head>
  <body class="laboratorix text-pag">
    <!--<div class="container">-->
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
        <ul class="nav navbar-nav">
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=admin">Inicio</a></li>
          <li><a href="/JAMP/PORTI/llamadaController.php?action=cargarAutor&clase=entidad">Administrar Autores</a></li>
          <li><a href="llamadaController.php?action=altaAutor&clase=entidad">Alta Autor</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosAutores&clase=entidad">Autores Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav><br><br>
    <div class="row">
      <div class="col-md-12">
        <div>
          <?php
            if(isset($existe)){
              echo "<div class='alert alert-danger'>Error! Ya existe el Autor ingresado, busque en la lista o en los borrados</div>";
            }
          ?>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Modificar datos de autor</h3>
          </div>
          <table class="table table-centered">
            <form class="formulario" method="POST" action="llamadaController.php?action=confirmarModificacionAutor&clase=entidad" onSubmit="return validar()">
              <tr>
                <td>
                  <div class="input-group input-group-lg">
                      <span class="input-group-addon">Nombre y Apellido</span>
                      <?php
                        echo "<input type='text' value='".$nombre_autor."' class='form-control' name='nom_autor' id='nom_autor' required='required'>";
                      ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">Detalle/Descripcion</span>
                    <?php
                      echo "
                        <input type='text' value='".$detalle_autor."' class='form-control' name='detalle_autor' id='detalle_autor' >
                        <input name='id_autor' type='hidden' value='".$id."'/>
                      ";
                    ?>
                  </div>
                </td>
              </tr>              
              <td>
                <input type="submit" class="btn btn-info" value="Modificar" />
              </td>
              <td>
                <a href="llamadaController.php?action=cargarAutor&clase=entidad">Volver</a>
              </td>
            </form>
          </table>          
        </div>
      </div>
    </div>
   <!-- </div>-->
  </body>
</html>