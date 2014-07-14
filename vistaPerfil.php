<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigologin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <!--<script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>-->
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
            <li><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=user"> Inicio </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <button class="active btn btn-primary" type="button">Mi perfil </button>
          </form>
          <form class="navbar-form navbar-right" method="post" action="/JAMP/PORTI/llamadaController.php?action=verTodasLasVentas&clase=entidad">
            <button class='btn btn-info navbar-right' type='submit' > Mis Compras </button>
          </form>
          <?php 
            echo "<form class='navbar-form navbar-right' method='POST' action='/JAMP/PORTI/llamadaController.php?action=cargarCarrito&clase=entidad'>
                  <input name='idUsuario' type='hidden' value='".$id_usuario."'/>
                  <button class='btn btn-info' type='submit'> Mi Carrito </button>
                  </form>";            
          ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <div class="col-md-12">
      <?php
      if(isset($niAPalo)){
        echo "<div class='alert alert-danger'>Error! Ya existe el DNI o Nombre de Usuario ingresado</div>";
      }
    ?>
      <form method="POST"  onSubmit = "return validaUsuario()" action="/JAMP/PORTI/llamadaController.php?action=modificarCliente&clase=entidad" >
        <div class="panel panel-info">
          <table class="table table">
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Nombre</span>
                  <?php
                    if(isset($nombre)){
                      echo "<input type='text' value='".$nombre."' class='form-control' name='nombre' id='nombre' required='required'>";
                    }else{
                      echo "<input type='text' value='".$cliente['nombre']."' class='form-control' name='nombre' id='nombre' required='required'>";
                    }
                  ?>
                </div>
               <!-- <input id="nombre" type="text" placeholder="Nombre Libro" name="nom_libro">-->
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Apellido</span>
                  <?php
                    if(isset($apellido)){
                      echo "<input type='text' value='".$apellido."' class='form-control' name='apellido' id='apellido' required='required'>";
                    }else{
                      echo "<input type='text' value='".$cliente['apellido']."' class='form-control' name='apellido' id='apellido' required='required'>";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Email</span>
                  <?php
                    if(isset($email)){
                      echo "<input type='email' value='".$email."' class='form-control' name='email' id='email' required='required'>";
                    }else{
                      echo "<input type='email' value='".$cliente['email']."' class='form-control' name='email' id='email' required='required'>";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Telefono</span>
                  <?php
                    if(isset($telefono)){
                      echo "<input type='text' value='".$telefono."' class='form-control' name='telefono' id='telefono' required='required'>";
                    }else{
                      echo "<input type='text' value='".$cliente['telefono']."' class='form-control' name='telefono' id='telefono' required='required'>";
                    }
                  ?>
                </div>
                <!--<input id="nombre" type="text" placeholder="Cantidad de libros" name="cant_libro">-->
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">DNI</span>
                  <?php
                    if(isset($dni)){
                      echo "<input type='text' value='".$dni."' class='form-control' name='dni' id='dni' required='required'>";
                    }else{
                      echo "<input type='text' value='".$cliente['dni']."' class='form-control' name='dni' id='dni' required='required'>";
                    }
                  ?>
                </div>
              <!--  <input id="nombre" type="text" placeholder="Precio" name="precio_libro">-->
              </td>
            </tr>
            <tr>
              <td>
                <!--<input id="nombre" type="text" placeholder="Editorial" name="editorial_libro"> -->
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Usuario</span>
                  <?php
                    if(isset($nombreUsuario)){
                      echo "<input type='text' value='".$nombreUsuario."' class='form-control' name='nombreUsuario' id='nombreUsuario' required='required'>";
                    }else{
                      echo "<input type='text' value='".$cliente['nombreUsuario']."' class='form-control' name='nombreUsuario' id='nombreUsuario' required='required'>";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <!--<input id="nombre" type="text" placeholder="Ingrese etiqueta" name="etiqueta_libro">-->
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Contrasena</span>
                  <?php
                    if(isset($contrasena)){
                      echo "<input type='password' value='".$contrasena."' class='form-control' name='contrasena' id='contrasena' required='required'>";
                    }else{
                      echo "<input type='password' value='".$cliente['contrasena']."' class='form-control' name='contrasena' id='contrasena' required='required'>";
                    }
                  ?>   
                </div>
              </td>
            </tr>            
            <tr>
              <td>
                <?php
                  echo "<input type='hidden' name= 'id_usuario' value='".$id_usuario."'>";
                ?>
                <button class='btn btn-info' type='submit'>Modificar</button>              
              </td>
            </tr>
          </table>
        </div>
      </form>
      <form class="navbar-form navbar-right" onSubmit="return confirmar()" method="post" action="/JAMP/PORTI/llamadaController.php?action=bajaUsuarioRegistrado&clase=entidad">
        <button class=' btn btn-danger navbar-right' type='submit' > Darme de Baja </button>
      </form>     
    </div><!-- col-md-12 -->
  </body>
</html>