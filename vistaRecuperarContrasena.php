<!DOCTYPE html>
<html>
<head>

<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigologin.js" type="text/javascript"></script>
<script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>
<script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="" type="" href="/JAMP/PORTI/llamadaController.php?action=cargarLibros&clase=entidad">
<link rel="" type="" href="/JAMP/PORTI/entidadController.php">
<title>Bienvenidos</title>

</head>

<body>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
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
        <li class="active"><a href ="#"> Inicio </a></li>
      </ul>
      <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=login&clase=loginClase">
      <div class="form-group">
      <input type="text" id="username" placeholder="Usuario" class="form-control" placeholder="Usuario" name="username" value="" required="required" />
      </div>
      <div class="form-group">
      <input type="password" placeholder="Contraseña" class="form-control" id="password" name="password" required="required" />
      </div>
      <button type="submit" id="_submit" class="btn btn-info" name="_submit" >Entrar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <li> <a href="/JAMP/PORTI/llamadaController.php?action=registrarme&clase=entidad">Crear Cuenta</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

      <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h2>Recuperacion de contraseña</h2>
      <p>Ingrese usuario y email, para que se le envie un correo con los instructivos para recuperar su contrasena</p>
    </div>
    <br>
    <form method="POST"  onSubmit="return validarRecuperaEmail()" action="">
      <td>
        <div class="panel panel-info">
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Nombre Usuario: </span>
            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" required="required">
          </div>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Email: </span>
            <input type="email" class="form-control" name="email" id="email" required="required">
          </div>
          
        </div>
      </td>
      <td>
        <button class="btn btn-info" type="submit" name="enviar" id="enviar">Enviar</button>
      </td>
    </form>
  </div>
  

</body>
<footer>
</footer>
</html>