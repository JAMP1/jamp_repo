<!DOCTYPE HTML>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Detalle de venta</title>
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
	          <?php
//	            if(isset($enDetalle)){
	              echo "<h3 class= 'panel-title'> Compra realizada el dia ".$arregloVentas[0]["fecha"]."</h3>";
//	            }
	            ?>
	        </div>
	        <div class="panel-body">
		        <table class="table table-centered table-bordered">
		          <?php 
		            if(isset($arregloVentas)){
		                echo "
		                    <tr>";
	//	                if(!isset($enDetalle)){
		                  echo "
		                      <td class='separados'><p>Fecha de compra</p></td>";
	//	                }
		                echo "
		                      <td class='separados'><p>Nombre</p></td>
		                      <td class='separados'><p>ISBN</p></td>
		                      <td class='separados'><p>Cantidad libros</p></td>                      
		                      <td class='separados'><p>Precio unidad</p></td>
		                      <td class='separados'><p>Estado</p></td>
		                    </tr>
		                  ";
		                foreach($arregloVentas as $key){
		                  echo "
		                    <tr>";
		        //          if(!isset($enDetalle)){
		                    echo "
		                      <td class='separados'><p>".$key['fecha']."</p></td>";
		          //        }
		                  echo "
		                      <td class='separados'><p>".$key['nombre']."</p></td>
		                      <td class='separados'><p>".$key['isbn']."</p></td>
		                      <td class='separados'><p>".$key['cantidad_comprada']."</p></td>
		                      <td class='separados'><p>$".$key['precio_unidad']."</p></td>
		                      <td class='separados'><p>".$key['nombre_estado']."</p></td>
		                    </tr>
		                  ";
		                }
		                if(isset($total)){
		                  echo "<tr>
		                          <td class='separados'><p>Precio total</p></td>
		                          <td class='separados'><p>$".$key['precio_total']."</p></td>
		                    </tr>";
			            }
			   //         if(isset($enDetalle)){
			              echo "<td>
			                      <form method='post' action='llamadaController.php?action=verVentasGenerales&clase=entidad'>
			                        <input type='hidden' name='id_venta' value='".$key['id_venta']."'>
			                        <button type='submit' class='btn btn-info'>
			                          <span class='glyphicon glyphicon-eye-open'></span> Ver todas las ventas
			                        </button>
			                      </form>
			                    </td>";
			     //       }
			        }else{
			          echo "<div class='alert alert-warning'>No hay ventas registradas</div>";
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
