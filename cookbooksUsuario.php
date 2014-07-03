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
            <li class="active"><a href ="#"> Inicio </a></li>
            <!--<li><a class="active" href="#"> Quienes Somos</a></li>
            <li><a class="active" href="#"> Contacto</a></li>
            <li><a class="active" href="#"> Libros</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
          <?php 
            //echo $_COOKIE["IdCookie"];
            echo "<form method='POST' onSubmit='' action='/JAMP/PORTI/llamadaController.php?action=cargarCarrito&clase=entidad'>
                  <input name='idUsuario' type='hidden' value='".$_SESSION['id_usuario']."'/>
                  
                  <input type='submit' class='btn btn-info' value='MI CARRITO'/>";
            
          ?>
            </ul>
          </div>

          <div>
        <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=login&clase=loginClase">
            <div class="form-group">
              <ul class="nav navbar-nav navbar-right">
            <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
           </ul>
           </div>
        </form>
           <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=mostrarPerfil&clase=entidad&id_usuario"=<?php echo $_SESSION['id_usuario']?>>
            <?php
            echo "<input type='hidden' name='id_usuario' value='".$_SESSION['id_usuario']."'>";
            ?>
            <button type="submit">Mi perfil </button>
          </form>
        </div>
        
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <?php
        if(isset($sePudoModificarUsuario)){
              echo "<div class='alert alert-success'>Se ha logrado modificar su informacion exitosamente!</div>";
        }
      ?>
      <div class="container">
        <h1>Bienvenidos!</h1>
        <p>Esto es un texto de prueba para ver como se ve nuestra página!</p>
      </div>
    </div>

    

     <div class="container">
          <div class="row">


    <div class="col-md-4">
      <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=filtrarRegistrado&clase=entidad">
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
        <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=buscarRegistrado&clase=entidad">
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
                    
                    }?>
                  </select>
          <button class="btn btn-info" type="submit"> Buscar </button>
      </form>
    </div>
  </div>
  <br>
  <br>

          <?php
          if(isset($arrayNa)){
          if(count($arrayNa)>0){
              foreach ($arrayNa as $key){
                echo  " <div class='col-md-3'>
                        <h2>".$key['titulo']."</h2>
                        <h4>".$key['editorial']."</h4>
                        <h4>".$key['autor']."</h4>
                        <h4>".$key['etiqueta']."</h4>
                        <h4>$".$key['precio']."</h4>
                        <p><img class='img-book' src='/JAMP/IMG/libro3.jpg' alt='cocina3'></p>
                        <br>
                        <p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
                      </div>";
              } 
            }
          }
            ?>
    </div>     
      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
   <!-- </div>  /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->
  </body>
</html>