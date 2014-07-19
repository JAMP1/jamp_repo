<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Usuarios</title>
    <script type="text/javascript" src="/JAMP/JS/eventosDeTeclas.js"></script>
    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
  </head>
  <body class="laboratorix" onkeydown="presionaTecla()">
    <nav class="navbar navbar-inverse" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=admin">Inicio </a></li>
          <li><a href ="../PORTI/llamadaController.php?action=cargarUsuario&clase=entidad">Administrar Usuarios </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=registroAdmin&clase=entidad">Alta Usuario </a></li>
          <li class= "active"><a href ="#">Usuarios Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-centered">
          <tr>
            <td class="separados"><p>Nombre</p></td>
            <td class="separados"><p>Apellido</p></td>
            <td class="separados"><p>Email</p></td>
            <td class="separados"><p>Telefono</p></td>
            <td class="separados"><p>Direccion</p></td>
            <td class="separados"><p>Numero de documento</p></td>
            <td class="separados"><p>Nombre de Usuario</p></td>       
            <td class="separados"><p>Tipo de Usuario</p></td>
            <td class="separados"><p>Eliminar Usuario</p></td>
          </tr> 
          <?php
            foreach ($arrayNa as $key){
              if($key["permiso"]==1){
                $nombre_rol= "Administrador";
              }else{
                $nombre_rol="Usuario";
              }
              echo "
                <tr>
                  <td class='separados'><p>".$key["nombre"]."</p></td>
                  <td class='separados'><p>".$key["apellido"]."</p></td> 
                  <td class='separados'><p>".$key["email"]."</p></td>
                  <td class='separados'><p>".$key["telefono"]."</p></td>
                  <td class='separados'><p>".$key["direccion"]."</p></td>
                  <td class='separados'><p>".$key["dni"]."</p></td>
                  <td class='separados'><p>".$key["nombreUsuario"]."</p></td>  
                  <td class='separados'><p>".$nombre_rol."</p></td>                    
                  <td>
                    <form onSubmit='return confirmar()' action='/JAMP/PORTI/llamadaController.php?action=agregarBorradoUsuario&clase=entidad' method='post'>
                      <input type='hidden' name= 'id_usuario' value='".$key['id_usuario']."'> 
                      <input type='hidden' name= 'permiso' value='".$key['permiso']."'> 
                      <button class='btn btn-success' type='submit'>Restaurar</button>
                    </form>
                  </td>
                </tr>
              ";
            }
          ?>      
      </div>
    </div>
    <div id="socalo">
  </div>  
  </body>
</html>
