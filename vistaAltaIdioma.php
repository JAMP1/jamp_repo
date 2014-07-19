<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Idiomas</title>
      <script type="text/javascript" src="/JAMP/JS/eventosDeTeclas.js"></script>

    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <script type="text/javascript" src="../JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
  </head>
  <body class="laboratorix" onkeydown="presionaTecla()">
    <nav class="navbar navbar-inverse" role="navigation">
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
          <li class="active"><a href="#">Alta Idioma</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosIdiomas&clase=entidad">Idiomas Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
         <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
    <div class="row">
      <div class="col-md-8">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Alta de idioma</h3>
          </div>
          <table class="table table">
            <form onSubmit="return validar()" method="POST" action="llamadaController.php?action=confirmarAltaIdioma&clase=entidad">
              <tr>
                <td>
                  <div class="input-group input-group-lg">
                    <span class="input-group-addon">Nombre </span>
                    <input class="form-control" id="nombre" type="text" placeholder="Ingrese nombre idioma" name="nom_idioma" required="required">
                  </div>
                </td>
              </tr>
              <td>
                <button class="btn btn-info" type="submit">Enviar</button>
              </td>
            </form>
          </table>
          <div>
            <?php
              if(isset($existe)){
                echo "<div class='alert alert-danger'>Error! Ya existe el idioma ingresado, busque en la lista o en los borrados</div>";
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div id="socalo">
  </div>
  </body>
</html>