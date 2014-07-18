<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigologin.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="" type="" href="/JAMP/PORTI/llamadaController.php?action=cargarLibros&clase=entidad">
    <link rel="" type="" href="/JAMP/PORTI/entidadController.php">
    <title>Bienvenidos</title>
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
            <li class="active"><a href ="#"> Inicio </a></li>
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
            <li><a href="/JAMP/PORTI/llamadaController.php?action=registrarme&clase=entidad">Crear Cuenta</a></li>
            <li><a href="../PORTI/llamadaController.php?action=olvideMiContrasena&clase=entidad">Olvide mi contraseña</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div>
      <?php
          if(isset($_GET['noUsuario'])){
            $noUsuario=$_GET['noUsuario'];
            if($noUsuario==1){
              echo "<div class='alert alert-danger'>Error! Usuario o Constrasena incorrecto!</div>";
            }
          }
          if(isset($sePudoAlta)){
              echo" <div class='alert alert-success'>Exito! Ya forma parte de nuestro sistema!!</div>";
          }
          if(isset($dadoDeBaja)){
            echo "<div class='alert alert-danger'>Error! El usuario esta dado de baja!</div>";
          }          
          if(isset($seEnvioCorreo)){
            echo "<div class='alert alert-success'>Felicidades! Se ha enviado un mail con la contrasena correspondiente!</div>";
          }
          if(isset($bajaOk)){
             echo "<div class='alert alert-success'>Se ha dado de baja satisfactoriamente</div>";
          }
      ?>
    </div>
    <div class="jumbotron">
      <div class="container">
        <img src="/JAMP/IMG/cookbooks.png" width="390px" height="160px">
        <!--<img src="/JAMP/IMG/background.png">-->
      </div>
    </div>
    <div class="container">
    <div class="row">
      <a name="nombreAncla"></a>
      <div class="col-md-3">
        <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=filtrar&clase=entidad#nombreAncla">
          <div class="row panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Ordenacion por criterios</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-5">
                <select name="tipo" class="col-md-2 form-control input-group">
                  <option value="editorial">Editorial</option> 
                  <option value="titulo">Titulo</option> 
                  <option value="autor">Autor</option> 
                  <option value="precio">Precio</option> 
                  <option value="etiqueta">Etiqueta</option> 
                </select>
              </div>
              <div class="col-md-1">
                <button class="btn btn-info" type="submit"> Ordenar </button>
              </div>  
            </div>          
          </div>
        </form>
      </div>
      <div class="col-md-1"> </div>
      <div class="container col-md-7">
        <a name="nombreAnclaDos"></a>
        <form method="post" role="search" action="/JAMP/PORTI/llamadaController.php?action=buscar&clase=entidad#nombreAnclaDos">
          <div class="row panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Busqueda por filtros</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <select name="busquedaEditorial" class="form-control input-group">
                  <?php
                    echo "<option value='no_editorial'>Editorial</option>";
                    foreach ($arrayNu as $kay){
                      echo 
                        "<option value='".$kay['nombre']."'>".$kay['nombre']."</option>";
                    }
                  ?>   
                </select>
              </div>
              <div class="col-md-3">
                <select name="busquedaEtiqueta" class="form-control input-group">
                  <?php
                    echo "<option value='no_etiqueta'>Etiqueta</option>";
                    foreach ($arrayNo as $koy){
                      echo  
                        "<option value='".$koy['nombre']."'>".$koy['nombre']."</option>";
                    }
                  ?>  
                </select>
              </div>
              <div class="col-md-3">
                <select name="busquedaAutor"class="form-control input-group">
                  <?php
                    echo "<option value='no_autor'>Autor</option>";
                    foreach ($arrayNe as $kuy){
                      echo 
                        "<option value='".$kuy['nombre']."'>".$kuy['nombre']."</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-1">
                <button class="btn btn-info" type="submit"> Buscar </button>
              </div>
            </div>
            <p class="help-block">Si no desea excluir algun criterio en el filtrado, simplemente no lo seleccione</p>
          </div>
        </form>
      </div>
    </div>
    </div>
    <br>
    <br>
    <?php
      $contar=0;
      $i=0;
      foreach ($arrayNa as $key){
        if($contar==0){
           echo "<div class='container-fluid'>";
           echo "<div class='row'>";
        }
        $referencia= $key['referencia_foto'];
        $detalle = $key['detalle_libro'];
        $titulo = $key['titulo'];
        echo  "
          <div class='col-md-3'>
            <table >
              <tr>
              <td>
              <h3>Titulo: ".$key['titulo']."</h2>
              </td>
              </tr>
              <tr>
              <td>
              <h5>Editorial: ".$key['editorial']."</h4>
              </td>
              </tr>
              <tr>
              <td>
              <h5>Autor: ".$key['autor']."</h4>
              </td>
              </tr>
              <tr>
              <td>
              <h5>Etiqueta: ".$key['etiqueta']."</h4>
              </td>
              </tr>
              <tr>
              <td>
              <h5>$".$key['precio']."</h4>
              </td>
              </tr>
              <tr>
              <td>
              <p><img class= 'img-book img-rounded' src='$referencia' alt = 'cocina3' height='200' weight='200' ></p>                       
              </td>
              </tr>
              <tr>
              <td>                
                <button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal".$i."'>
                  Ver detalles &raquo;
                </button>
                <div class='modal fade' id='myModal".$i."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                        <h4 class='modal-title' id='myModalLabel'>Detalles del libro: ".$titulo."</h4>
                      </div>
                      <div class='modal-body'>
                        <textarea readonly cols='60' rows='5' class='form-control' name='detalle_libro' id='detalle_libro' >".$detalle."</textarea>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              </tr>
            </table>
          </div>
        ";
        $i++;
        $contar++;
        if ($contar%4==0){
          echo "</div>";
          echo "</div>";
          $contar=0;
        }
        //<p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
        //<button type="button" class="btn btn-primary">Obvio papu</button>
      }
      echo "
        </div>
        <div class='container'>
        <div class='row'>
        <div class='col-md-4'>
        <table class='table'>
          <tr>
            <td>Cantidad de libros:</td>
            <td>
              <span class='label label-info'>".sizeof($todo)."</span>
            </td>
          </tr>
          <tr>
      ";
      if(sizeof($todo)==0){
        echo "<div class='alert alert-warning' role='alert'>No se encontraron libros con ese criterio</div>";
      }
      echo  "
        </tr>
        </table>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
    ?> 
  <!--  <?php
      $contar=0;
   /*   foreach ($arrayNa as $key){
        if($contar==0){
           echo "<div class='row'>";
        }
        $referencia= $key['referencia_foto'];
        echo  " <tr> 
                <div class='col-md-3'>
                <h2>Titulo: ".$key['titulo']."</h2>
                <h4>Editorial: ".$key['editorial']."</h4>
                <h4>Autor: ".$key['autor']."</h4>
                <h4>Tag: ".$key['etiqueta']."</h4>
                <h4>$".$key['precio']."</h4>
                <p><img class= 'img-book img-rounded' src='$referencia' alt = 'cocina3' height='200' weight='200' ></p>                       
                <br>
                <p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
                </div>
                </tr>
        ";
        $contar++;
        if ($contar%4==0){
          echo "</div>";
          $contar=0;
        }
      }
      echo "
        </div>
        <div class='row'>
        <div class='col-md-4'>
        <table class='table'>
          <tr>
            <td>Cantidad de libros:</td>
            <td>
              <span class='label label-info'>".sizeof($todo)."</span>
            </td>
          </tr>
          <tr>
      ";
      if(sizeof($todo)==0){
        echo "<div class='alert alert-warning' role='alert'>No se encontraron libros con ese criterio</div>";
      }
      echo  "
        </tr>
        </table>";
      echo "</div>";
      echo "</div>";*/
    ?>    -->
    <hr>


       <!-- </div>  /container -->
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>-->

  </body>
<footer>
</footer>
</html>