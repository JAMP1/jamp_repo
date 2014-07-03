<?php

require_once("entidadController.php");
require_once("adminController.php");
require_once("loginController.php");
require_once("userController.php");
//$claseEntidad = new entidad();
//$claseAdmin = new admin();
//$claseLogin = new loginClase();

$accion=$_GET["action"];
$claseDest=$_GET["clase"];
$clase = new $claseDest();

$clase-> $accion();


?>