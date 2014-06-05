<!DOCTYPE html>
<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
<link rel="stylesheet" type="text/css" href="./home.css"/>
<script src="../libs/jquery.js" type="text/javascript"></script>
<script src="../libs/codigologin.js" type="text/javascript"></script>
<script type="text/javascript" src="LIBS/validar.js"></script>
<script type="text/javascript" src="LIBS/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="LIBS/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="LIBS/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
            <div id="loginform">
              	<form method="POST" role="search" action="./PORTI/loginController.php?action=login">
                      <p><b>Usuario:</b></p>
                      <input type="text" id="username" size="8" placeholder="Usuario" name="username" value="" required="required" />
                      <p><b>Contraseña:</b></p>
                      <input type="password" size="8" placeholder="Password" id="password" name="password" required="required" />
                      <input type="submit"  id="_submit" class="btn btn-default" name="_submit" value="Entrar" />
                  <a href="#" class="btn btn-info btn-mini active">CREAR CUENTA</a>
                </form>
            </div>
          <style type="text/css">
          h1 {
            font-family: arial black;
            font-size: 13px;
          }
          </style>
      <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="clearfix"></div>
          <div id="menu">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-left">
              <li class="active"><a href=""><h1> Inicio</h1> </a></li>
              <li><a class="active" href="#"><h1> Quienes Somos</h1></a></li>
              <li><a class="active" href="#"><h1> Contacto</h1></a></li>
              <li><a class="active" href="#"><h1> Libros</h1></a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </div>

      </nav>
</body>
</html>