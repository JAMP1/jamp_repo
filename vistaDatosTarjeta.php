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
          <form class="navbar-form navbar-right" method="post" action="/JAMP/PORTI/llamadaController.php?action=verTodasLasVentas&clase=entidad">
            <button class='btn btn-info navbar-right' type='submit' > Mis Compras </button>
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
    <div class="jumbotron">
      <div class="container">
        <h3>Solicitud de compra por: <span class='glyphicon glyphicon-usd'></span><?php echo $precioTotal ; ?></h3>
        <h4>Ingrese los datos de la tarjeta de credito:</h4>
      </div>
      <br>
      <form method="POST" onSubmit="return validarTarjeta()" action="/JAMP/PORTI/llamadaController.php?action=comprarLibro&clase=entidad">
        <td>
          <div class="panel panel-info">
            <div class="input-group input-group-lg">
              <span class="input-group-addon">Numero de tarjeta:</span>
              <input type="text" class="form-control" name="numero_tarjeta" id="numero_tarjeta" required="required">
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon">Numero de seguridad: </span>
              <input type="password" class="form-control" name="numero_seguridad" id="numero_seguridad" required="required">
            </div>
            <div class="input-group input-group-lg">
              <span class="input-group-addon">Fecha de vecimiento:</span>
              <input type="text" class="form-control" placeholder="mm/aaaa" name="fecha_vencimiento" id="fecha_vencimiento" required="required">
            </div>              
          </div>
        </td>
        <td>
          <input type="hidden" value="<?php echo $id_carrito ?>" name="id_carrito">
          <input type="hidden" value="<?php echo $idUsuario ?>" name="idUsuario">
          <input type="hidden" value="<?php echo $stringCantidades ?>" name="stringCantidades">
          <input type="hidden" value="<?php echo $stringPrecios ?>" name="stringPrecios">
          <input type="hidden" value="<?php echo $precioTotal ?>" name="precioTotal">
          <button class="btn btn-info" type="submit" name="enviar" id="enviar">Confirmar Compra</button>
        </td>
      </form>
      <?php
        echo "
          <form class='navbar-form navbar-right' method='POST' onSubmit='' action='/JAMP/PORTI/llamadaController.php?action=cargarCarrito&clase=entidad'>
            <input name='idUsuario' type='hidden' value='".$_SESSION['id_usuario']."'/>           
            <button class='btn btn-warning' type='submit'> Volver al carrito </button>
          </form>";
      ?>
    </div>
  </body>
</html>