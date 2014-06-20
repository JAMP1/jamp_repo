<?php
require_once("conexionBase.php");


function cambiarFech($id_lab){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$hoy=date('Y-m-d');
		$baj="0000-00-00";
	 	$query = $link->prepare("UPDATE `laboratorio` SET `fecha_ingreso`=:hoy , `fecha_baja`=:baja WHERE id_laboratorio=:idla");
	 	$res=$query->execute(array('hoy' => $hoy,
	 							'baja' => $baj,
	 							'idla' => $id_lab
	 							));
	 	
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;

}


function logearse($us, $con) {
	$link = conectarBaseDatos();
	if ($link != "error"){
	 $query = $link->prepare("SELECT * FROM usuario WHERE nombreUsuario= :Nombre AND contrasena= :Contrasena AND baja=0");
	 $query->execute(array('Nombre' => $us,
							'Contrasena' => $con));
	 $res = $query->fetch();
	 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
	
}


 function insertarEtiqueta($us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `etiqueta`(`nombre`) VALUES (:Nombre)");
		 $res = $query->execute(array('Nombre' => $us)) ;
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

  }
  function obtenerEtiquetasBorradas(){
  	$link = conectarBaseDatos();
  	if ($link != "error"){
  		$query = $link->prepare("SELECT `nombre`,`id_etiqueta` FROM etiqueta WHERE `baja`=1");
  		$query->execute();
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	
  	}else {
  		$res= "error";
  	}
  	return $res;
  }
   function obtenerEtiquetas(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`id_etiqueta` FROM etiqueta WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function agregarBorradaEtiqueta($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `etiqueta`SET `baja`= 0 WHERE `id_etiqueta`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
function eliminarEtiqueta($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `etiqueta`SET `baja`= 1 WHERE `id_etiqueta`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
  function modificarEtiqueta($usu,$id_us){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `etiqueta` SET `nombre`= :Usur WHERE `id_etiqueta`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us,
		 								'Usur' => $usu));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
 function insertarEditorial($us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `editorial`(`nombre`) VALUES (:Nombre)");
		 $res = $query->execute(array('Nombre' => $us)) ;
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

  }
   function obtenerEditoriales(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`id_editorial` FROM editorial WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function eliminarEditorial($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `editorial`SET `baja`= 1 WHERE `id_editorial`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
  function modificarEditorial($usu,$id_us){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `editorial` SET `nombre`= :Usur WHERE `id_editorial`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us,
		 								'Usur' => $usu));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
  function obtenerEditorialesBorradas(){
  	$link = conectarBaseDatos();
  	if ($link != "error"){
  		$query = $link->prepare("SELECT `nombre`,`id_editorial` FROM editorial WHERE `baja`=1");
  		$query->execute();
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	
  	}else {
  		$res= "error";
  	}
  	return $res;
  }
  function agregarBorradaEditoriales($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `editorial`SET `baja`= 0 WHERE `id_editorial`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
 function insertarAutor($us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `autor`(`nombre`) VALUES (:Nombre)");
		 $res = $query->execute(array('Nombre' => $us)) ;
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

  }
   function obtenerAutores(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`id_autor` FROM autor WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function eliminarAutor($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `autor`SET `baja`= 1 WHERE `id_autor`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
  function modificarAutor($usu,$id_us){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `autor` SET `nombre`= :Usur WHERE `id_autor`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us,
		 								'Usur' => $usu));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
function agregarBorradaAutores($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `autor`SET `baja`= 0 WHERE `id_autor`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}
  function obtenerAutoresBorrados(){
  	$link = conectarBaseDatos();
  	if ($link != "error"){
  		$query = $link->prepare("SELECT `nombre`,`id_autor` FROM autor WHERE `baja`=1");
  		$query->execute();
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	
  	}else {
  		$res= "error";
  	}
  	return $res;
  }

  function validarAltaEtiqueta($nom){
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombre` FROM etiqueta WHERE `nombre`=:nom");
  		$res = $query->execute(array('nom' => $nom));
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	}else{
  		$res = "error";
  	}
  	return $res;
  }

  function validarAltaEditorial($nom){
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombre` FROM editorial WHERE `nombre`=:nom");
  		$res = $query->execute(array('nom' => $nom));
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	}else{
  		$res = "error";
  	}
  	return $res;
  }

  function validarAltaAutor($nom){
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombre` FROM autor WHERE `nombre`=:nom");
  		$res = $query->execute(array('nom' => $nom));
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	}else{
  		$res = "error";
  	}
  	return $res;
  }


////////////////////////////////////////////////////////////////////////////////////////////////////////////


  function insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $editorial, $etiqueta, $autor) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("INSERT INTO `libro`(`id_editorial`, `id_etiqueta`, `stock`, `precio`, `isbn`, `cantPag`, `nombre`)
		 						 VALUES (:Edi, :Eti, :Stock, :Precio, :Isbn, :CantHojas, :Nombre )");
		 $res = $query->execute(array('Nombre' => $nom , 'Edi' => $editorial , 'Eti'=> $etiqueta , 'Stock'=> $cantLibros ,
		 							'Precio'=> $precio , 'Isbn'=> $isbn , 'CantHojas'=> $cantHojas )) ;
	$link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

  }

function validarAltaLibro($nom, $isbn){  //FALTA TERMINAR LA VALIDACION PARA EL ISBN
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombre` FROM autor WHERE `nombre`=:nom");
  		$res = $query->execute(array('nom' => $nom));
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	}else{
  		$res = "error";
  	}
  	return $res;
  }

  function obtenerLibrosBorrados(){
  	$link = conectarBaseDatos();
  	if ($link != "error"){
  		$query = $link->prepare("SELECT `nombre`,`id_libro` FROM libro WHERE `baja`=1");
  		$query->execute();
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	
  	}else {
  		$res= "error";
  	}
  	return $res;
  }
   function obtenerLibro(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`id_nombre` FROM libro WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	 	 
	 }else {
	 	$res= "error";
	 }
	 return $res;
}
function agregarBorradaLibro($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `libro`SET `baja`= 0 WHERE `id_libro`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
function eliminarLibro($id_us) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `libro`SET `baja`= 1 WHERE `id_libro`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;

 }
  function modificarLibro($usu,$id_us){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		 $query = $link->prepare("UPDATE `libro` SET `nombre`= :Usur WHERE `id_nombre`= :Id_us");
		 $res = $query->execute(array('Id_us' => $id_us,
		 								'Usur' => $usu));
		 $link=cerrarConexion();
	}else {
		$res= "error";
		
	}
	return $res;
}