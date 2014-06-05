<?php
require_once("../Modelo/modelo.php");
$nombre=$_GET["action"];
switch ($nombre) {
    case 'volverInicio':
        require_once("../ADMIN/cookBooksAdmin.php");
        break;
}
?>
