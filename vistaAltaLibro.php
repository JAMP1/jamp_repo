<!DOCTYPE HTML>
<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<script type="text/javascript" src="/JAMP/JS/validar.js"></script>


<title>Administracion de Libros</title>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="../JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
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
    <ul class="nav navbar-nav">
        <li><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=admin">Inicio</a></li>
        <li><a href="../PORTI/llamadaController.php?action=cargarLibro&clase=entidad">Administrar Libros</a></li>
        <li class="active"><a href="#">Alta Libro</a></li>
        <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosLibro&clase=entidad">Libros Borrados </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
      
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<div class="row">
<div class="col-md-12">
<form method="POST"  onSubmit = "return validaLibro()" action="llamadaController.php?action=confirmarAltaLibro&clase=entidad" enctype="multipart/form-data">
  <div class="panel panel-info">
  <table class="table table">
    <tr>
    <td>
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Nombre Libro</span>
        <input type="text" class="form-control" name="nom_libro" id="nom_libro" required="required">
      </div>
     <!-- <input id="nombre" type="text" placeholder="Nombre Libro" name="nom_libro">-->
      </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg">
        <span class="input-group-addon">ISBN</span>
        <input type="text" class="form-control"  name="isbn_libro" id="isbn_libro" required="required">
      </div>
      <!--<input id="isbn" type="text" placeholder="ISBN" name="isbn_libro">-->
      </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Total de paginas</span>
        <input type="text" class="form-control"  name="cantHojas_libro" id="cantHojas_libro" required="required">
      </div>
    <!--  <input id="nombre" type="text" placeholder="Cantidad de hojas" name="cantHojas_libro"> -->
      </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Stock</span>
        <input type="text" class="form-control"  name="cant_libro" id="cant_libro" required="required">
      </div>
      <!--<input id="nombre" type="text" placeholder="Cantidad de libros" name="cant_libro">-->
      </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Precio</span>
        <input type="text" class="form-control"  name="precio_libro" id="precio_libro" required="required">
      </div>
    <!--  <input id="nombre" type="text" placeholder="Precio" name="precio_libro">-->
      </td>
    </tr>
    <tr>
    <td>
      <!--<input id="nombre" type="text" placeholder="Editorial" name="editorial_libro"> -->
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Editorial</span>
        <select class="form-control" name="id_editorial_libro" id="filtroEditorial" required="required" >
                  <option name="id_editorial_libro" value="" ></option>  
                  <?php
                    $arrayNa = obtenerEditoriales();                  
                    foreach ($arrayNa as $key){
                      echo "<option value=".$key['id_editorial'].">".$key['nombre']."</option>";                      
                    }
                  ?>
        </select>
        <td>
          <a href="../PORTI/llamadaController.php?action=altaEditorial&clase=entidad">Cargar editorial</a>
        </td>
       
      </div>
      </td>
    </tr>
    <tr>
    <td>
      <!--<input id="nombre" type="text" placeholder="Ingrese etiqueta" name="etiqueta_libro">-->
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Etiqueta</span>
          <select class="form-control" name="id_etiqueta_libro" id="filtroEtiqueta" required="required" >
                  <option value=""></option>  
                  <?php
                    $arrayNa = obtenerEtiquetas();                  
                    foreach ($arrayNa as $key){
                      echo "<option value=".$key['id_etiqueta'].">".$key['nombre']."</option>";                      
                    }
                  ?>
          </select>
          <td>
            <a href="../PORTI/llamadaController.php?action=altaEtiqueta&clase=entidad">Cargar etiqueta</a>
            
          </td>
       
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <!--<input id="nombre" type="text" placeholder="Autor" name="autor_libro">-->
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Autor</span>
            <select class="form-control" name="id_autor_libro" id="filtroAutor" required="required" >
                    <option value=""></option>  
                    <?php
                      $arrayNa = obtenerAutores();                  
                      foreach ($arrayNa as $key){
                        echo "<option value=".$key['id_autor'].">".$key['nombre']."</option>";                      
                      }
                    ?>
          </select>
          <td>
            <a href="../PORTI/llamadaController.php?action=altaAutor&clase=entidad">Cargar autor</a>
            
          </td>
        </div>
      </td>
    </tr>
    <tr>
    <td>
      <div class="input-group input-group-lg">
        <span class="input-group-addon">Portada</span>
        <input type="file" class="form-control" id="portada" name="portada">

      </div>
         <td>
        <button class="btn btn-info" type="submit" name="enviar" id="enviar">Enviar</button>
      </td>
     <!-- <input id="campofotografia" name="imagen" type="file">    -->
    </td>
    </tr>
    </tr>
  </table>
</div>
</form>

<br>
<div>
<?php
  if(isset($existe)){
    echo "<div class='alert alert-danger'>Error! Ya existe el libro ingresado, busque en la lista o en los borrados</div>";
   // echo "<h4>Ya existe el nombre ingresado, busque en la lista o en los borrados</h4>";
  }
  if(isset($no_imagen)){
    echo "<div class='alert alert-danger'>Error! Formato de imagen incorrecto o archivo faltante</div>";
  }
?>

</div>
</div>
</div>

</body>
</html>