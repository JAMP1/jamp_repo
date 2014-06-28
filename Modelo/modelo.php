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

function insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor, $imagen) {
	// FALTA	insertar la FECHA
	$link = conectarBaseDatos();
	if ($link != "error"){
		$imagen = 1;
		$query = $link->prepare("INSERT INTO `libro`(`id_editorial`, `id_etiqueta`, `stock`, `precio`, `isbn`, `cantPag`, `nombre`, `imagen`)
		 						 VALUES (:Edi, :Eti, :Stock, :Precio, :Isbn, :CantHojas, :Nombre, :Imagen)");
		$res = $query->execute(array('Nombre' => $nom , 'Edi' => $id_editorial , 'Eti'=> $id_etiqueta , 'Stock'=> $cantLibros ,
		 							'Precio'=> $precio , 'Isbn'=> $isbn , 'CantHojas'=> $cantHojas, 'Imagen'=>$imagen));
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
		//$res = $query -> fetchAll();
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
		//var_dump($res2);
		$res3 = $query -> execute(array('IdAutor' => $id_autor , 'IdLibro' => $res2[0]['id_libro'] ));
		$link=cerrarConexion();
	}
}

function validarAltaLibro($nom, $isbn){ 
	//Realiza una consulta por nombre y otra por isbn pero recuperando los nombres, devuelve un array con ambos mergeados.
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombre` `id_libro` FROM libro WHERE `nombre`=:nom OR `isbn` =:isbn ");
  		$res = $query->execute(array('nom' => $nom, 'isbn'=> $isbn));
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

function recuperarCliente($nombreUsuario){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `nombreusuario`, `id_usuario` FROM usuario WHERE `nombreusuario`=:Nom");
	 	$query->execute(array('Nom' => $nombreUsuario));
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}

function recuperarLibro($idLibro){
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT * FROM libro WHERE `id_libro`=:IdLibro");
	 	$query->execute(array('IdLibro' => $idLibro));
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}

function altaCliente ($nombreUsuario, $nom, $apellido, $telefono, $email, $dni, $contrasena, $permiso ){
	$link= conectarBaseDatos();
	if ($link != "error"){
		$query = $link -> prepare("INSERT INTO `usuario`(`id_permiso`,`nombreUsuario`, `nombre` , `apellido` , `telefono` , `email` , `dni` , `contrasena`)
									VALUES (:IdPermiso, :NombreUsuario, :Nombre, :Apellido, :Telefono, :Email, :Dni, :Contrasena)");
		$res = $query -> execute(array('IdPermiso'=> $permiso, 'NombreUsuario' => $nombreUsuario , 'Nombre' => $nom , 'Apellido' => $apellido , 
										'Telefono' => $telefono , 'Email' => $email , 'Dni' => $dni , 'Contrasena' => $contrasena ));
		$link=cerrarConexion();
		return $res;
	}		
}

function altaCarrito($idUsuario){
	$link = conectarBaseDatos();
	if($link != "error"){
		$query = $link -> prepare("INSERT INTO `carrito`(`id_usuario`)
									VALUES (:IdUsuario)");
		$res = $query -> execute(array('IdUsuario' => $idUsuario ));
		$link = cerrarConexion();
	}
}

function recuperarLibroCarrito($idUsuario){
	$link = conectarBaseDatos();
	if($link != "error"){
		$query = $link -> prepare(" SELECT *
 									FROM `carrito`  
 									INNER JOIN `usuario` ON usuario.id_usuario=carrito.id_usuario
									INNER JOIN `carrito_libro` ON carrito.id_carrito=carrito_libro.id_carrito 
									INNER JOIN `libro` ON libro.id_libro=carrito_libro.id_libro
									INNER JOIN `libroautor`  ON libroautor.id_libro=libro.id_libro 
									INNER JOIN `autor`  ON autor.id_autor=libroautor.id_autor
									INNER JOIN `editorial`  ON editorial.id_editorial=libro.id_editorial 
									WHERE carrito.id_usuario= :IdUsuario");
		$res = $query -> execute(array('IdUsuario' => $idUsuario ));
		$res = $query -> fetchAll();
		$query = $link -> prepare("SELECT * FROM `carrito` WHERE `id_usuario`= :IdUsuario");
		$res2= $query -> execute(array('IdUsuario' => $idUsuario));
		$res2 = $query-> fetchAll();
		$link = cerrarConexion();
		return $res;
	}
}

function obtenerDatosCliente ($IdUsuario) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link -> prepare ("SELECT *
									FROM `usuario` 
									WHERE id_usuario=:IdUsuario");
		$res = $query -> execute(array('IdUsuario'=> $IdUsuario));
		$res = $query -> fetch();
		$link = cerrarConexion();
		return $res;
	}
}

function modificarDatosCliente ($nombre, $apellido,  $email, $telefono, $dni,$nombreUsuario, $contrasena, $idUsuario){
		$link = conectarBaseDatos();
	if ($link != "error"){
		
		 	$query = $link->prepare("UPDATE `usuario` SET `nombre`=:Nombre , `apellido`=:Apellido, `email`=:Email, `telefono`=:Telefono, 
											`dni`=:Dni, `nombreUsuario`=:NombreUsuario, `contrasena`=:Contrasena WHERE id_usuario=:idUsuario");
	 	$res=$query->execute(array('Nombre' => $nombre,
	 							'Apellido' => $apellido,
	 							'Email' => $email,
	 							 'Telefono'=> $telefono,
	 							 'Dni'=> $dni,
	 							 'NombreUsuario'=> $nombreUsuario,
	 							 'Contrasena'=> $contrasena,
	 							 'idUsuario'=> $idUsuario));

	 }else {
	 	$res= "error";
	 }
	 return $res;

}

function obtenerUsuarios() {
	$link = conectarBaseDatos();
	if ($link != "error"){
	 	$query = $link->prepare("SELECT `id_usuario`, `nombre`,`apellido`,`email`, `telefono`,`dni`,`nombreUsuario`, `contrasena` 
	 							FROM usuario WHERE `baja`=0");
	 	$query->execute();
	 	$res=$query->fetchAll();
	 	$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}
function validarAltaUsuario($nom){ 
	//Realiza una consulta por nombre y otra por isbn pero recuperando los nombres, devuelve un array con ambos mergeados.
  	$link = conectarBaseDatos();
  	if($link != "error"){
  		$query = $link->prepare("SELECT `nombreUsuario` FROM usuario WHERE `nombreUsuario`=:nom");
  		$res = $query->execute(array('nom' => $nom));
  		$res=$query->fetchAll();
  		$link=cerrarConexion();
  	}else{
  		$res = "error";
  	}
  	return $res;
}

function eliminarUsuario($idUsuario){
	$link = conectarBaseDatos();
	if( $link != "error"){
		$query= $link ->prepare("UPDATE `usuario` SET `baja`= 1 WHERE id_usuario = :IdUsuario");
		$query -> execute(array('IdUsuario' => $idUsuario));
		$query= $link ->prepare("UPDATE `carrito` SET `baja`= 1 WHERE id_usuario = :IdUsuario");
		$query -> execute(array('IdUsuario' => $idUsuario));
		$link = cerrarConexion();
	}else{
		return "error";
	}
}

function obtenerUsuariosBorrados(){
  	$link = conectarBaseDatos();
  	if ($link != "error"){
  		$query = $link->prepare("SELECT `id_usuario`, `nombre`,`apellido`,`email`, `telefono`,`dni`,`nombreUsuario`, `contrasena` 
	 							FROM usuario WHERE `baja`=1");
  		$query->execute();
  		$res=$query->fetchAll();
  		$link=cerrarConexion();  	
  	}else {
  		$res= "error";
  	}
  	return $res;
}
function agregarBorradoUsuario($id) {
	$link = conectarBaseDatos();
	if ($link != "error"){
		$query = $link->prepare("UPDATE `usuario` SET `baja`= 0 WHERE `id_usuario`= :Id");
		$res = $query->execute(array('Id' => $id));
		$link=cerrarConexion();
	}else {
		$res= "error";
	}
	return $res;
}



 
 /*SELECT `l.nombre`, `a.nombre`, `a.apellido`, `e.nombre`, `l.precio`, 
 									FROM carrito as c 
									 INNER JOIN carrito_libro as cl ON `c.id_carrito`=`cl.id_carrito` 
									 INNER JOIN libro as l ON `l.id_libro`=`cl.id_libro` 
									 INNER JOIN libroautor as la ON `la.id_libro`=`l.id_libro` 
									 INNER JOIN autor as a ON `a.id_autor`=`la.id_autor` 
									 INNER JOIN editorial as e ON `e.id_editorial`=`l.id_editorial` 
									 WHERE `c.id_usuario`= :IdUsuario

									  INNER JOIN libro ON id_libro=id_libro 
									 INNER JOIN libroautor  ON id_libro=id_libro 
									 INNER JOIN autor  ON id_autor=id_autor 
									 INNER JOIN editorial  ON id_editorial=id_editorial 
*/