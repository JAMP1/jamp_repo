<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Busqueda de usuarios</title>
      <script type="text/javascript" src="/JAMP/JS/eventosDeTeclas.js"></script>

    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/JS/validar.js" type="text/javascript"></script>
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
          <li><a href ="../PORTI/llamadaController.php?action=verVentasGenerales&clase=entidad">Ventas generales</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=busquedaLibros&clase=entidad">Busqueda libros </a></li>
          <li class="active"><a href ="#">Busqueda usuarios </a></li> 
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div>
    </nav>      
    <div class="container">   
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><i class='glyphicon glyphicon-search'></i> Busqueda de usuarios registrados entre dos fechas</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">   
    <div class="row table-bordered">
      <div class="col-md-6">
        <form class="form-horizontal" onSubmit="return validarFechaParaBusqueda()" method="post" action="/JAMP/PORTI/llamadaController.php?action=efectuarBusquedaUsuarios&clase=entidad">   
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Fecha inicial</h3>
            </div>
            <div class="input-group">
              <span class="input-group-addon">Fecha</span>
              <input type="date" class="form-control input-small" id="fecha_inicial" name="fecha_inicial" required="required"> 
            </div> 
          </div>
        </div>
        <div class="col-md-6">              
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Fecha final</h3>
            </div>
            <div class="input-group">
              <span class="input-group-addon">Fecha</span>
              <input type="date" class="form-control input-small" id="fecha_final" name="fecha_final" required="required"> 
            </div>         
          </div> 
        </div>                 
      <button class=' btn btn-danger navbar-right' type='submit' > Buscar </button>
    </form>
    </div> 
    </div> 
    <br>
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <?php
            if(isset($arrayNa)){
              echo "<h3 class='panel-title'>Usuarios registrados entre las fechas seleccionadas</h3>";
            }
          ?>
        </div>
        <table class="table table-centered table-bordered">
          <?php 
            if(isset($arrayNa)){
              if(count($arrayNa)>0){
                echo "
                    <td class='separados'><p>Nombre</p></td>
                    <td class='separados'><p>Apellido</p></td>
                    <td class='separados'><p>Email</p></td>                      
                    <td class='separados'><p>Telefono</p></td>
                    <td class='separados'><p>Numero de documento</p></td>
                    <td class='separados'><p>Nombre de usuario</p></td>
                    <td class='separados'><p>Tipo de usuario</p></td>
                    <td class='separados'><p>Fecha de alta</p></td>
                    <td class='separados'><p>Estado de cuenta</p></td>                  
                  </tr>
                ";
                foreach($arrayNa as $key){
                  echo "
                      <td class='separados'><p>".$key['nombre']."</p></td>
                      <td class='separados'><p>".$key['apellido']."</p></td>
                      <td class='separados'><p>".$key['email']."</p></td>
                      <td class='separados'><p>".$key['telefono']."</p></td>
                      <td class='separados'><p>".$key['dni']."</p></td>                      
                      <td class='separados'><p>".$key['usuario']."</p></td>
                      <td class='separados'><p>".$key['tipo_usuario']."</p></td>
                      <td class='separados'><p>".$key['fecha']."</p></td>
                      <td class='separados'><p>".$key['estado']."</p></td>
                    </tr>
                  ";
                }
              }else{
                echo "<div class='alert alert-danger'>No han habido usuarios registrados en el intervalo seleccionado!</div>";
              }
            }
          ?>
        </table>
      </div>
    </div>
    <div id="socalo">
  </div>   
  </body>
</html>
