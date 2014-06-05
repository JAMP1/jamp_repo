<!DOCTYPE HTML>
<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<title>Administracion de Autores</title>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
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
    <ul class="nav navbar-nav">
        <li><a href="/JAMP/cookbooks.php">Inicio</a></li>
        <li><a href="../vistaAutores.php">Administrar Autores</a></li>
        <li class="active"><a href="#">Alta Autor</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/PORTI/loginController.php?action=logout"><span class="add-on"><i class="icon-user"></i></span>Cerrar sesion</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="row">
<div class="col-md-12">
<form method="POST" action="entidadController.php?action=confirmarAltaAutor">
<table class="table table">
<tr>
<td>
<input type="text" placeholder="Ingrese nombre autor" name="nom_autor">
</td>
<td>
<button class="btn btn-info" type="submit">Enviar</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>