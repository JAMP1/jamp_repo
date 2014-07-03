<?php
require_once("../Modelo/modelo.php");
$nombre=$_GET["action"];
session_start();
class entidad{
    function altaEtiqueta (){
        require_once("../vistaAltaEtiqueta.php");
    }
    function agregarBorradaEtiqueta (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_etiqueta'];
            $borrar=agregarBorradaEtiqueta($id);
            $etiquetas=obtenerEtiquetas();
            if ( $etiquetas!="error"){
                $arrayNa = array();
                $i=0;
                $sePudoModificar = true;
                foreach ($etiquetas as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_etiqueta'] );
                    $i++;
                }
            }        
            require_once("../vistaEtiquetas.php");
        }
    }
    function bajaEtiqueta(){
        $per=$_SESSION['permiso'];
        if($per==1){
        $id=$_POST['id_etiqueta'];
        $borrar=eliminarEtiqueta($id);
        $etiquetas=obtenerEtiquetas();
        if ( $etiquetas!="error"){
            $arrayNa = array();
            $i=0;
            foreach ($etiquetas as $key ) {
                $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                        'id_us' => $key['id_etiqueta'] );
                $i++;
            }
        }
        require_once("../vistaEtiquetas.php");
        }
    }
    function modificarEtiqueta () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
        $id=$_POST['id_etiqueta'];
        require_once("../vistaModificarEtiqueta.php");}
    }
    function borradosEtiqueta () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $etiquetas=obtenerEtiquetasBorradas();

                if ( $etiquetas!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($etiquetas as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_etiqueta'] );
                        $i++;
            
                    }
                }
            require_once("../vistaEtiquetasBorradas.php");
        }else{
            //ir al login
        }
    }
    function confirmarAltaEtiqueta() {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_etiqueta"];
            $arreglo= validarAltaEtiqueta($nom);     
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEtiqueta.php");
            }else{
                $intento=insertarEtiqueta($nom);
                if ($intento){
                    $etiquetas=obtenerEtiquetas();
                    if ( $etiquetas!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($etiquetas as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_etiqueta'] );
                            $i++;
                        }
                        require_once("../vistaEtiquetas.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionEtiqueta (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST['nom_etiqueta'];
            $id=$_POST['id_etiqueta'];
            $arreglo= validarAltaEtiqueta($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEtiqueta.php");
            }else{
                $intento=modificarEtiqueta($nom,$id);
                if ($intento){
                    $etiquetas=obtenerEtiquetas();
                    if ( $etiquetas!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($etiquetas as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_etiqueta'] );
                            $i++;
                        }
                        require_once("../vistaEtiquetas.php");
                    }    
                }   
            }    
        }
    }
    function cargarEtiqueta () {
        $per=$_SESSION['permiso']; 
        if($per==1){
            $etiquetas=obtenerEtiquetas();
            if ( $etiquetas!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($etiquetas as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_etiqueta'] );
                    $i++;
                }
            }
            require_once("../vistaEtiquetas.php");
        }else{
            require_once "../cookbooks.php";
        }
    }
    function altaEditorial () {
        require_once("../vistaAltaEditorial.php");
    }
    function agregarBorradaEditorial (){   
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_editorial'];
            $borrar=agregarBorradaEditoriales($id);
            $editoriales=obtenerEditoriales();
            if ( $editoriales!="error"){
                $arrayNa = array();
                $i=0;
                $sePudoModificar = true;
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
                        require_once("../vistaEditorial.php");
         }


        }
    }
    function bajaEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_editorial'];
            $borrar=eliminarEditorial($id);
            $editoriales=obtenerEditoriales();
            if ( $editoriales!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
            }
            require_once("../vistaEditorial.php");
        }
    }
    function modificarEditorial () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
            $id=$_POST['id_editorial'];
            require_once("../vistaModificarEditorial.php");
        }
    }
    function borradosEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $editoriales=obtenerEditorialesBorradas();

                if ( $editoriales!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($editoriales as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_editorial'] );
                        $i++;
            
                    }
                }
            require_once("../vistaEditorialesBorradas.php");
        }else{
            //ir al login
        }
    }   
    function confirmarAltaEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_editorial"];
            $arreglo= validarAltaEditorial($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEditorial.php");
            }else{
                $intento=insertarEditorial($nom);
                if ($intento){
                    $editoriales=obtenerEditoriales();
                    if ( $editoriales!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                    foreach ($editoriales as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                             'id_us' => $key['id_editorial'] );
                        $i++;           
                    }
                    require_once("../vistaEditorial.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST['nom_editorial'];
            $id=$_POST['id_editorial'];
            $arreglo= validarAltaEditorial($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaEditorial.php");
            }else{
                $intento=modificarEditorial($nom,$id);
                if ($intento){
                    $editoriales=obtenerEditoriales();
                    if ( $editoriales!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($editoriales as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_editorial'] );
                            $i++;
                        }
                        require_once("../vistaEditorial.php");
                    }           
                }
            }   
        }
    }
    function cargarEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $editoriales=obtenerEditoriales();
            if ( $editoriales!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
            }
            require_once("../vistaEditorial.php");
        }else{
            require_once './cookbooks.php';
        }
    }
    function altaAutor (){
            require_once("../vistaAltaAutor.php");
    }
    function agregarBorradaAutor () {   
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_autor'];
            $borrar=agregarBorradaAutores($id);
            $autores=obtenerAutores();
            if ( $autores!="error"){
                $sePudoModificar = true;
                $arrayNa = array();
                $i=0;
                foreach ($autores as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_autor'] );
                    $i++;
                }
            }
        
            require_once("../vistaAutores.php");
        }
    }
   function bajaAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
        $id=$_POST['id_autor'];
        $borrar=eliminarAutor($id);
        $autores=obtenerAutores();
        if ( $autores!="error"){
            $arrayNa = array();
            $i=0;
            foreach ($autores as $key ) {
                $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                        'id_us' => $key['id_autor'] );
                $i++;
            }
        }
        require_once("../vistaAutores.php");
        }
    }
    function modificarAutor () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
            $id=$_POST['id_autor'];
            require_once("../vistaModificarAutor.php");
        }
    }
    function borradosAutores () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $autores=obtenerAutoresBorrados();
                if ( $autores!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($autores as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'] );
                        $i++;
                    }
                }
            require_once("../vistaAutoresBorrados.php");
        }else{
            //ir al login
        }
    }    
    function confirmarAltaAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_autor"];
            $arreglo= validarAltaAutor($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaAutor.php");
            }else{
                $intento=insertarAutor($nom);
                if ($intento){
                    $autores=obtenerAutores();
                    if ( $autores!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($autores as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'] );
                            $i++;
                        }
                        require_once("../vistaAutores.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST['nom_autor'];
            $id=$_POST['id_autor'];
            $arreglo= validarAltaAutor($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaAltaAutor.php");
            }else{
                $intento=modificarAutor($nom,$id);
                if ($intento){
                    $autores=obtenerAutores();
                    if ( $autores!="error"){
                        $arrayNa = array();
                        $sePudoModificar = true;
                        $i=0;
                        foreach ($autores as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'] );
                            $i++;
                        }
                        require_once("../vistaAutores.php");
                    }            
                }
            }       
        }
    }

    function cargarAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $autores=obtenerAutores();
            if ( $autores!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($autores as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_autor'] );
                    $i++;
                }
            }
            require_once("../vistaAutores.php");
        }else{
            require_once './cookbooks.php';
        }
    }
    function altaLibro (){
        require_once("../vistaAltaLibro.php");
    }
    function agregarBorradaLibro (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_libro'];
            $borrar=agregarBorradaLibro($id);
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                $sePudoModificar = true;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }
    }
    function bajaLibro(){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_libro'];
            $borrar=eliminarLibro($id);
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'], 'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }
    }
    function modificarLibro () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        if($per==1){
            $id=$_POST['id_libro'];
            $libro=recuperarLibro($id);
            require_once("../vistaModificarLibro.php");
        }
    }
    function borradosLibro () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $libros=obtenerLibrosBorrados();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'],'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibrosBorradas.php");
        }else{
            //ir al login
        }
    }
    function confirmarAltaLibro() {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_libro"];
            $isbn=$_POST["isbn_libro"];
            $cantHojas=$_POST["cantHojas_libro"];
            $cantLibros=$_POST["cant_libro"];
            $precio=$_POST["precio_libro"];
            $id_editorial=$_POST["id_editorial_libro"];
            $id_etiqueta=$_POST["id_etiqueta_libro"];
            $id_autor=$_POST["id_autor_libro"];
            $imagen=true;
            //$imagen= $_POST["imagen"];
            //print_r($_FILES);
            //echo $imagen;
            //$imagen= $_FILES["image"];
            //echo $imagen;
            //var_dump($imagen);
            $arreglo= validarAltaLibro($nom, $isbn);   
            if((!empty($arreglo))){
                $existe = 'existe';
                require_once("../vistaAltaLibro.php");
            }else{
                $intento=insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor, $imagen);
                if ($intento){
                    $libros=obtenerLibros();
                    if ( $libros!="error"){
                       $arrayNa = array();
                       $sePudoModificar = true;
                       $i=0;
                       foreach ($libros as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'],'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                            $i++;
                        }
                    require_once("../vistaLibros.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionLibro (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_libro"];
            $isbn=$_POST["isbn_libro"];
            $cantHojas=$_POST["cantHojas_libro"];
            $cantLibros=$_POST["cant_libro"];
            $precio=$_POST["precio_libro"];
            $id_editorial=$_POST["id_editorial_libro"];
            $id_etiqueta=$_POST["id_etiqueta_libro"];
            $id_autor=$_POST["id_autor_libro"];
            $id_libro=$_POST["id_libro"];
            $arreglo = validarAltaLibro($nom, $isbn);
            if((count($arreglo)==0)){
                //if ( $arreglo[0]['id_libro'] != $id_libro){
                 //   $existe = 'existe';
                   // require_once("../vistaModificarLibro.php");
                //}else{
                    $intento=modificarLibro($id_libro, $nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor);
                    if ($intento){
                        $libros=obtenerLibros();
                        if ( $libros!="error"){
                            $sePudoModificar = true;
                            $arrayNa = array();
                            $i=0;
                            foreach ($libros as $key ) {
                                $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                    'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                                $i++;
                            }
                        $existe=null;
                        require_once("../vistaLibros.php");
                        }
                    }  
                //}
            }else{
            $existe = 'existe';
                    require_once("../vistaModificarLibro.php");
            }
        }
    }
    function cargarLibro () {
        $per=$_SESSION['permiso']; 
        if($per==1){
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }else{
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            } //TENGO QUE VER CÓMO HACER PARA LISTAR LOS LIBROS EN EL INICIO
            require_once "../cookbooks.php";
        }
    }

    function cargarCarrito(){
        $idUsuario = $_POST['idUsuario'];
       // var_dump($idUsuario);
        $libros=recuperarLibroCarrito($idUsuario);
        if (count($libros)> 0){
        //print_r($libros);
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key[29] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'],
                        'id_carrito'=>$key['id_carrito'], 'cantidad_pedida'=>$key['cantidad_pedida'] );
                    $i++;
                }
                //var_dump($arrayNa);
            } //TENGO QUE VER CÓMO HACER PARA LISTAR LOS LIBROS EN EL INICIO
        }
        else {
            $arrayNa=array();
        }
            require_once "../vistaCarritoLibro.php";
    }

    function bajaLibroCarrito(){
        $per=$_SESSION['permiso'];
        if($per==2){
            $id_libro=$_POST['id_libro'];
            $id_carrito=$_POST['id_carrito'];
            $idUsuario=$_POST['id_usuario'];
            $borrar=eliminarLibroCarrito($id_libro, $id_carrito);
            $libros=recuperarLibroCarrito($idUsuario);
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key[29] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'],
                        'id_carrito'=>$key['id_carrito'] );
                    $i++;
                }
            }
            require_once("../vistaCarritoLibro.php");
        }

    }

    function comprarLibro(){
        $per=$_SESSION['permiso'];
        if($per==2){
            $id_carrito=$_POST['id_carrito'];
            $idUsuario=$_POST['id_usuario'];
            $id_venta= altaVenta($id_carrito);            
            $id_venta=recuperarUltimaVenta($id_carrito);
            //var_dump($id_venta[0]);
            $libros=recuperarLibroCarrito($idUsuario);
            //var_dump(count($libros));
            altaVentaLibro($id_venta, $libros);
            for ($i=0; $i < count($libros) ; $i++) { 
                $borrar=eliminarLibroCarrito($libros[$i]["id_libro"], $id_carrito);
            }
            //require_once("../vistaCarritoLibro.php");

            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key[29] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'],
                        'id_carrito'=>$key['id_carrito'], 'cantidad_pedida'=>$key['cantidad_pedida']  );
                    $i++;
                }
            }
            require_once("../vistaCarritoLibro.php");
        }
    }

    function actualizaCantidadDeLibros(){
        $cantidad = $_POST['cantidad_libros'];
        $id_carrito=$_POST['id_carrito'];
        $id_libro=$_POST['id_libro'];
        actualizaLibroCarrito($id_carrito, $id_libro , $cantidad);
        var_dump($cantidad);
        var_dump($id_carrito);
    }


    function registrarme () {
        require_once "../vistaRegistrar.php";
    }
    function registrarCliente () {
        $nombreUsuario= $_POST['nombreusuario'];
        $cliente= recuperarCliente($nombreUsuario);
        if ($cliente!="error"){
            $arreglo= validarAltaUsuario($nombreUsuario);
            if((!empty($arreglo))){
                if ($arreglo[0]['nombreUsuario'] == $nombreUsuario){
                $existe = 'existe';
                require_once("../vistaRegistrar.php");
               }
            }else{
                $nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
                $dni= $_POST['dni'];
                $contrasena= $_POST['contrasena'];
                $telefono= $_POST['telefono'];
                $email= $_POST['email'];       
                $permiso = 2;
                $intento= altaCliente($nombreUsuario, $nombre, $apellido, $dni,  $email, $telefono,$contrasena, $permiso);
                if ($intento){
                    $res = recuperarCliente($nombreUsuario);
                    altaCarrito($res[0]['id_usuario']);
                    $sePudoAlta = true;
                    require_once("../vistaRegistrar.php");
                    //require_once("../cookbooks.php");
                    //header("Location: ../cookbooks.php");
                    //var_dump($res);
                //else
                    //mensaje de error y que vuelva a vistaRegistrar.php
                }
            }
        }
    }

    function registroAdmin(){
        require_once("../vistaRegistroAdmin.php");
    }

    function registrarAdministrador () {
        $nombreUsuario= $_POST['nombreusuario'];
        $cliente= recuperarCliente($nombreUsuario);
        if ($cliente!="error"){
            $arreglo= validarAltaUsuario($nombreUsuario);
            if((!empty($arreglo))){
                if ($arreglo[0]['nombreUsuario'] == $nombreUsuario){
                $existe = 'existe';
                require_once("../vistaRegistrar.php");
               }
            }else{
                $nombre= $_POST['nombre'];
                $apellido= $_POST['apellido'];
                $dni= $_POST['dni'];
                $contrasena= $_POST['contrasena'];
                $telefono= $_POST['telefono'];
                $email= $_POST['email'];       
                $permiso= $_POST['id_permiso'];
                $intento= altaCliente($nombreUsuario, $nombre, $apellido, $dni,  $email, $telefono,$contrasena, $permiso);
                if ($intento){
                    $res = recuperarCliente($nombreUsuario);
                    altaCarrito($res[0]['id_usuario']);
                    $sePudoAlta = true;
                    $usuarios=obtenerUsuarios();
                    if ( $usuarios!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($usuarios as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                                'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                                    'id_usuario' => $key['id_usuario'] );
                            $i++;
                        }
                         require_once("../vistaUsuarios.php");
                    }                   
                    //require_once("../cookbooks.php");
                    //header("Location: ../cookbooks.php");
                    //var_dump($res);
                //else
                    //mensaje de error y que vuelva a vistaRegistrar.php
                }
            }
        }
    }

    function mostrarPerfil () {
        $id_usuario=$_POST ['id_usuario'];
        $cliente=obtenerDatosCliente($id_usuario);
        require_once ("../vistaPerfil.php");
    }

    function mostrarPerfilAdministrador () {
        $id_usuario=$_POST ['id_usuario'];
        $cliente=obtenerDatosCliente($id_usuario);
        require_once ("../vistaPerfilAdministrador.php");
    }

    function modificarCliente () {
        $nombre=$_POST ['nombre'];
        $apellido=$_POST ['apellido'];
        $email=$_POST ['email'];
        $telefono=$_POST ['telefono'];
        $dni=$_POST ['dni'];
        $nombreUsuario=$_POST ['nombreUsuario'];
        $contrasena=$_POST ['contrasena'];
        $idUsuario=$_POST ['id_usuario'];
        $cliente=modificarDatosCliente($nombre,$apellido, $email,   $telefono, $dni, $nombreUsuario, $contrasena, $idUsuario);
        $cliente=obtenerDatosCliente($idUsuario);
        $sePudoModificarUsuario=true;
        require_once ("../cookbooksUsuario.php"); 
    }

    function cargarUsuario () {
        $per=$_SESSION['permiso']; 
        if($per==1){
            $usuarios=obtenerUsuarios();
            if ( $usuarios!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($usuarios as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'] );
                    $i++;
                }
            }
            require_once("../vistaUsuarios.php");
        }else{
            require_once "../cookbooks.php";
        }
    }
    function bajaUsuario(){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_usuario'];
            $res = eliminarUsuario($id);
            $usuarios=obtenerUsuarios();
            if($usuarios!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($usuarios as $key){
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'] );
                    $i++;
                }
            }
            require_once("../vistaUsuarios.php");
        }
    }

    function borradosUsuario () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $etiquetas=obtenerUsuariosBorrados();

                if ( $etiquetas!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($etiquetas as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'] );
                        $i++;
            
                    }
                }
            require_once("../vistaUsuariosBorrados.php");
        }else{
            //ir al login
        }
    }
    function agregarBorradoUsuario (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_usuario'];
            $borrar=agregarBorradoUsuario($id);
            $usuarios=obtenerUsuarios();
            if ( $usuarios!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($usuarios as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'] );
                    $i++;
                }
            }
            require_once("../vistaUsuarios.php");
        }else{
            require_once "../cookbooks.php";
        }
    }
    function filtrar() {
        if(isset($_GET['tipo'])){
            $valor=$_GET['tipo'];
            
        }
        else
        if (isset($_POST['tipo'])){
                $valor=$_POST['tipo'];
                
        }
        switch ($valor) {
            case 'editorial':
                $todo=filtrarPorEditorial();
                $arrayNa = array();

            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
                require_once("../cookbooks.php");
                break;

            case 'titulo':
                $todo=filtrarPorTitulo();
                $arrayNa = array();
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
                require_once("../cookbooks.php");
                break;
            
            case 'autor':
                $todo=filtrarPorAutor();
                $arrayNa = array();
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
                require_once("../cookbooks.php");
                break;
            
            case 'precio':
                $todo=filtrarPorPrecio();
                $arrayNa = array();
             $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
                require_once("../cookbooks.php");
                break;
            
            case 'etiqueta':
                $todo=filtrarPorEtiqueta();
                $arrayNa = array();
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
                require_once("../cookbooks.php");
                break;
            
            default:
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $todo=filtrarTodosLosLibros();
                $arrayNa = array();
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
                require_once("../cookbooks.php");
                break;
        }
    }
