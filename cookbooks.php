<!DOCTYPE html>
<html>
<head>

<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<link rel="stylesheet" type="text/css" href="home.css"/>
<script src="./LIBS/jquery.js" type="text/javascript"></script>
<script src="./LIBS/codigologin.js" type="text/javascript"></script>
<script type="text/javascript" src="./LIBS/validar.js"></script>
<script type="text/javascript" src="./LIBS/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./LIBS/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./LIBS/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="./LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bienvenidos</title>

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <!-- <div class="container">-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <label class="navbar-brand">CookBooks</label> 
        </div>
        <div class="navbar-collapse collapse" id="menu">

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="index.php"> Inicio </a></li>
            <!--<li><a class="active" href="#"> Quienes Somos</a></li>
            <li><a class="active" href="#"> Contacto</a></li>
            <li><a class="active" href="#"> Libros</a></li>-->
            <ul class="nav navbar-nav navbar-right"></ul>
          </div>
          <div>
        <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=login&clase=loginClase">
            <div class="form-group">
              <input type="text" id="username" placeholder="Usuario" class="form-control" placeholder="Usuario" name="username" value="" required="required" />
            </div>
            <div class="form-group">
              <input type="password" placeholder="Contraseña" class="form-control" id="password" name="password" required="required" />
            </div>
            <button type="submit" id="_submit" class="btn btn-success" name="_submit" >Entrar</button>
          </form>
          <button type="submit" id="_crearCuenta" class="btn btn-success" name="_crearCuenta">Crear Cuenta </button>
        </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenidos!</h1>
        <p>Esto es un texto de prueba para ver como se ve nuestra página!</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Libro1</h2>
          <p><img class="img-book" src="IMG/libro1.jpg" alt="cocina1"></p>
          <br>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Libro2</h2>
          <p><img class="img-book" src="IMG/libro2.jpg" alt="cocin2"></p>
          <br>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Libro3</h2>
          <p><img class="img-book" src="IMG/libro3.jpg" alt="cocina3"></p>
          <br>
          <p><a class="btn btn-default" href="#" role="button">Ver detalles &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
   <!-- </div>  /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>