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
	 							'idla' => $id_lab));
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

function modificarAutor($nom,$id_autor){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE `autor` SET `nombre`= :Nom WHERE `id_autor`= :Id");
		$res = $query->execute(array('Id' => $id_autor,
		 							'Nom' => $nom));
		$link=cerrarConexion();
	}else{
		$res= "error";
	}
	return $res;
}

function agregarBorradaAutores($id_autor) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE `autor`SET `baja`= 0 WHERE `id_autor`= :Id");
		$res = $query->execute(array('Id' => $id_autor));
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

function insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor) {
	// FALTA	insertar la FECHA
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("INSERT INTO `libro`(`id_editorial`, `id_etiqueta`, `stock`, `precio`, `isbn`, `cantPag`, `nombre`)
		 						 VALUES (:Edi, :Eti, :Stock, :Precio, :Isbn, :CantHojas, :Nombre )");
		$res = $query->execute(array('Nombre' => $nom , 'Edi' => $id_editorial , 'Eti'=> $id_etiqueta , 'Stock'=> $cantLibros ,
		 							'Precio'=> $precio , 'Isbn'=> $isbn , 'CantHojas'=> $cantHojas ));
		//El proximo SELECT es para recuperar el id del libro para el alta en la tabla 'libroautor'
		$query = $link->prepare("SELECT `id_libro` FROM libro WHERE `nombre` = :Nombre");
		$res2 = $query ->execute(array('Nombre' => $nom));
		$res2 = $query ->fetchAll();
		$link=cerrarConexion();
		altaLibroAutor($res2,$id_autor);
	}else {
		$res= "error";
	}
	return $res;
}

function modificarLibro($id_libro, $nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor){
 	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE `libro` SET `nombre`= :Nom , `isbn`=:Isbn, `cantPag`=:CantHojas, `stock`=:CantLibros, 
			`precio` = :Precio, `id_editorial`= :IdEditorial, `id_etiqueta`=:IdEtiqueta
								WHERE `id_libro`= :IdLibro");
		$res = $query->execute(array('IdLibro' => $id_libro, 'Nom'=> $nom, 'Isbn'=>$isbn, 'CantHojas'=>$cantHojas, 
			'CantLibros'=>$cantLibros, 'Precio'=>$precio, 'IdEditorial'=>$id_editorial, 'IdEtiqueta'=>$id_etiqueta,));
		//El proximo SELECT es para recuperar el id del libro para la modificacion en la tabla 'libroautor'
		$query = $link->prepare("SELECT `id_libro` FROM libro WHERE `nombre` = :Nombre");
		$res2 = $query ->execute(array('Nombre' => $nom));
		$res2 = $query ->fetchAll();
		$link=cerrarConexion();
		modificarLibroAutor($res2, $id_autor);
	}else {
		$res= "error";
	}
	return $res;
}

function altaLibroAutor($res2, $id_autor){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link -> prepare("INSERT INTO `libroautor`(`id_autor`, `id_libro`)
									VALUES (:IdAutor, :IdLibro)");
		$res3 = $query -> execute(array('IdAutor' => $id_autor , 'IdLibro' => $res2[0]['id_libro'] ));
		$link=cerrarConexion();
	}
}
function modificarLibroAutor($res2, $id_autor){
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link -> prepare("UPDATE `libroautor` SET `id_autor`=:IdAutor, `id_libro`=:IdLibro
								WHERE `id_libro`=:IdLibro ");
		$res3 = $query -> execute(array('IdAutor' => $id_autor , 'IdLibro' => $res2[0]['id_libro'] ));
		$link=cerrarConexion();
	}
}
/*function recuperarIdEtiqueta($nom){
	$link = conectarBaseDatos();
	if($link != "error"){
		$query = $link-> prepare("SELECT `id_etiqueta` FROM etiqueta WHERE `nombre` = :nom");
		$res= $query-> execute(array('nom' => $nom));
		$res= $query-> fetchAll();
		$link= cerrarConexion();
	}else{
		$res = "error";
	}
	return $res;
}

function recuperarIdEditorial($nom){
	$link = conectarBaseDatos();
	if($link != "error"){
		$query = $link-> prepare("SELECT `id_editorial` FROM editorial WHERE `nombre` = :nom");
		$res= $query-> execute(array('nom' => $nom));
		$res= $query-> fetchAll();
		$link= cerrarConexion();
	}else{
		$res = "error";
	}
	return $res;
}*/

function validarAltaLibro($nom, $isbn){ 
	//Realiza una consulta por nombre y otra por isbn pero recuperando los nombres, devuelve un array con ambos mergeados.
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombre` FROM libro WHERE `nombre`=:nom");
  		$res = $query->execute(array('nom' => $nom));
  		$res=$query->fetchAll();
  		$query = $link->prepare("SELECT `isbn` FROM libro WHERE `isbn` =:isbn ");
  		$res2 = $query -> execute(array('isbn' => $isbn ));
  		$res2 = $query->fetchAll();
  		$link=cerrarConexion();
  	}else{
  		$res = "error";
  	}
  	return array_merge($res, $res2);
}

function obtenerLibrosBorrados(){
  	$link = conectarBaseDatos();
  	if ($link != "error"){
  		$query = $link->prepare("SELECT `nombre`,`isbn`,`cantPag`, `stock`,`precio`,`id_libro` FROM libro WHERE `baja`=1");
  		$query->execute();
  		$res=$query->fetchAll();
  		$link=cerrarConexion();  	
  	}else {
  		$res= "error";
  	}
  	return $res;
}

function obtenerLibros(){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombre`,`isbn`,`cantPag`, `stock`,`precio`,`id_libro` FROM libro WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}

function agregarBorradaLibro($id) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE `libro`SET `baja`= 0 WHERE `id_libro`= :Id");
		$res = $query->execute(array('Id' => $id));
		$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}

function eliminarLibro($id) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE `libro`SET `baja`= 1 WHERE `id_libro`= :Id");
		$res = $query->execute(array('Id' => $id));
		$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}

