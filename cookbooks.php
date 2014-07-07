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
        <ul class="nav navbar-nav navbar-right"></ul></ul>
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
        <a href="/JAMP/PORTI/llamadaController.php?action=registrarme&clase=entidad"><span class="label label-info">Crear Cuenta </span></a>
      </div>
    </div><!--/.navbar-collapse -->
  </div>
      </div>

      <!-- Main jumbotron for a primary marketing message or call to action -->
  <div>
    <?php
        if(isset($_GET['noUsuario'])){
          $noUsuario=$_GET['noUsuario'];
          if($noUsuario==1){
            echo "<div class='alert alert-danger'>Error! Usuario o Constrasena incorrecto!</div>";
          }
        }
        if(isset($sePudoAlta)){
            echo" <div class='alert alert-success'>Exito! Ya forma parte de nuestro sistema!!</div>";
        }
    ?>
  </div>
  <div class="jumbotron">
    <div class="container">
      <h1>Bienvenidos!</h1>
      <p>Esto es un texto de prueba para ver como se ve nuestra página!</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=filtrar&clase=entidad">
        <select name="tipo">
          <option value="editorial">Editorial</option> 
          <option value="titulo">Titulo</option> 
          <option value="autor">Autor</option> 
          <option value="precio">Precio</option> 
          <option value="etiqueta">Etiqueta</option> 
        </select>
        <button class="btn btn-info" type="submit">Ordenar </button>
      </form>
    </div>
    <div class="col-md-6">
      <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=buscar&clase=entidad">
        <select name="busquedaEditorial">
          <?php
            foreach ($arrayNu as $kay){
              echo 
                "<option value='".$kay['nombre']."'>".$kay['nombre']."</option>";
            }
          ?>   
        </select>
        <select name="busquedaEtiqueta">
          <?php
            foreach ($arrayNo as $koy){
              echo  
                "<option value='".$koy['nombre']."'>".$koy['nombre']."</option>";
            }
          ?>  
        </select>
        <select name="busquedaAutor">
          <?php
            foreach ($arrayNe as $kuy){
              echo 
                "<option value='".$kuy['nombre']."'>".$kuy['nombre']."</option>";
            }
          ?>
        </select>
        <button class="btn btn-info" type="submit"> Buscar </button>
      </form>
    </div>
  </div>
  <br>
  <br>
    <table>

    <?php
      //var_dump($arrayNa);
      $contar=0;
      foreach ($arrayNa as $key){
        If($contar==0){
          echo "<div class='row'>";
        }
        $referencia= $key['referencia_foto'];
              echo  " <tr> 
                      <div class='col-md-3'>
                      <h2>".$key['titulo']."</h2>
                      <h4>".$key['editorial']."</h4>
                      <h4>".$key['autor']."</h4>
                      <h4>".$key['etiqueta']."</h4>
                      <h4>$".$key['precio']."</h4>
                      <p><img class= 'img-book' src='$referencia' alt = 'cocina3' ></p>                       
                      <br>
                      <p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
                      </div>
                      </tr>";
        $contar++;
        if ($contar==4){
          echo "</div>";
          $contar=0;
        }
      }
    ?>
  </table>
  <hr>

     <!-- </div>  /container -->
      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->
</body>
</html>