function buscar() {
        
        $valorEditorial=$_POST['busquedaEditorial'];
        $valorEtiqueta=$_POST['busquedaEtiqueta'];
        $valorAutor=$_POST['busquedaAutor'];
        $resultado=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor);
        $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNa = array();
        $i=0;
        foreach ($resultado as $key ) {
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                    'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                $i++;
                }
        require_once("../cookbooks.php");
}

function buscarRegistrado() {
        
        $valorEditorial=$_POST['busquedaEditorial'];
        $valorEtiqueta=$_POST['busquedaEtiqueta'];
        $valorAutor=$_POST['busquedaAutor'];
        $resultado=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor);
        $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNa = array();
        $i=0;
        foreach ($resultado as $key ) {
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                    'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                $i++;
                }
        require_once("../cookbooksUsuario.php");
}
    function filtrarRegistrado() {
        if(isset($_GET['tipo'])){
            $valor=$_GET['tipo'];
            
        }
        else
        if (isset($_POST['tipo'])){
                $valor=$_POST['tipo'];
                
        }
        switch ($valor) {
            case 'editorial':
                $todo=filtrarPorEditorial();
                $arrayNa = array();

            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;

            case 'titulo':
                $todo=filtrarPorTitulo();
                $arrayNa = array();
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
            
            case 'autor':
                $todo=filtrarPorAutor();
                $arrayNa = array();
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
            
            case 'precio':
                $todo=filtrarPorPrecio();
                $arrayNa = array();
             $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
            
            case 'etiqueta':
                $todo=filtrarPorEtiqueta();
                $arrayNa = array();
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
            
            default:
            $resultadoAutor=obtenerAutores();
        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $arrayNe = array();
        $i=0;
        foreach ($resultadoAutor as $key ) {
            $arrayNe[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $arrayNo = array();
        $i=0;
        foreach ($resultadoEtiqueta as $key ) {
        $arrayNo[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
        $i=0;
        $arrayNu = array();
        foreach ($resultadoEditorial as $key ) {
            $arrayNu[$i]=array('nombre' => $key['nombre']);
            $i++;
        }
                $todo=filtrarTodosLosLibros();
                $arrayNa = array();
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
        }
    }
}



 
?>