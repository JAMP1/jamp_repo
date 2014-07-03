<!DOCTYPE HTML>
<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">

<title>Administracion de Libros</title>
<script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
<script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
<script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>
<script >
    function confirmaCompra(){
      var arregloCantidad = document.getElementsByClassName('cantidadLibroEnCarrito');
      var arregloPrecio = document.getElementsByClassName('precioLibroEnCarrito'); 
      var suma=0;// parseInt(arregloCantidad[0].value);
      for (var i = 0 ; i < arregloPrecio.length ; i++) {
       // alert(arregloPrecio[i].value + arregloCantidad[i].value);
        suma += (parseInt(arregloPrecio[i].value) * parseInt(arregloCantidad[i].value));
      };
      if(confirm("¿DESEA REALIZAR LA COMPRA POR LA SUMA TOTAL DE "+"$"+suma+"?")==true){
        return true;
      }else{
        return false;
      }
    }

</script>

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
    <?php
	    //echo "<li><a href ='/JAMP/cookbooksUsuario.php?id_usuario=".$_SESSION['id_usuario']."'>Inicio </a></li>";
    //echo "<li><a href ='/JAMP/cookbooksUsuario.php?id_usuario=".$_SESSION['id_usuario']."'>Inicio </a></li>";
    ?>
    <li class=""><a href ="/JAMP/PORTI/llamadaController.php?action=volverInicio&clase=user"> Inicio </a></li>
    <li class="active"><a href ="#">MI CARRITO </a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="/JAMP/PORTI/llamadaController.php?action=logout&clase=loginClase"><span class="add-on"><i class="icon-user"> </i></span>Cerrar Sesion </a></li>
  </ul>
</div>
</nav>
<div class="row">
<div class="col-md-12">
        <table class="table table-centered">
        <tr>
        <td class="separados"><p>Nombre</p></td>
        <td class="separados"><p>ISBN</p></td>
        <td class="separados"><p>Cantidad pag</p></td>
        <td class="separados"><p>Stock</p></td>
        <td class="separados"><p>Precio</p></td>
        <td class="separados"><p>Cantidad</p></td>
        <td class="separados"><p>Eliminar Libro</p></td>
        </tr>
        <?php
       //var_dump($arrayNa);
       // var_dump($key);
        if(count($arrayNa) > 0){
          foreach ($arrayNa as $key){
            echo  " <td class='separados'><p>".$key["nombre"]."</p></td>
                    <td class='separados'><p>".$key["isbn"]."</p></td>
                    <td class='separados'><p>".$key["cantPag"]."</p></td>
                    <td class='separados'><p>".$key["stock"]."</p></td>
                    <td class='separados'><p>".$key["precio"]."</p></td>
                    <form method='POST' action='/JAMP/PORTI/llamadaController.php?action=actualizaCantidadDeLibros&clase=entidad'>                  
                    <td class='separados'><p><input type='number' name='cantidad_libros' class='cantidadLibroEnCarrito' min='1' value='".$key["cantidad_pedida"]."'></p>
                    <input type='hidden' name='id_carrito' value='".$key["id_carrito"]."'/>
                    <input type='hidden' name='id_libro' value='".$key["id_libro"]."'>
                    <input type='submit' class='btn btn-info' value='Confirmar cantidad'/>
                    </form>
                    <input type='hidden' class='precioLibroEnCarrito' value='".$key["precio"]."'>
                    </td>
                    <td>

                    <form method='POST' onSubmit='return confirmar()'' action='/JAMP/PORTI/llamadaController.php?action=bajaLibroCarrito&clase=entidad'>
                    <input name='id_libro' type='hidden' value='".$key['id_libro']."'/>
                    <input name='id_carrito' type='hidden' value='".$key['id_carrito']."'/>
                    <input name='id_usuario' type='hidden' value='".$idUsuario."'/>
                    <input type='submit' class='btn btn-info' value='Eliminar'/>
                    </form>
                    </td>
                    </tr>";
          }
          // <td class='separados'><p><input type='number' class='cantidadLibroEnCarrito' min='1' value='1'></p>
          echo "<td class='separados'>
                <form method='POST' onSubmit='return confirmaCompra()' action='/JAMP/PORTI/llamadaController.php?action=comprarLibro&clase=entidad'>
                <input name='id_carrito' type='hidden' value='".$arrayNa[0]['id_carrito']."'/>
                <input name='id_usuario' type='hidden' value='".$idUsuario."'/>
                <input type='submit' class='btn btn-info' value='Comprar'/>
                </form>
                </td>";
          }
        ?>
</table>
</div>
</div>
</body>
</html>
