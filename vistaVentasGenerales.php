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
          <li class="active"><a href ="#">Ventas generales</a></li> 
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=busquedaLibros&clase=entidad">Busqueda libros </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=busquedaUsuarios&clase=entidad">Busqueda usuarios </a></li> 
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div>
    </nav>      
    <br>   
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Ventas Generales</h3>
        </div>
        <table class="table table-centered table-bordered">
          <?php 
            if(isset($arregloVentas)){
              if(count($arregloVentas)==0){
                echo" <div class='alert alert-danger'>No existen ventas en el sistema!!</div>";
              }else{
                echo "
                <div class='row'>
                  <tr>
                    <td class='separados'><p>Usuario</p></td>
                    <td class='separados'><p>Fecha</p></td>
                    <td class='separados'><p>Monto total</p></td>
                    <td class='separados'><p>Estado</p></td>
                    <td class='separados'><p>Detalle</p></td>
                    <td class='separados'><p>Actualizar estado</p></td>
                  </tr>
                </div>
                ";
                foreach ($arregloVentas as $key) {
                  echo "
                    <div class='row'>
                      <tr>
                        <td class='separados col-md-1'><p>".$key['nombre_usuario']."</p></td>
                        <td class='separados col-md-2'><p>".$key['fecha']."</p></td>
                        <td class='separados col-md-1'><p> $".$key['precio_total']."</p></td>
                        <td class='separados col-md-1'><p> ".$key['nombre_estado']."</p></td>                      
                        <td class='separados col-md-1'>
                          <form method='post' action='llamadaController.php?action=verDetalleVentaDeUsuario&clase=entidad'>
                            <input type='hidden' name='id_venta' value='".$key['id_venta']."'>
                            <button type='submit' class='btn btn-info'>
                              <span class='glyphicon glyphicon-eye-open'></span> Ver detalle
                            </button>
                          </form>
                        </td>
                        <td class='separados col-md-3'>
                        
                          <form method='post' class='form' action='/JAMP/PORTI/llamadaController.php?action=modificarVenta&clase=entidad'>                
                            <div class='input-group input-group col-md-6'>
                              <span class='input-group-addon'>Estado</span>
                              <select class='form-control' name='id_estado' id='id_estado' required='required' >";
                                if($key['estado']==1){
                                  echo "<option name='' value='' ></option>
                                        <option value='2'>Despachado</option>
                                        <option value='3'>Finalizado</option>";
                                }else{
                                  if($key['estado']==2){
                                    echo "<option name='' value='' ></option>
                                          <option value='1'>Pendiente</option>
                                          <option value='3'>Finalizado</option>";
                                  }else{
                                    if($key['estado']==3)
                                      echo "<option name='' value='' ></option>
                                            <option value='1'>Pendiente</option>
                                            <option value='2'>Despachado</option>";
                                  }
                                }
                    echo "                                                          
                              </select>                          
                            </div>
                            <div class='input-group input-group col-md-1'>
                              <input type='hidden' name='id_venta' value='".$key['id_venta']."'>
                              <button type='submit' class='btn btn-warning'>Cambiar</button>
                            </div>

                          </form>
                        

                        </td>
                      </tr>
                    </div> 
                  ";
                }
              }
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
