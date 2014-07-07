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
            $arreglo_editorial= recuperarEditorial($libro[0]['id_editorial']);
            $arreglo_etiqueta= recuperarEtiqueta($libro[0]['id_etiqueta']);
            $arreglo_autor= recuperarLibroAutor($libro[0]['id_libro']);
            $nom_editorial= $arreglo_editorial["nombre"];
            $nom_etiqueta = $arreglo_etiqueta["nombre"];
            $nom_autor= $arreglo_autor["nombre"];
            $id_editorial= $arreglo_editorial["id_editorial"];
            $id_autor=  $arreglo_autor["id_autor"];
            $id_etiqueta= $arreglo_etiqueta["id_etiqueta"];
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
            $arreglo_editorial= recuperarEditorial($id_editorial);
            $arreglo_etiqueta= recuperarEtiqueta($id_etiqueta);
            $arreglo_autor= recuperarAutor($id_autor);
            $nom_editorial= $arreglo_editorial["nombre"];
            $nom_etiqueta = $arreglo_etiqueta["nombre"];
            $nom_autor= $arreglo_autor["nombre"];

            $name= $_FILES["portada"]["name"];
            $tipo_de_archivo= $_FILES["portada"]["type"]; //SIRVE PARA VERIFICAR QUE SEA IMAGEN
            $tmp_name= $_FILES["portada"]["tmp_name"];
            $size = $_FILES["portada"]["size"];
            if( strpos($tipo_de_archivo,"gif") || strpos($tipo_de_archivo,"jpg") || strpos($tipo_de_archivo,"jpeg") || strpos($tipo_de_archivo, "png") ){

                $tipo= explode(".", $name);
                $type=strtolower($tipo[1]);
                $referencia= sha1(date("r"));
                $carpeta= "C:/xampp/htdocs/JAMP/IMG/".$referencia.".".$type;
                move_uploaded_file($tmp_name, $carpeta);
                $aver= explode("htdocs", $carpeta);
                $referencia_util= $aver[1];

                $buscaIdPorIsbn= validarModificacionLibro($isbn);
                if($buscaIdPorIsbn != false){
    //            $arreglo= validarAltaLibro($nom, $isbn);   
      //          if((!empty($arreglo))){
                   // $arrayNa=array('nombre'=>$nom,'isbn'=>$isbn,'cantPag'=>$cantHojas,'stock' =>$cantLibros,
                     //   'precio'=>$precio,'id_libro'=>$id_libro,'referencia_foto'=>$referencia_util);
                    $existe = 'existe';
                    require_once("../vistaAltaLibro.php");
                }else{
                    $intento=insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor, $referencia_util);
                    if ($intento){
                        $libros=obtenerLibros();
                        if ( $libros!="error"){
                           $arrayNa = array();
                           $sePudoModificar = true;
                           $i=0;
                           foreach ($libros as $key ) {
                                $arrayNa[$i]=array('nombre' => $key['nombre'],'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                    'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'], 'referencia_foto'=>$key['referencia_foto'] );
                                $i++;
                            }
                        require_once("../vistaLibros.php");
                        }
                    }
                }
            }else{
                $no_imagen="no_imagen";
                require_once("../vistaAltaLibro.php");
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
            $arreglo_editorial= recuperarEditorial($id_editorial);
            $arreglo_etiqueta= recuperarEtiqueta($id_etiqueta);
            $arreglo_autor= recuperarAutor($id_autor);
            $nom_editorial= $arreglo_editorial["nombre"];
            $nom_etiqueta = $arreglo_etiqueta["nombre"];
            $nom_autor= $arreglo_autor["nombre"];

            $name= $_FILES["portada"]["name"];
            $tipo_de_archivo= $_FILES["portada"]["type"]; //SIRVE PARA VERIFICAR QUE SEA IMAGEN
            $tmp_name= $_FILES["portada"]["tmp_name"];
            $size = $_FILES["portada"]["size"];
            if( strpos($tipo_de_archivo, "gif") || strpos($tipo_de_archivo, "jpg") || 
                strpos($tipo_de_archivo, "jpeg") || strpos($tipo_de_archivo, "png") ){
                $tipo= explode(".", $name);
                $type=strtolower($tipo[1]);
                $referencia= sha1(date("r"));
                $carpeta= "C:/xampp/htdocs/JAMP/IMG/".$referencia.".".$type;
                move_uploaded_file($tmp_name, $carpeta);
                $aver= explode("htdocs", $carpeta);
                $referencia_util= $aver[1];
                $buscaIdPorIsbn= validarModificacionLibro($isbn);
                if($buscaIdPorIsbn['id_libro']==$id_libro || $buscaIdPorIsbn==false ){
                    $intento=modificarLibro($id_libro, $nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor, $referencia_util);
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
                }else{
                    $existe = 'existe';
                    require_once("../vistaModificarLibro.php");
                }
            }else{                
                $no_imagen="no_imagen";
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
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 
                        'id_libro' => $key['id_libro'], 'referencia_foto'=>$key['referencia_foto']);
                    $i++;
                }
            }
            require_once("../vistaLibros.php");
        }else{
            $libros=obtenerLibros();
            if ( $libros!="error"){
                $arrayNa = array();
                header("Content_Type: image/jpeg");
                $i=0;
                foreach ($libros as $key ) {
                    echo $key['imagen'];
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'],
                         'id_libro' => $key['id_libro'], 'referencia_foto'=>$key['referencia_foto'] );
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

    function registroAdmin(){
        require_once("../vistaRegistroAdmin.php");
    }

    function registrarCliente () {  //REVEER BIEN POR EL TEMA DEL DNI
        $nombre=$_POST ['nombre'];
        $apellido=$_POST ['apellido'];
        $email=$_POST ['email'];
        $telefono=$_POST ['telefono'];
        $dni=$_POST ['dni'];
        $nombreUsuario=$_POST ['nombreUsuario'];
        $contrasena=$_POST ['contrasena'];
        $buscaNomUsuarioYDNI = validarUsuarioYDni($nombreUsuario, $dni);
        if( (sizeof($buscaNomUsuarioYDNI)==0) ){
            $permiso=2;
            $intento= altaCliente($nombreUsuario, $nombre, $apellido, $dni,  $email, $telefono,$contrasena, $permiso);
            if ($intento){
                $res = recuperarCliente($nombreUsuario);
                altaCarrito($res[0]['id_usuario']);
                $sePudoAlta = true;

            //      PEGO EL CACHO DE CODIGO QUE CARGA TODO LO NECESARIO PARA EL FILTRADO Y LA ORDENACION DE LIBROS
            //      POR SUPUESTO QUE NO ES LO IDEAL REPETIR ESTE CACHO, PERO NO TENGO IDEA DE OTRA ALTERNATIVA
            //      ADEMAS DE NO HABER HECHO YO EL CODIGO. POR EL MOMENTO ESTE PARCHE SAFA
            //      PERO ESTÁ REPETIDO EN TODOS LOS CODIGOS QUE REDIRIGEN AL INICIO DE LOS USUARIOS

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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
                    $i++;
                }

                require_once ("../cookbooks.php");
            }
        }else{
            $i=0;
            foreach ($buscaNomUsuarioYDNI as $key){
                if ($key['nombreusuario']==$nombreUsuario ){
                    $nombreUsuario="";
                }
                if($key['dni']==$dni ){
                    $dni="";
                }
                $i++;
            }  
            $niAPalo=true;
            require_once ("../vistaRegistrar.php");
        }
    }

    function registrarAdministrador () { 
        $nombreUsuario= $_POST['nombreusuario'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];
        $dni= $_POST['dni'];
        $contrasena= $_POST['contrasena'];
        $telefono= $_POST['telefono'];
        $email= $_POST['email'];       
        $permiso= $_POST['id_permiso'];
        $buscaNomUsuarioYDNI = validarUsuarioYDni($nombreUsuario, $dni);
        if( sizeof($buscaNomUsuarioYDNI)==0 ){
            $sePudoModificarUsuario=true;
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
            }
        }else{
            $i=0;
            foreach ($buscaNomUsuarioYDNI as $key){
                if ($key['nombreusuario']==$nombreUsuario ){
                    $nombreUsuario="";
                }
                if($key['dni']==$dni ){
                    $dni="";
                }
                $i++;
            }        
            if($permiso==1) $nombre_permiso="Administrador";
            else $nombre_permiso="Usuario";
            $niAPalo=true;
            require_once("../vistaRegistroAdmin.php");
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

    function modificarAdmin () {
        $nombre=$_POST ['nombre'];
        $apellido=$_POST ['apellido'];
        $email=$_POST ['email'];
        $telefono=$_POST ['telefono'];
        $dni=$_POST ['dni'];
        $nombreUsuario=$_POST ['nombreUsuario'];
        $contrasena=$_POST ['contrasena'];
        $id_usuario=$_POST ['id_usuario'];
        $buscaNomUsuarioYDNI = validarUsuarioYDni($nombreUsuario, $dni);
        if( (sizeof($buscaNomUsuarioYDNI) < 2 && $buscaNomUsuarioYDNI[0]['id_usuario']==$id_usuario)
            ||  (sizeof($buscaNomUsuarioYDNI)==1) ){
            $cliente=modificarDatosCliente($nombre,$apellido, $email,$telefono, $dni, $nombreUsuario, $contrasena, $id_usuario);
            $cliente=obtenerDatosCliente($id_usuario);
            $sePudoModificarAdmin=true;
            require_once ("../vistaPerfilAdministrador.php");
        }else{
            $i=0;
            foreach ($buscaNomUsuarioYDNI as $key){
                if ($key['nombreusuario']==$nombreUsuario && $key['id_usuario']==$id_usuario) {
                    $hayNombre=true;
                }
                if($key['dni']==$dni && $key['id_usuario']==$id_usuario){
                    $hayDNI=true;
                }
                $i++;
            }                        
            if(!isset($hayNombre)){
                $nombreUsuario="";
            }
            if (!isset($hayDNI)) {
                $dni="";
            }
            $niAPalo=true;
            require_once ("../vistaPerfilAdministrador.php");
        }
    }

    function modificarCliente () {
        $nombre=$_POST ['nombre'];
        $apellido=$_POST ['apellido'];
        $email=$_POST ['email'];
        $telefono=$_POST ['telefono'];
        $dni=$_POST ['dni'];
        $nombreUsuario=$_POST ['nombreUsuario'];
        $contrasena=$_POST ['contrasena'];
        $id_usuario=$_POST ['id_usuario'];
        $buscaNomUsuarioYDNI = validarUsuarioYDni($nombreUsuario, $dni);
        if( (sizeof($buscaNomUsuarioYDNI) < 2 && $buscaNomUsuarioYDNI[0]['id_usuario']==$id_usuario)
            ||  (sizeof($buscaNomUsuarioYDNI)==1) ){
            $cliente=modificarDatosCliente($nombre,$apellido, $email,$telefono, $dni, $nombreUsuario, $contrasena, $id_usuario);
            $cliente=obtenerDatosCliente($id_usuario);
            $sePudoModificarUsuario=true;

            //      PEGO EL CACHO DE CODIGO QUE CARGA TODO LO NECESARIO PARA EL FILTRADO Y LA ORDENACION DE LIBROS
            //      POR SUPUESTO QUE NO ES LO IDEAL REPETIR ESTE CACHO, PERO NO TENGO IDEA DE OTRA ALTERNATIVA
            //      ADEMAS DE NO HABER HECHO YO EL CODIGO. POR EL MOMENTO ESTE PARCHE SAFA
            //      PERO ESTÁ REPETIDO EN TODOS LOS CODIGOS QUE REDIRIGEN AL INICIO DE LOS USUARIOS

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
                $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                    'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
                $i++;
            }

            require_once ("../cookbooksUsuario.php");
        }else{
            $i=0;
            foreach ($buscaNomUsuarioYDNI as $key){
                if ($key['nombreusuario']==$nombreUsuario && $key['id_usuario']==$id_usuario) {
                    $hayNombre=true;
                }
                if($key['dni']==$dni && $key['id_usuario']==$id_usuario){
                    $hayDNI=true;
                }
                $i++;
            }                        
            if(!isset($hayNombre)){
                $nombreUsuario="";
            }
            if (!isset($hayDNI)) {
                $dni="";
            }
            $niAPalo=true;
            require_once ("../vistaPerfil.php");
        }
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
               // var_dump($todo);
                $arrayNa = array();
                $i=0;
                foreach ($todo as $key ) {
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'], 
                        'id_libro'=>$key['id_libro']);
                    $i++;
                }
               //var_dump($todo);
                require_once("../cookbooks.php");
                break;
        }
    }
 /*
   function muestraImagen(){
        echo "ESTOY EN MUESTRAIMAGEN";
        $imagen= pruebaImagen();
        $mime= $imagen['extension'];
        $posta = $imagen['imagen'];
        $laposta= imagejpeg($posta);
        var_dump($laposta);
        header("Content_Type = $mime ");
        echo $laposta;
    }*/

