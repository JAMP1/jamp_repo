<!DOCTYPE HTML>
<html>
  <head>
    <script src="../LIBS/jquery.js" type="text/javascript"></script>
    <script src="../LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="../LIBS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <script type="text/javascript" src="../LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
  </head>
  <body class="laboratorix text-pag">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!--<div class="container">-->
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
          <li><a href="/JAMP/PORTI/llamadaController.php?action=cargarLibro&clase=entidad">Administrar Libros</a></li>
          <li class="active"><a href="">Modificar Libro</a></li>
          <li><a href ="/JAMP/PORTI/llamadaController.php?action=borradosLibro&clase=entidad">Libros Borrados </a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
    <br>
    <div class="row">
      <?php
        if(isset($existe)){
          echo "<div class='alert alert-danger'>Error! Ya existe el libro ingresado, busque en la lista o en los borrados</div>";
        }
        if(isset($no_imagen)){
          echo "<div class='alert alert-danger'>Error! Formato de imagen incorrecto o archivo faltante</div>";
        }
      ?>
    </div>
    <div class="col-md-12">
      <form method="POST"  onSubmit = "return validaLibro()" action="llamadaController.php?action=confirmarModificacionLibro&clase=entidad" enctype="multipart/form-data">
        <div class="panel panel-info">
          <table class="table table">
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Nombre Libro</span>
                  <?php
                    if(isset($nom)){
                      echo "<input type='text' value='".$nom."' class='form-control' name='nom_libro' id='nom_libro' required='required'>";
                    }else{
                      echo "<input type='text' value='".$libro[0]['nombre']."' class='form-control' name='nom_libro' id='nom_libro' required='required'>";
                    }

                  ?>
                </div>
               <!-- <input id="nombre" type="text" placeholder="Nombre Libro" name="nom_libro">-->
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">ISBN</span>
                  <?php
                    if(isset($isbn)){
                      echo "<input type='text' value='".$isbn."' class='form-control' name='isbn_libro' id='isbn_libro' required='required'>";
                    }else{
                      echo "<input type='text' value='".$libro[0]['isbn']."' class='form-control' name='isbn_libro' id='isbn_libro' required='required'>";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Total de paginas</span>
                  <?php
                    if(isset($cantHojas)){
                      echo "<input type='text' value='".$cantHojas."' class='form-control' name='cantHojas_libro' id='cantHojas_libro' required='required'>";
                    }else{
                      echo "<input type='text' value='".$libro[0]['cantPag']."' class='form-control' name='cantHojas_libro' id='cantHojas_libro' required='required'>";
                    }
                  ?>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Stock</span>
                  <?php
                    if(isset($cantLibros)){
                      echo "<input type='text' value='".$cantLibros."' class='form-control' name='cant_libro' id='cant_libro' required='required'>";
                    }else{
                      echo "<input type='text' value='".$libro[0]['stock']."' class='form-control' name='cant_libro' id='cant_libro' required='required'>";
                    }
                  ?>
                </div>
                <!--<input id="nombre" type="text" placeholder="Cantidad de libros" name="cant_libro">-->
              </td>
            </tr>
            <tr>
              <td>
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Precio</span>
                  <?php
                    if(isset($precio)){
                      echo "<input type='text' value='".$precio."' class='form-control' name='precio_libro' id='precio_libro' required='required'>";
                    }else{
                      echo "<input type='text' value='".$libro[0]['precio']."' class='form-control' name='precio_libro' id='precio_libro' required='required'>";
                    }
                  ?>
                </div>
              <!--  <input id="nombre" type="text" placeholder="Precio" name="precio_libro">-->
              </td>
            </tr>
            <tr>
              <td>
                <!--<input id="nombre" type="text" placeholder="Editorial" name="editorial_libro"> -->
                <div class="input-group input-group-lg">
                  <span class="input-group-addon">Editorial</span>
                  <select class="form-control" name="id_editorial_libro" id="filtroEditorial" >               
                    <?php
                      echo "<option name='id_editorial_libro' value='".$id_editorial."' >".$nom_editorial."</option>";
                      $arrayNa = obtenerEditoriales();                  
                      foreach ($arrayNa as $key){
                        if($key['nombre'] != $nom_editorial)
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
                    <?php
                      echo "<option name='id_etiqueta_libro' value='".$id_etiqueta."' >".$nom_etiqueta."</option>";
                      $arrayNa = obtenerEtiquetas();                  
                      foreach ($arrayNa as $key){
                        if($key['nombre'] != $nom_etiqueta)
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
                    <?php
                      echo "<option name='id_autor_libro' value='".$id_autor."' >".$nom_autor."</option>";
                      $arrayNa = obtenerAutores();                  
                      foreach ($arrayNa as $key){
                        if($key['nombre'] != $nom_autor)
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
                  <?php
                    echo "<form method='' action='' >
                          <input type='image' src='".$libro[0]['referencia_foto']."' value='' name='antigua_portada'>
                          <input type= 'hidden' value='".$libro[0]['referencia_foto']."' name='vieja_portada'>
                          <input type='file' accept='image/*' class='form-control' name='nueva_portada' id='nueva_portada'>
                          </form> ";
                    
                  //<input type="file" class="form-control" name="portada" id="portada" >
                  ?>
                </div>
                <td>
                  <button class="btn btn-info" type="submit" name="enviar" id="enviar" >Modificar</button>
                </td>
              </td>
            </tr>
            <tr>
              <td>
                <?php
                  if(isset($id)){
                    echo "<input name='id_libro' type='hidden' value='".$id."'/>";
                  }
                ?>
              </td>
            </tr>
          </table>
        </div>
      </form>     
      <div>
        <a href="llamadaController.php?action=cargarLibro&clase=entidad">Volver</a>
      </div>
    </div>
  </body>
</html>