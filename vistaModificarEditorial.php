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
   <!-- <div class="container">-->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <!-- <div class="container">-->
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
              <li><a href="/JAMP/PORTI/entidadController.php?action=cargarEditorial">Administrar Editoriales</a></li>
              <li><a href ="/JAMP/PORTI/entidadController.php?action=altaEditorial">Alta Editorial </a></li>
              <li class="active"><a href="#">Modificar Editoriales</a></li>
              <li><a href ="/JAMP/PORTI/entidadController.php?action=borradosEditorial">Editoriales Borradas </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
    <li><a href="../PORTI/loginController.php?action=logout"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
  </ul>
        </div><!-- /.navbar-collapse -->
        </div>
      </nav><br><br><br>
      <div class="row">
       <div class="col-md-12">
      <form class="formulario" method="POST" action="entidadController.php?action=confirmarModificacionEditorial" onSubmit="return validar()">
      <table class="table table-bordered" border="">
          <tr>
          <td><p>Nombre</p>
          </td>
          </tr>
        <td><input id="nombre" name="nom_editorial" type="text" placeholder="<?php echo $n;?>" required="required"/></td>
        </tr>
      </table>
      <?php echo "<input name='id_editorial' type='hidden' value='".$id."'/>"?>
      <input type="submit" class="btn btn-info" value="Modificar"/>
      </form>
      <a href="entidadController.php?action=cargarEditorial">Volver</a>
      </div>
      <!--</div>-->
  <!-- </div>-->
  </body>
</html>