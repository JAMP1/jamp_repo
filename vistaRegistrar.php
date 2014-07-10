<!DOCTYPE HTML>
<html>
  <head>
    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
   <!-- <script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>-->
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
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
      <ul class="nav navbar-nav">
        <li><a href ="/JAMP/index.php"> Inicio </a></li>        
      </ul>
      <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=login&clase=loginClase">
      <div class="form-group">
      <input type="text" id="username" placeholder="Usuario" class="form-control" placeholder="Usuario" name="username" value="" required="required" />
      </div>
      <div class="form-group">
      <input type="password" placeholder="Contraseña" class="form-control" id="password" name="password" required="required" />
      </div>
      <button type="submit" id="_submit" class="btn btn-info" name="_submit" >Entrar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Crear Cuenta</a></li>
        <li><a href="/JAMP/PORTI/llamadaController.php?action=publicoInicio&clase=entidad&olvideMiContrasena=true">Olvide mi contraseña</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div>
      <?php
        if(isset($niAPalo)){
          echo "<div class='alert alert-danger'>Error! Ya existe registrado el usuario ingresado</div>";
         // echo "<h4>Ya existe el nombre ingresado, busque en la lista o en los borrados</h4>";
        }
        if(isset($sePudoAlta)){
          echo" <div class='alert alert-success'>Felicidades! Ya forma parte de nuestro sistema!!</div>";
        }
      ?>
    </div>
    <div class="col-md-12">
      <form onSubmit="return validaUsuario()" action="/JAMP/PORTI/llamadaController.php?action=registrarCliente&clase=entidad" method="post">
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
                      echo "<input type='text' value='' class='form-control' name='nombre' id='nombre' required='required'>";
                    }
                  ?>
                 <!-- <input type="text" class="form-control" name="nombre" required="required">-->
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
                      echo "<input type='text' value='' class='form-control' name='apellido' id='apellido' required='required'>";
                    }
                  ?>
                <!--  <input type="text" class="form-control"  name="apellido" required="required">-->
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
                      echo "<input type='email' value='' class='form-control' name='email' id='email' required='required'>";
                    }
                  ?>
            <!--      <input type="email" class="form-control"  name="email" required="required">-->
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
                      echo "<input type='text' value='' class='form-control' name='telefono' id='telefono' required='required'>";
                    }
                  ?>
           <!--       <input type="text" class="form-control"  name="telefono" required="required">-->
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
                      echo "<input type='text' value='' class='form-control' name='dni' id='dni' required='required'>";
                    }
                  ?>
         <!--         <input type="text" class="form-control"  name="dni" required="required">-->
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
                      echo "<input type='text' value='' class='form-control' name='nombreUsuario' id='nombreUsuario' required='required'>";
                    }
                  ?>
          <!--        <input type="text" class="form-control"  name="nombreusuario" required="required"> -->
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
                <button class="btn btn-info" type="submit">Enviar</button>
              </td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </body>
</html>