<!DOCTYPE HTML>
<html>
  <head>
    <script src="../LIBS/jquery.js" type="text/javascript"></script>
    <script src="../LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="../LIBS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
      <script type="text/javascript" src="/JAMP/JS/eventosDeTeclas.js"></script>

    <title>Modificar idioma</title>
    <script type="text/javascript" src="../LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
  </head>
  <body class="laboratorix text-pag" onkeydown="presionaTecla()">
    <!--<div class="container">-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
          <li><a href="/JAMP/PORTI/llamadaController.php?action=cargarIdioma&clase=entidad">Administrar Idiomas</a></li>
          <li><a href="llamadaController.php?action=altaIdioma&clase=entidad">Alta Idioma</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosIdiomas&clase=entidad">Idiomas Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav><br><br>
    <div class="row">
      <div class="col-md-8">
        <div>
          <?php
            if(isset($existe)){
              echo "<div class='alert alert-danger'>Error! Ya existe el Idioma ingresado, busque en la lista o en los borrados</div>";
            }
          ?>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Modificar datos de idioma</h3>
          </div>
          <table class="table table">
            <form class="formulario" method="POST" action="llamadaController.php?action=confirmarModificacionIdioma&clase=entidad" onSubmit="return validar()">
              <tr>
                <td>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">Nombre </span>
                    <?php
                      echo "
                        <input type='text' value='".$nombre_idioma."' class='form-control' name='nombre_idioma' id='nombre' required='required'>
                        <input type='hidden' value= '".$id."' name='id_idioma'>
                      ";
                    ?>
                  </div>
                </td>
              </tr>
              <td>
                <input type="submit" class="btn btn-info" value="Modificar"/>
              </td>
              <td>
                <a href="llamadaController.php?action=cargarIdioma&clase=entidad">Volver</a>
              </td>           
            </form>
          </table> 
        </div>
      </div>
    </div>
    <div id="socalo">
  </div> 
  </body>
</html>