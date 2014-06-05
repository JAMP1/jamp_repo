<?php

session_start();
$_SESSION['URI'] = $_SERVER["REQUEST_URI"];
header( "Location: cookbooks.php" );
?>
