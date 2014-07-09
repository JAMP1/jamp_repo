<!DOCTYPE html>
<html>
<head>

<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigologin.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>-->
<script type="text/javascript" src="/JAMP/JS/validar.js"></script>-

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
            <p class="navbar-text"> Identificado como: <?php echo "<span class='glyphicon glyphicon-hand-right'> ".$_SESSION['usuario']."</span>"; ?></p>
             <ul class="nav navbar-nav navbar-left">
              <li><a href="../PORTI/llamadaController.php?action=volverInicio&clase=admin"> Inicio </a></li>  
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="../PORTI/llamadaController.php?action=cargarEtiqueta&clase=entidad"> Administración Etiqueta </a></li>
                  <li><a href="../PORTI/llamadaController.php?action=cargarAutor&clase=entidad"> Administración Autor</a></li>
                  <li><a href="../PORTI/llamadaController.php?action=cargarEditorial&clase=entidad"> Administración Editorial</a></li>
                  <li><a href="../PORTI/llamadaController.php?action=cargarLibro&clase=entidad"> Administración Libro</a></li>
                  <li><a href="../PORTI/llamadaController.php?action=cargarUsuario&clase=entidad"> Administración Usuario</a></li>
                  <li><a href="../PORTI/llamadaController.php?action=cargarIdioma&clase=entidad"> Administración Idiomas</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
            </ul>
          </div>
        </div><!--/.navbar-collapse -->
    </div>
  </div>
  <body>    
    <div>
      <?php
        if(isset($niAPalo)){
          echo "<div class='alert alert-danger'>Error! Ya existe el DNI o Nombre de Usuario ingresado</div>";
        }
        if(isset($sePudoModificarAdmin)){
          echo" <div class='alert alert-success'>Exito! Se ha modificado correctamente su informacion!!</div>";
        }
      ?>
    </div>
    <div class="col-md-12">
      <form onSubmit="return validaUsuario()" action="/JAMP/PORTI/llamadaController.php?action=modificarAdmin&clase=entidad" method="post">
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
                      echo "<input type='text' value='".$cliente['nombre']."' class='form-control' name='nombre' id='nombre' required='required' >";
                    }
                  ?>
                </div>
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
                      echo "<input type='text' value='".$cliente['apellido']."' class='form-control' name='apellido' id='apellido' required='required' >";
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
                      echo "<input type='email' value='".$cliente['email']."' class='form-control' name='email' id='email' required='required' >";
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
                      echo "<input type='text' value='".$cliente['telefono']."' class='form-control' name='telefono' id='telefono' required='required' >";
                    }
                  ?>
                </div>
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
                      echo "<input type='text' value='".$cliente['dni']."' class='form-control' name='dni' id='dni' required='required' >";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Usuario</span>
                  <?php
                    if(isset($nombreUsuario)){
                      echo "<input type='text' value='".$nombreUsuario."' class='form-control' name='nombreUsuario' id='nombreUsuario' required='required'>";
                    }else{
                      echo "<input type='text' value='".$cliente['nombreUsuario']."' class='form-control' name='nombreUsuario' id='nombreUsuario' required='required' >";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
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
                <button class="btn btn-info" type="submit">Modificar</button>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>  
  </body>
</html>