function buscar() {
        
        $valorEditorial=$_POST['busquedaEditorial'];
        $valorEtiqueta=$_POST['busquedaEtiqueta'];
        $valorAutor=$_POST['busquedaAutor'];
        //$resultado=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor); $resultado ahora es $todo
        $todo=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor);
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
        foreach ($todo as $key ) {
                $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
                    $i++;
        }
            require_once("../cookbooks.php");
        
           
}

function buscarRegistrado() {
        
        $valorEditorial=$_POST['busquedaEditorial'];
        $valorEtiqueta=$_POST['busquedaEtiqueta'];
        $valorAutor=$_POST['busquedaAutor'];
        $todo=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor);
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
        foreach ($todo as $key ) {
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                    'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                        'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
        }
    }

    function bajaUsuarioRegistrado() {
            //if(isset($confirmar)){
            $id=$_SESSION['id_usuario'];
            eliminarUsuario($id);
            require_once("../index.php");
            
    }

    function bajaAdminRegistrado() {
       
            $id=$_SESSION['id_usuario'];
            $res=obtenerUsuariosAdmin();

            if(sizeof($res)>1){
                eliminarUsuario($id);
                require_once("../index.php");
            }
            else{

                echo "<div class='alert alert-danger'>Error! no se puede realizar la baja debido a que es el último admin dado de alta en el sistema </div>";
                 
            }
    }
}



 
?>