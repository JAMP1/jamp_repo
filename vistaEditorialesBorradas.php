<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Editoriales</title>
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
          <li class="activa"><a href ="/JAMP/PORTI/llamadaController.php?action=cargarEditorial&clase=entidad">Administrar Editoriales</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=altaEditorial&clase=entidad">Alta Editorial </a></li>
          <li class="active"><a href ="#">Editoriales Borradas </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Editoriales borradas</h3>
          </div>
          <table class="table table-centered">
            <tr>
              <td class="separados"><p>Nombre</p></td>
              <td class="separados"><p>Restaurar Editorial</p></td>
            </tr>
            <tr>
              <?php
                foreach ($arrayNa as $key){
                  echo  "
                      <td class='separados'><p>".$key['nombre']."</p></td>
                      <td class='separados'>
                        <form method='POST' onSubmit='return confirmar()'' action='/JAMP/PORTI/llamadaController.php?action=agregarBorradaEditorial&clase=entidad'>
                          <input name='id_editorial' type='hidden' value='".$key['id_us']."'/>
                          <input type='submit' class='btn btn-success' value='Restaurar'/>
                        </form>
                      </td>
                    </tr>
                  ";
                }
              ?>
          </table>
        </div>
      </div>  
    </div>
    <div id="socalo">
  </div>  
  </body>
</html>