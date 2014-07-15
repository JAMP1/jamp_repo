<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Libros</title>
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
  <body class="laboratorix">
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
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=cargarLibro&clase=entidad">Administrar Libros </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=altaLibro&clase=entidad">Alta Libro </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosLibro&clase=entidad">Libros Borrados </a></li>
          <li class="active"><a href ="#">Busqueda libros </a></li>
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
            <h3 class="panel-title"><i class='glyphicon glyphicon-search'></i> Busqueda de libros vendidos entre dos fechas</h3>
          </div>
          <table class="table table-centered">
            <form class="form-horizontal" onSubmit="return validarFechaParaBusqueda()" method="post" action="/JAMP/PORTI/llamadaController.php?action=efectuarBusqueda&clase=entidad">
              <br>    
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title">Fecha inicial</h3>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Dia</span>
                  <input type="text" class="form-control input-small" placeholder="dd" id="dia_inicial" name="dia_inicial" required="required"> 
                  <span class="input-group-addon">Mes</span>   
                  <input type="text" class="form-control input-small" placeholder="mm" id="mes_inicial" name="mes_inicial" required="required">
                  <span class="input-group-addon">Año</span>
                  <input type="text" class="form-control input-small" placeholder="aaaa" id="anio_inicial" name="anio_inicial" required="required">
                </div>              
                <div class="input-group">
                  <span class="input-group-addon">Hora (opcional)</span>
                  <input type="text" class="form-control input-small" placeholder="00" id="hora_inicial" name="hora_inicial">
                  <span class="input-group-addon">Minutos (opcional)</span>
                  <input type="text" class="form-control input-small" placeholder="00" id="minuto_inicial" name="minuto_inicial">
                </div>         
              </div>    
              <div class="panel panel-warning">
                <div class="panel-heading">
                  <h3 class="panel-title">Fecha final</h3>
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Dia</span>
                  <input type="text" class="form-control input-small" placeholder="dd" id="dia_final" name="dia_final" required="required"> 
                  <span class="input-group-addon">Mes</span>   
                  <input type="text" class="form-control input-small" placeholder="mm" id="mes_final" name="mes_final" required="required">
                  <span class="input-group-addon">Año</span>
                  <input type="text" class="form-control input-small" placeholder="aaaa" id="anio_final" name="anio_final" required=" required">
                </div>              
                <div class="input-group">
                  <span class="input-group-addon">Hora (opcional)</span>
                  <input type="text" class="form-control input-small" placeholder="00" id="hora_final" name="hora_final">
                  <span class="input-group-addon">Minutos (opcional)</span>
                  <input type="text" class="form-control input-small" placeholder="00" id="minuto_final" name="minuto_final">
                </div>         
              </div>                    
              <button class=' btn btn-danger navbar-right' type='submit' > Buscar </button>
            </form>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
