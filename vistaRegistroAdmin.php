<!DOCTYPE HTML>
<html>
  <head>
    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
            <ul class="nav navbar-nav">
              <li><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=admin">Inicio </a></li>
                <li><a href="../PORTI/llamadaController.php?action=cargarUsuario&clase=entidad">Administrar Usuarios </a></li>
                <li class="active"><a href ="#">Alta Usuario </a></li>
                <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosUsuario&clase=entidad">Usuarios Borrados </a></li>
            </ul>
            <!--<li><a class="active" href="../PORTI/llamadaController.php?action=cargarIdioma"> Administración Idioma </a></li>
            <li><a class="active" href="../PORTI/llamadaController.php?action=cargarLibro"> Administración Libro</a></li>
            <li><a class="active" href="../PORTI/llamadaController.php?action=cargarUsuario"> Usuario </a></li>
            <li><a class="active" href="../PORTI/llamadaController.php?action=cargarVenta"> Ventas </a></li>-->
            <ul class="nav navbar-nav navbar-right">
            <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
            </ul>
          </div>
          
        </div><!--/.navbar-collapse -->
      </div>
    </div>
</div>
  </head>
  <body>
    <div>
      <?php
        if(isset($existe)){
          echo "<div class='alert alert-danger'>Error! Ya existe registrado el usuario ingresado</div>";
        }
        if(isset($sePudoAlta)){
          echo" <div class='alert alert-success'>Felicidades! Ya forma parte de nuestro sistema!!</div>";
        }
      ?>
    </div>


   <form onsubmit="return validaUsuario()" action="/JAMP/PORTI/llamadaController.php?action=registrarAdministrador&clase=entidad" method="post">
      <div class="panel panel-info">
      <table class="table table">
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Nombre</span>
            <input type="text" class="form-control" name="nombre" id="nombre" required="required">
          </div>
          </td>
        </tr>
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Apellido</span>
            <input type="text" class="form-control"  name="apellido" id="apellido" required="required">
          </div>
          </td>
        </tr>
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Email</span>
            <input type="email" class="form-control"  name="email" id="email" required="required">
          </div>
          </td>
        </tr>
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Telefono</span>
            <input type="text" class="form-control"  name="telefono" id="telefono" required="required">
          </div>
          </td>
        </tr>
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">DNI</span>
            <input type="text" class="form-control"  name="dni" id="dni" required="required" >
          </div>
          </td>
        </tr>
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Usuario</span>
            <input type="text" class="form-control"  name="nombreusuario" id="nombreusuario" required="required"> 
          </div>
          </td>
        </tr>
        <tr>
        <td>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">Contrasena</span>
            <input type="password" class="form-control"  name="contrasena" required="required">        
            </div>
          </td>
        </tr>    
        <tr>
          <td>
            <div class="input-group input-group-lg">
              <span class="input-group-addon">Tipo de usuario</span>
                <select class="form-control" name="id_permiso" id="filtroEditorial" required="required" >
                    <option name="" value="" ></option>  
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
            </div>
          </td>
        </tr>

        <tr>
           <td>
            <button class="btn btn-info" type="submit">Enviar</button>
          </td>
        </td>
        </tr>
        </tr>
      </table>
    </div>
</form>



  </body>
</html>