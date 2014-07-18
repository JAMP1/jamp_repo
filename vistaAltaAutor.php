<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Autores</title>
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
  <body class="laboratorix">
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
          <li><a href="/JAMP/PORTI/llamadaController.php?action=cargarAutor&clase=entidad">Administrar Autores</a></li>
          <li class="active"><a href="#">Alta Autor</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosAutores&clase=entidad">Autores Borrados </a></li>  
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
    <div class="row">
      <?php
        if(isset($existe)){
          echo "<div class='alert alert-danger'>Error! Ya existe el autor ingresada, busque en la lista o en los borrados</div>";
        }
      ?>
    </div>
    <div class="col-md-12">      
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Alta de autor</h3>
        </div>
        <table class="table table-bordered table-centered">          
          <form onSubmit="return validarAutor()" method="POST" action="llamadaController.php?action=confirmarAltaAutor&clase=entidad">
            <tr>
              <td>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon">Nombre y Apellido</span>
                    <?php
                      echo "<input type='text' class='form-control' name='nom_autor' id='nom_autor' required='required'>";
                    ?>
                </div>
              </td>
            </tr>  
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Detalle/Descripcion</span>
                    <?php
                      if(isset($detalle)){
                        echo "<input type='text' value='".$detalle."' class='form-control' name='detalle_autor' id='detalle_autor' >";
                      }else{
                        echo "<input type='text' class='form-control' name='detalle_autor' id='detalle_autor' >";
                      }
                    ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <button class="btn btn-info" type="submit">Enviar</button>
              </td>
            </tr>
          </form> 
        </table>
      </div>
    </div>
  </body>
</html>