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
        <!--  <form  class="navbar-form navbar-right" onSubmit="return confirmar()" method="post" action="/JAMP/PORTI/llamadaController.php?action=bajaUsuarioRegistrado&clase=entidad">
            <button class="btn btn-info" type="submit"> Darme de Baja </button>
          </form>-->
          <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=mostrarPerfil&clase=entidad&id_usuario"=<?php echo $_SESSION['id_usuario']?>>
            <?php
              echo "<input type='hidden' name='id_usuario' value='".$_SESSION['id_usuario']."'>";
            ?>
            <button class="btn btn-info" type="submit">Mi perfil </button>
          </form>
          <form class="navbar-form navbar-right" method="post" action="/JAMP/PORTI/llamadaController.php?action=verTodasLasVentas&clase=entidad">
            <button class=' btn btn-info navbar-right' type='submit' > Mis Compras </button>
          </form>
          <?php 
            echo "<form class='navbar-form navbar-right' method='POST' onSubmit='' action='/JAMP/PORTI/llamadaController.php?action=cargarCarrito&clase=entidad'>
                  <input name='idUsuario' type='hidden' value='".$_SESSION['id_usuario']."'/>           
                  <button class='btn btn-info' type='submit'> Mi Carrito </button>
                  </form>";
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
        <!--<h1>Bienvenidos!</h1>-->
        <img src="/JAMP/IMG/cookbooks.png" width="390px" height="160px">
        <!--<p>Esto es un texto de prueba para ver como se ve nuestra página!</p>-->
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
                  echo "<option value='".$kay['nombre']."'>".$kay['nombre']."</option>";
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
      <?php
        $contar=0;
        $i=0;
        if(isset($arrayNa)){
          if(count($arrayNa)>0){
            foreach ($arrayNa as $key){
              if($contar==0){
                echo"<div class='row'>";
              }              
              //PUEDE SER QUE SE PUDRA TODO CUANDO HAGA ALGUNOS CAMBIOS
              //VER BIEN LOS INDICES DE LO QUE SE CARGA EN EL ARREGLO 
              //EN EL MODULO DE ENTIDAD CONTROLLER Y TAMBIÉN EN EL LOGIN CONTROLLER
              //DEBO VER COMO PONERLE UNA MARCA DE QUE YA ESTÁ EN EL CARRITO
              if($key['marca']){
                $marca= " 
                  <form>
                    <button class='btn btn-warning' type='button'> Agregado al carrito <i class='glyphicon glyphicon-ok'></i></button>
                  </form>";
              }else{
                $marca= " 
                  <form method='post' onSubmit='return confirmar()' action='/JAMP/PORTI/llamadaController.php?action=agregarLibroCarrito&clase=entidad' >
                    <button class='btn btn-success' type='submit'> Agregar al carrito </button>
                    <input name='id_libro' type='hidden' value='".$key['id_libro']."'>
                  </form>";
              }
              $referencia= $key['referencia_foto'];
              $titulo=$key['titulo'];
              $detalle= $key['detalle_libro'];
              $detalle_autor= $key['detalle_autor'];
              echo  " <div class='col-md-3'>
                      <h2>Titulo: ".$key['titulo']."</h2>
                      <h4>Editorial: ".$key['editorial']."</h4>
                      <h4>Autor: ".$key['autor']."</h4>
                      <h4>Tag: ".$key['etiqueta']."</h4>
                      <h4>$".$key['precio']."</h4>
                      <p><img class='img-book img-rounded' src='$referencia' alt='cocina3' height='200' weight='200'></p>
                      <br>
                      <button class='btn btn-primary' data-toggle='modal' data-target='#myModal".$i."'>
                    Ver detalles &raquo;
                  </button>
                  <div class='modal fade' id='myModal".$i."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                          <h4 class='modal-title' id='myModalLabel'>Detalles del libro: ".$titulo."</h4>
                        </div>
                        <div class='modal-body'>
                          <textarea readonly cols='60' rows='5' class='form-control' name='detalle_libro' id='detalle_libro' >".$detalle."</textarea>
                          <p>Detalle del autor: ".$key['autor']."</p>
                          <textarea readonly cols='60' rows='5' class='form-control' name='detalle_libro' id='detalle_libro' >".$detalle_autor."</textarea>
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                      ";
                      $i++;
              echo  $marca;
              echo "  </div> ";
              $contar++;
              if ($contar%4==0){
                echo"</div>";
                $contar=0;
              }
            } 
          }
        }
        echo "</div>
        <div class='row'>";
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
        if(sizeof($todo)==0){
          echo "<div class='alert alert-warning' role='alert'>No se encontraron libros con ese criterio</div>";
        }
        echo "</tr>
              </table>";
        echo "</div>";
        echo "</div>";
        //<p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
      ?>
     <!-- </div>  /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->
  </body>
</html>