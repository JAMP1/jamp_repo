<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Libros</title>
   <!-- <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>-->
    <script src="/JAMP/JS/validar.js" type="text/javascript"></script>
   <!-- <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.js"></script>-->
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
  </head>
  <body class="laboratorix">
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
            <li><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=user"> Inicio </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
          </ul>
          <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=mostrarPerfil&clase=entidad&id_usuario"=<?php echo $_SESSION['id_usuario']?>>
            <?php
              echo "<input type='hidden' name='id_usuario' value='".$_SESSION['id_usuario']."'>";
            ?>
            <button class="btn btn-info" type="submit">Mi perfil </button>
          </form>
          <form class="navbar-form navbar-right" method="post" action="">
            <button class='active btn btn-primary navbar-right' type='button' > Mis Compras </button>
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
    <div class="col-md-12">
      <div class="panel panel-info">
        <table class="table table-centered">
          <?php 
            if(isset($arregloVentas)){
          //    if(count($arregloVentas)>1){
                echo "
                    <tr>
                      <td class='separados'><p>Fecha de compra</p></td>
                      <td class='separados'><p>Nombre</p></td>
                      <td class='separados'><p>ISBN</p></td>
                      <td class='separados'><p>Cantidad libros</p></td>                      
                      <td class='separados'><p>Precio general</p></td>
                      <td class='separados'><p>Estado</p></td>
                    </tr>
                  ";
                foreach($arregloVentas as $key){
                  echo "
                    <tr>
                      <td class='separados'><p>".$key['fecha']."</p></td>
                      <td class='separados'><p>".$key['nombre']."</p></td>
                      <td class='separados'><p>".$key['isbn']."</p></td>
                      <td class='separados'><p>".$key['cantidad_comprada']."</p></td>
                      <td class='separados'><p>$".$key['precio']*$key['cantidad_comprada']."</p></td>
                      <td class='separados'><p>".$key['nombre_estado']."</p></td>
                    </tr>
                  ";
                }
                if(isset($total)){
                  echo "<tr>
                          <td class='separados'><p>Precio total</p></td>
                          <td class='separados'><p>$".$total."</p></td>
                        </tr>";
                }
          //    }else{
                /*echo "
                  <tr>
                    <td class='separados'><p>Compra realizada el ".$arregloVentas[0]['fecha']." </p></td>
                    <td class='separados'><p></p></td>
                  </tr>
                  <tr>
                    <td class='separados'><p>Nombre</p></td>
                    <td class='separados'><p>ISBN</p></td>
                    <td class='separados'><p>Cantidad pag</p></td>
                    <td class='separados'><p>Precio</p></td>
                    <td class='separados'><p>Estado</p></td>
                  </tr>
                ";
                foreach ($arregloVentas as $key) {
                  echo "
                    <div class='row'>
                      <tr>
                        <td class='separados'><p>".$key['nombre']."</p></td>
                        <td class='separados'><p>".$key['isbn']."</p></td>
                        <td class='separados'><p>".$key['cantPag']."</p></td>
                        <td class='separados'><p>".$key['precio']."</p></td>
                        <td class='separados'><p>".$key['nombre_estado']."</p></td>
                      </tr>
                    </div> 
                  ";
                }
                if(isset($total)){
                  echo "<tr>
                          <td class='separados'><p>Precio total</p></td>
                          <td class='separados><p>".$total."</p></td>
                        </tr>";
                }*/
          //    }
            }else{
              echo "<div class='alert alert-warning'>Usted no ha realizado ninguna compra</div>";
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>