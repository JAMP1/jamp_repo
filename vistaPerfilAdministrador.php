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
              <li ><a class="active" href="../PORTI/llamadaController.php?action=volverInicio&clase=admin"> Inicio </a></li>
              <li><a class="active" href="../PORTI/llamadaController.php?action=cargarEtiqueta&clase=entidad"> Administración Etiqueta </a></li>
              <li><a class="active" href="../PORTI/llamadaController.php?action=cargarAutor&clase=entidad"> Administración Autor</a></li>
              <li><a class="active" href="../PORTI/llamadaController.php?action=cargarEditorial&clase=entidad"> Administración Editorial</a></li>
              <li><a class="active" href="../PORTI/llamadaController.php?action=cargarLibro&clase=entidad"> Administración Libro</a></li>
              <li><a class="active" href="../PORTI/llamadaController.php?action=cargarUsuario&clase=entidad"> Administración Usuario</a></li>
            </ul>
            <!--<li><a class="active" href="../PORTI/llamadaController.php?action=cargarIdioma"> Administración Idioma </a></li>
            <li><a class="active" href="../PORTI/llamadaController.php?action=cargarLibro"> Administración Libro</a></li>
            <li><a class="active" href="../PORTI/llamadaController.php?action=cargarUsuario"> Usuario </a></li>
            <li><a class="active" href="../PORTI/llamadaController.php?action=cargarVenta"> Ventas </a></li>-->
            <ul class="nav navbar-nav navbar-right">
            <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
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
        </div>      
        </div><!--/.navbar-collapse -->
    </div>
  </div>
  <body>    
      <?php
      echo"
          <form onSubmit='return validaUsuario()' action='/JAMP/PORTI/llamadaController.php?action=modificarCliente&clase=entidad' method='post'>
                <div class='panel panel-info'>
                <table class='table table'>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>Nombre</span>
                      <input type='text' class='form-control' name='nombre' id='nombre' required='required' value= '".$cliente['nombre']."'>
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>Apellido</span>
                      <input type='text' class='form-control'  name='apellido' id='apellido' required='required' value='".$cliente['apellido']."'>
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>Email</span>
                      <input type='email' class='form-control'  name='email' required='required' value='".$cliente['email']."'>
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>Telefono</span>
                      <input type='text' class='form-control'  name='telefono' id='telefono' required='required' value='".$cliente['telefono']."'>
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>DNI</span>
                      <input type='text' class='form-control'  name='dni' id='dni' required='required' value='".$cliente['dni']."'>
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>Usuario</span>
                      <input type='text' class='form-control'  name='nombreUsuario' id='nombreUsuario' required='required' value= '".$cliente['nombreUsuario']."'> 
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td>
                    <div class='input-group input-group-lg'>
                      <span class='input-group-addon'>Contrasena</span>
                      <input type='password' class='form-control'  name='contrasena' required='required' value= '".$cliente['contrasena']."'>        
                      </div>
                    </td>
                  </tr>    
                  <tr>
                    <td>
                      <input type='hidden' name= 'id_usuario' value='".$idUsuario."'> 
                      <button class='btn btn-info' type='submit'>Modificar</button>
                    </td>
                  </td>
                  </tr>
                  </tr>
                </table>
              </div>
          </form>";
        ?>
    </body>

