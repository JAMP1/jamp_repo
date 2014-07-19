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
          <li class="active"><a href ="#">Administrar Usuarios </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=registroAdmin&clase=entidad">Alta Usuario </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosUsuario&clase=entidad">Usuarios Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <?php
        if(isset($existe)){
          echo "<div class='alert alert-danger'>Error! Ya existe registrado el usuario ingresado</div>";
         // echo "<h4>Ya existe el nombre ingresado, busque en la lista o en los borrados</h4>";
        }
        if(isset($sePudoAlta)){
          echo" <div class='alert alert-success'>Exito! El usuario es parte de nuestro sistema!!</div>";
        }
        if(isset($bajaOk)){
          echo" <div class='alert alert-success'>Exito! El usuario ha sido borrado correctamente</div>";
          echo" <div class='alert alert-info'>Acceda a Usuarios Borrados si desea revertir esta accion</div>";
        }
        if(isset($reAltaOk)){
          echo" <div class='alert alert-success'>Exito! Se ha re-agregado el usuario correctamente!!</div>";
        }
        if(isset($noBajaASiMismo)){
          echo "<div class='alert alert-danger'>Error! Para darse de baja a usted mismo debe hacerlo desde el inicio con el boton Darme de Baja</div>";
        }    
      ?>
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
                    <form onSubmit='return confirmar()' action='/JAMP/PORTI/llamadaController.php?action=bajaUsuario&clase=entidad' method='post'>
                      <input type='hidden' name= 'id_usuario' value='".$key['id_usuario']."'> 
                      <input type='hidden' name= 'permiso' value='".$key['permiso']."'> 
                      <button class='btn btn-danger' type='submit'>Eliminar</button>
                    </form>
                  </td>
                </tr>
              ";
            }
          ?>
        </table>
      </div>
    </div>
    <div id="socalo">
  </div>    
  </body>
</html>
