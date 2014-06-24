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

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <!-- <div class="container">-->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <label class="navbar-brand">CookBooks</label> 
        </div>
        <div class="navbar-collapse collapse" id="menu">

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
            <li class="active"><a href="#"> Inicio </a></li>
            <!--<li><a class="active" href="#"> Quienes Somos</a></li>
            <li><a class="active" href="#"> Contacto</a></li>
            <li><a class="active" href="#"> Libros</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <button type="submit" id="_submit" class="btn btn-success" name="_submit" >MI CARRITO</button>
            </ul>
          </div>

          <div>
        <form class="navbar-form navbar-right" method="POST" role="search" action="/JAMP/PORTI/llamadaController.php?action=login&clase=loginClase">
            <!--<div class="form-group">
              <input type="text" id="username" placeholder="Usuario" class="form-control" placeholder="Usuario" name="username" value="" required="required" />
            </div>-->
            <div class="form-group">
              <ul class="nav navbar-nav navbar-right">
            <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
           </ul>
           </div>

          </form>
           
          <a href="/JAMP/PORTI/llamadaController.php?action=registrarme&clase=entidad"><span class="label label-info">Mi perfil </span></a>
        </div>
        
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Bienvenidos!</h1>
        <p>Esto es un texto de prueba para ver como se ve nuestra página!</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div>
          <td><?php cargarLosPutosLibros()  ?></td>
          <?php
            function cargarLosPutosLibros(){

              $link = conectarBaseDeDatos();
              if ($link != "error"){
                $query = $link->prepare("SELECT `nombre`,`isbn`,`cantPag`, `stock`,`precio`,`id_libro` FROM libro WHERE `baja`=0");
                $query->execute();
                $res=$query->fetchAll();
                
              }
              if ( $res!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($res as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
              }
              $fecha=getdate();
              foreach ($arrayNa as $key){
                
                echo  " <div class='col-md-4'>
                        <h2>".$key['nombre']."</h2>
                        <p><img class='img-book' src='/JAMP/IMG/libro3.jpg' alt='cocina3'></p>
                        <br>
                        <h4>".$fecha["month"]."".$fecha["weekday"]."".$fecha["year"]."</h4>
                        <p><a class= 'btn btn-default' href='#'' role='button'>Ver detalles &raquo;</a></p>
                      </div>";
              } 
            }          
          function conectarBaseDeDatos(){
            $db_host="127.0.0.1";
                $db_user="root";
                $db_pass="";
                $db_base="ingenieria2";

              try{

                $cn = new PDO("mysql:dbname=$db_base;host=$db_host","$db_user","$db_pass");
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //$cn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
                return($cn);
                
              }catch(PDOException $e){
                return "error" ;

              }
          }

          ?>

        </div>
    </div>    
      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
   <!-- </div>  /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>-->
  </body>
</html>