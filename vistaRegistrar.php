<!DOCTYPE HTML>
<html>
  <head>
    <script src="/JAMP/LIBS/jquery.js" type="text/javascript"></script>
    <script src="/JAMP/LIBS/codigoAdminUsuarios.js" type="text/javascript"></script>
    <script type="text/javascript" src="/JAMP/LIBS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/JS/validar.js"></script>
    <script type="text/javascript" src="/JAMP/LIBS/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/JAMP/LIBS/bootstrap/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/JAMP/home.css"/>

  </head>
  <body>

    <form action="/JAMP/PORTI/llamadaController.php?action=registrarCliente&clase=entidad" method="post">
      <p>Nombre: <input type="text" name="nombre" /></p>
      <p>Apellido: <input type="text" name="apellido" /></p>
      <p>Email: <input type="text" name="email" /></p>
      <p>Telefono: <input type="text" name="telefono" /></p>
      <p>DNI: <input type="text" name="dni" /></p>
      <p>Nombre de Usuario: <input type="text" name="nombreusuario" /></p>
      <p>Contrasena: <input type="password" name="contrasena" /></p>
      <p><input type="submit" /></p>
    </form>
  </body>
</html>