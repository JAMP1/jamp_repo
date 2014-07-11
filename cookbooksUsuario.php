<!DOCTYPE html>
<html>
<head>

<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigologin.js" type="text/javascript"></script>
<script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>
<script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>

<script type="text/javascript" src="/JAMP/JS/validar.js"></script>

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
      <p class="navbar-text"> Identificado como: <?php echo "<span class='glyphicon glyphicon-hand-right'> ".$_SESSION['usuario']."</span>"; ?></p>
      <ul class="nav navbar-nav">
        <li class="active"><a href ="#"> Inicio </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
      </ul>
      <form  class="navbar-form navbar-right" onSubmit="return confirmar()" method="post" action="/JAMP/PORTI/llamadaController.php?action=bajaUsuarioRegistrado&clase=entidad">
        <button class="btn btn-info" type="submit"> Darme de Baja </button>
      </form>
      <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=mostrarPerfil&clase=entidad&id_usuario"=<?php echo $_SESSION['id_usuario']?>>
      <?php
      echo "<input type='hidden' name='id_usuario' value='".$_SESSION['id_usuario']."'>";
      ?>
      <button class="btn btn-info" type="submit">Mi perfil </button>
      </form>
      <?php 
      echo "<form class='navbar-form navbar-right' method='POST' onSubmit='' action='/JAMP/PORTI/llamadaController.php?action=cargarCarrito&clase=entidad'>
                  <input name='idUsuario' type='hidden' value='".$_SESSION['id_usuario']."'/>           
                  <button class='btn btn-info' type='submit'> Mi Carrito </button>";
      ?>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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

    <a name="nombreAncla"></a>
    <div class="col-md-4">
      <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=filtrarRegistrado&clase=entidad#nombreAncla">
                <select name="tipo">
                  <option value="editorial">Editorial</option> 
                  <option value="titulo">Titulo</option> 
                  <option value="autor">Autor</option> 
                  <option value="precio">Precio</option> 
                  <option value="etiqueta">Etiqueta</option> 
        </select>
        <button class="btn btn-info" type="submit"> Ordenar </button>
    </form>
    </div>
    <a name="nombreAnclaDos"></a>
    <div class="col-md-6">
        <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=buscarRegistrado&clase=entidad#nombreAnclaDos">
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
              $contar=0;
              if(isset($arrayNa)){
              if(count($arrayNa)>0){
                  foreach ($arrayNa as $key){
                    if($contar==0){
                      echo"<div class='row'>";
                    }
                    $referencia= $key['referencia_foto'];
                    echo  " <div class='col-md-3'>
                            <h2>Titulo: ".$key['titulo']."</h2>
                            <h4>Editorial: ".$key['editorial']."</h4>
                            <h4>Autor: ".$key['autor']."</h4>
                            <h4>Tag: ".$key['etiqueta']."</h4>
                            <h4>$".$key['precio']."</h4>
                            <p><img class='img-book' src='$referencia' alt='cocina3' height='200' weight='200'></p>
                            <br>
                            <p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
                          </div>";
                  $contar++;
                  if ($contar==4){
                    echo"</div>";
                    $contar=0;
                  }
                  } 
                }
              }
              
              echo "<div class='row'>";
              echo "<div class='col-md-4'>";
              echo "<table class='table'>
                        <tr>
                          <td>Cantidad de libros:
                          </td>
                          <td>
                            <span class='label label-info'>".sizeof($todo)."</span>
                          </td>
                        </tr>
                        <tr>
                        ";

                        if(sizeof($todo)==0)
                        {
                          echo "<div class='alert alert-warning' role='alert'>No se encontraron libros con ese criterio</div>";
                        }
                  echo  "
                        </tr>
                    </table>";
              echo "</div>";
              echo "</div>";
        ?>
   <!-- </div>  /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->
  </body>
</html>