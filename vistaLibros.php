<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Administracion de Libros</title>
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
          <li class="active"><a href ="#">Administrar Libros </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=altaLibro&clase=entidad">Alta Libro </a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosLibro&clase=entidad">Libros Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <?php 
        if(isset($sePudoModificar)){
          echo "<div class='alert alert-success'>Exito! el libro fue modificado correctamente!!</div>";
        }  
        if (isset($sePudoBaja)){
          echo "<div class='alert alert-success'>Exito! el libro ha sido borrado correctamente!!</div>";
          echo "<div class='alert alert-info'>Acceda a Libros Borrados si desea revertir esta accion</div>";
        }
        if(isset($sePudoReAlta)){
          echo" <div class='alert alert-success'>Exito! Se ha re-agregado el libro correctamente!!</div>";
        }
        if(isset($sePudoAlta)){
          echo" <div class='alert alert-success'>Exito! Se ha agregado el libro correctamente!!</div>"; 
        }
      ?>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Libros</h3>
          </div>
          <table class="table table-centered">
            <tr>
              <td class="separados"><p>Nombre</p></td>
              <td class="separados"><p>ISBN</p></td>
              <td class="separados"><p>Cantidad pag</p></td>
              <td class="separados"><p>Precio</p></td>
              <td class="separados"><p>Detalle/Descripcion</p></td>
              <td class="separados"><p>Eliminar Libro</p></td>
              <td class="separados"><p>Modificar Libro</p></td>
            </tr>
            <tr>
              <?php
              //var_dump($arrayNa);
                foreach ($arrayNa as $key){
                  echo  "
                    <td class='separados'><p>".$key["nombre"]."</p></td>
                    <td class='separados'><p>".$key["isbn"]."</p></td>
                    <td class='separados'><p>".$key["cantPag"]."</p></td>   
                    <td class='separados'><p>$".$key["precio"]."</p></td>
                    <td class='separados'><textarea cols='55'  class='form-control' readonly >".$key['detalle_libro']."</textarea></td>
                    <td>
                      <form method='POST' onSubmit='return confirmar()'' action='/JAMP/PORTI/llamadaController.php?action=bajaLibro&clase=entidad'>
                        <input name='id_libro' type='hidden' value='".$key['id_libro']."'/>
                        <input type='submit' class='btn btn-danger' value='Eliminar'/>
                      </form>
                    </td>
                    <td class='separados'>
                      <form method='POST' action='/JAMP/PORTI/llamadaController.php?action=modificarLibro&clase=entidad&nombre=".$key['nombre']."'>
                        <input name='id_libro' type='hidden' value='".$key['id_libro']."'/>
                        <input type='submit' class='btn btn-info' value='Modificar'/>
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
