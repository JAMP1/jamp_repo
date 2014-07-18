<?php
require_once("../Modelo/modelo.php");
$nombre=$_GET["action"];
session_start();
class entidad{
    //ABM ETIQUETA
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
                $sePudoReAlta = true;
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
        $sePudoBaja=true;
        require_once("../vistaEtiquetas.php");
        }
    }
    function modificarEtiqueta () {
        $per=$_SESSION['permiso'];
        $nombre_etiqueta=$_GET['nombre'];
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
            $nombre_etiqueta=$_POST['nombre_etiqueta'];
            $id=$_POST['id_etiqueta'];
            $arreglo= validarAltaEtiqueta($nombre_etiqueta);
            if((!empty($arreglo)) && ($arreglo[0]['id_etiqueta'] != $id)){
                $existe = 'existe';
                require_once("../vistaModificarEtiqueta.php");
            }else{
                $intento=modificarEtiqueta($nombre_etiqueta,$id);
                if ($intento){
                    $etiquetas=obtenerEtiquetas();
                    if ( $etiquetas!="error"){
                        $arrayNa = array();
                        if(!empty($arreglo)){
                            if($nombre_etiqueta != $arreglo[0]['nombre']){
                                $sePudoModificar = true;
                            }
                        }else{
                            $sePudoModificar = true;
                        }
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
    //fin abm etiqueta

    //ABM EDITORIAL
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
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
                $sePudoReAlta=true;
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
            $sePudoBaja=true;
            require_once("../vistaEditorial.php");
        }
    }
    function modificarEditorial () {
        $per=$_SESSION['permiso'];
        $nombre_editorial=$_GET['nombre'];
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
                        $i=0;
                    foreach ($editoriales as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                             'id_us' => $key['id_editorial'] );
                        $i++;           
                    }
                    $sePudoAlta=true;
                    require_once("../vistaEditorial.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionEditorial () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nombre_editorial=$_POST['nombre_editorial'];
            $id=$_POST['id_editorial'];
            $arreglo= validarAltaEditorial($nombre_editorial);
            if((!empty($arreglo)) && ($arreglo[0]['id_editorial'] != $id)){
                $existe = 'existe';
                require_once("../vistaModificarEditorial.php");
            }else{
                $intento=modificarEditorial($nombre_editorial,$id);
                if ($intento){
                    $editoriales=obtenerEditoriales();
                    if ( $editoriales!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($editoriales as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_editorial'] );
                            $i++;
                        }
                        if(!empty($arreglo)){
                            if($nom != $arreglo[0]['nombre']){
                                $sePudoModificar = true;
                            }
                        }else{
                            $sePudoModificar = true;
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
    //fin abm editorial
    //ABM IDIOMA
    function altaIdioma (){
            require_once("../vistaAltaIdioma.php");
    }
    function bajaIdioma () {
        $per=$_SESSION['permiso'];
        if($per==1){
        $id=$_POST['id_idioma'];
        $borrar=eliminarIdioma($id);
        $idiomas=obtenerIdiomas();
        if ( $idiomas!="error"){
            $arrayNa = array();
            $i=0;
            foreach ($idiomas as $key ) {
                $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                        'id_us' => $key['id_idioma'] );
                $i++;
            }
        }
        $sePudoBaja = true;
        require_once("../vistaIdiomas.php");
        }
    }
    function cargarIdioma () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $idiomas=obtenerIdiomas();
            if ( $idiomas!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($idiomas as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_idioma'] );
                    $i++;
                }
            }
            require_once("../vistaIdiomas.php");
        }else{
            require_once './cookbooks.php';
        }
    }

    
    function confirmarAltaIdioma () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_idioma"];
            $arreglo= validarAltaIdioma($nom);
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom)){
                $existe = 'existe';
                require_once("../vistaModificarIdioma.php");
            }else{
                $intento=insertarIdioma($nom);
                if ($intento){
                    $idiomas=obtenerIdiomas();
                    if ( $idiomas!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($idiomas as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_idioma'] );
                            $i++;
                        }
                        $sePudoAlta = true;
                        require_once("../vistaIdiomas.php");
                    }
                }
            }
        }
    }
    function modificarIdioma () {
        $per=$_SESSION['permiso'];
        $nombre_idioma=$_GET['nombre'];
        //echo $n;
        if($per==1){
            $id=$_POST['id_idioma'];
            require_once("../vistaModificarIdioma.php");
        }
    }
    function confirmarModificacionIdioma () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nombre_idioma=$_POST['nombre_idioma'];
            $id=$_POST['id_idioma'];
            $arreglo= validarAltaIdioma($nombre_idioma);
            if((!empty($arreglo)) && ($arreglo[0]['id_idioma'] != $id)){
                $existe = 'existe';
                require_once("../vistaModificarIdioma.php");
            }else{
                $intento=modificarIdioma($nombre_idioma,$id);
                if ($intento){
                    $idiomas=obtenerIdiomas();
                    if ( $idiomas!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($idiomas as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_idioma'] );
                            $i++;
                        }
                        if(!empty($arreglo)){
                            if($nombre_idioma != $arreglo[0]['nombre']){
                                $sePudoModificar = true;
                            }
                        }else{
                            $sePudoModificar = true;
                        }
                        require_once("../vistaIdiomas.php");
                    }            
                }
            }       
        }
    }
    function borradosIdiomas () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $idiomas=obtenerIdiomasBorrados();
                if ( $idiomas!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($idiomas as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_idioma'] );
                        $i++;
                    }
                }
            require_once("../vistaIdiomasBorrados.php");
        }else{
            //ir al login
        }
    }
    function agregarBorradaIdioma () {   
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_POST['id_idioma'];
            $borrar=agregarBorradaIdiomas($id);
            $idiomas=obtenerIdiomas();
            if ( $idiomas!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($idiomas as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_idioma'] );
                    $i++;
                }                
            }
            $sePudoReAlta = true;
            require_once("../vistaIdiomas.php");
        }
    } 
    //lerolero
    //ABM AUTOR
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
                $arrayNa = array();
                $i=0;
                foreach ($autores as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_autor'], 'detalle'=>$key['detalle']  );
                    $i++;
                }                
            }
            $sePudoReAlta = true;
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
                        'id_us' => $key['id_autor'], 'detalle'=>$key['detalle']  );
                $i++;
            }
        }
        $sePudoBaja = true;
        require_once("../vistaAutores.php");
        }
    }
    function modificarAutor () {
        $per=$_SESSION['permiso'];
        $nombre_autor=$_GET['nombre'];
        $detalle_autor=$_POST['detalle_autor'];
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
                                'id_us' => $key['id_autor'], 'detalle'=>$key['detalle']  );
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
            $nom=$_POST['nom_autor'];
            $arreglo= validarAltaAutor($nom);
            //FALTA EL ID
            if(!empty($_POST['detalle_autor'])){
                $detalle= $_POST['detalle_autor'];
            }else{
                $detalle= "no posee";
            }
            if((!empty($arreglo)) && ($arreglo[0]['nombre'] == $nom) ){
                $existe = 'existe';
                require_once("../vistaAltaAutor.php");
            }else{                
                $intento=insertarAutor($nom, $detalle);
                if ($intento){
                    $autores=obtenerAutores();
                    if ( $autores!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($autores as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'], 'detalle'=>$key['detalle'] );
                            $i++;
                        }
                        $sePudoAlta = true;
                        require_once("../vistaAutores.php");
                    }
                }
            }
        }
    }
    function confirmarModificacionAutor () {
        $per=$_SESSION['permiso'];
        if($per==1){
            $nombre_autor=$_POST['nom_autor'];
            $id=$_POST['id_autor'];
           // $detalle_autor= $_POST['detalle_autor'];
            $arreglo= validarAltaAutor($nombre_autor);
            if(!empty($_POST['detalle_autor'])){
                $detalle_autor= $_POST['detalle_autor'];
                /*if(count($detalle)==0){
                    $detalle="no posee";
                }*/
            }else{
                $detalle_autor= "no posee";
            }
            if((!empty($arreglo)) && ($arreglo[0]['id_autor'] != $id)){
                $existe = 'existe';
                require_once("../vistaModificarAutor.php");
            }else{
                $intento=modificarAutor($nombre_autor,$id,$detalle_autor);
                if ($intento){
                    $autores=obtenerAutores();
                    if ( $autores!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($autores as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                                'id_us' => $key['id_autor'], 'detalle'=>$key['detalle']  );
                            $i++;
                        }
                        $sePudoModificar = true;
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
                            'id_us' => $key['id_autor'], 'detalle'=>$key['detalle']  );
                    $i++;
                }
            }
            require_once("../vistaAutores.php");
        }else{
            require_once './cookbooks.php';
        }
    }
    //fin abm autor

    //ABM LIBRO
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
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                    $i++;
                }
            }
            $sePudoReAlta = true;
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
            $sePudoBaja = true;
            require_once("../vistaLibros.php");
        }
    }
    function modificarLibro () {
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        if($per==1){
            $id_libro=$_POST['id_libro'];
            $libro=recuperarLibro($id_libro);
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
                                'stock' =>$key['stock'],'precio'=>$key['precio'],
                                'id_libro' => $key['id_libro'], 'detalle_libro'=>$key['detalle_libro'] );
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
            $cantLibros=1;
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

            if(!empty($_POST['detalle_libro'])){
                $detalle= $_POST['detalle_libro'];
            }else{
                $detalle= "no posee";
            }

            $tipo_de_archivo= $_FILES["portada"]["type"];
            if(strpos($tipo_de_archivo,"gif")||strpos($tipo_de_archivo, "jpg")||strpos($tipo_de_archivo, "jpeg")
                                                                            ||strpos($tipo_de_archivo, "png")  ){
                $tamanio = $_FILES["portada"]["size"];
                if($tamanio > 1 ){
                    $name= $_FILES["portada"]["name"];
                    $tmp_name= $_FILES["portada"]["tmp_name"];
                    $tipo= explode(".", $name);
                    $type=strtolower($tipo[1]);
                    $referencia= sha1(date("r"));
                    $carpeta= "C:/xampp/htdocs/JAMP/IMG/".$referencia.".".$type;
                    move_uploaded_file($tmp_name, $carpeta);
                    $aver= explode("htdocs", $carpeta);
                    $referencia_util= $aver[1];
                }else{
                    $estaMalElTamanio = true;
                    require_once("../vistaAltaLibro.php");
                }     

            }else{
                if (isset($_POST["vieja_portada"])){
                    $referencia_util = $_POST["vieja_portada"];
                }else{
                    $no_imagen="no_imagen";
                    require_once("../vistaAltaLibro.php");
                }
            }
            if(isset($referencia_util)){
                $buscaIdPorIsbn= validarModificacionLibro($isbn);
                if($buscaIdPorIsbn != false){
                    $existe = 'existe';
                    $isbn="";
                    require_once("../vistaAltaLibro.php");
                }else{
                    $intento=insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, 
                                            $id_editorial, $id_etiqueta, $referencia_util, $detalle);
                    $buscaIdPorIsbn= validarModificacionLibro($isbn);
                    $id_libro= $buscaIdPorIsbn['id_libro'];
                    altaLibroAutor($id_libro, $id_autor);
                    if ($intento){
                        $libros=obtenerLibros();
                        if ( $libros!="error"){
                           $arrayNa = array();
                           $i=0;
                           foreach ($libros as $key ) {
                                $arrayNa[$i]=array('nombre' => $key['nombre'],'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                    'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'], 
                                    'referencia_foto'=>$key['referencia_foto'], 'detalle_libro'=>$key['detalle_libro'] );
                                $i++;
                            }
                        $sePudoAlta=true;
                        require_once("../vistaLibros.php");
                        }
                    }
                }
            }else{
               // $no_imagen="no_imagen";
                //require_once("../vistaAltaLibro.php");
            }
        }

    }
    function confirmarModificacionLibro (){
        $per=$_SESSION['permiso'];
        if($per==1){
            $nom=$_POST["nom_libro"];
            $isbn=$_POST["isbn_libro"];
            $cantHojas=$_POST["cantHojas_libro"];
            $cantLibros=1;
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
            $tamanio = $_FILES["nueva_portada"]["size"];
            if(!empty($_POST['detalle_libro'])){
                $detalle= $_POST['detalle_libro'];
            }else{
                $detalle= "no posee";
            }
            if($tamanio > 1 ){            
                $name= $_FILES["nueva_portada"]["name"];
                $tipo_de_archivo= $_FILES["nueva_portada"]["type"]; //SIRVE PARA VERIFICAR QUE SEA IMAGEN
                $tmp_name= $_FILES["nueva_portada"]["tmp_name"];
                $size = $_FILES["nueva_portada"]["size"];
                if( ( strpos($tipo_de_archivo, "gif") || strpos($tipo_de_archivo, "jpg") || 
                strpos($tipo_de_archivo, "jpeg") || strpos($tipo_de_archivo, "png") ) ){
                    $tipo= explode(".", $name);
                    $type=strtolower($tipo[1]);
                    $referencia= sha1(date("r"));
                    $carpeta= "C:/xampp/htdocs/JAMP/IMG/".$referencia.".".$type;
                    move_uploaded_file($tmp_name, $carpeta);
                    $aver= explode("htdocs", $carpeta);
                    $referencia_util= $aver[1];
                }
            }else{
                if(isset($_POST["vieja_portada"])){
                    $referencia_util = $_POST["vieja_portada"];
                }
            }
            if(isset($referencia_util)){
                $buscaIdPorIsbn= validarModificacionLibro($isbn);
                $libro=recuperarLibro($buscaIdPorIsbn["id_libro"]); // SIRVE PARA COMPARAR EL ID DEL ISBN INGRESADO CON EL ANTIGUO
                if($buscaIdPorIsbn['id_libro']==$id_libro || $buscaIdPorIsbn==false ){
                    $intento=modificarLibro($id_libro, $nom, $isbn, $cantHojas, $cantLibros, $precio, 
                                            $id_editorial, $id_etiqueta, $referencia_util, $detalle);
                    modificarLibroAutor($id_libro,$id_autor);
                    if ($intento){
                        $libros=obtenerLibros();
                        if ( $libros!="error"){
                            $arrayNa = array();
                            $i=0;
                            foreach ($libros as $key ) {
                                $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                    'stock' =>$key['stock'],'precio'=>$key['precio'], 
                                    'id_libro' => $key['id_libro'], 'detalle_libro'=>$key['detalle_libro'] );
                                $i++;
                            }
                        $existe=null;
                        $sePudoModificar=true;
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
                        'id_libro' => $key['id_libro'], 'referencia_foto'=>$key['referencia_foto'], 'detalle_libro'=>$key['detalle_libro']);
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
                         'id_libro' => $key['id_libro'], 'referencia_foto'=>$key['referencia_foto'], 
                         'detalle_libro'=>$key['detalle_libro'] );
                    $i++;
                }
            } //TENGO QUE VER CÓMO HACER PARA LISTAR LOS LIBROS EN EL INICIO
             
            require_once "../cookbooks.php";
        }
    }
    //fin abm libro

    function cargarCarrito(){
        $idUsuario = $_POST['idUsuario'];
        $libros=recuperarLibroCarrito($idUsuario);
        if (count($libros) > 0){
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key[29] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'],
                        'id_carrito'=>$key['id_carrito'], 'cantidad_pedida'=>$key['cantidad_pedida'] );
                    $i++;
                }
            } 
        }
        //TAMBIÉN TENGO QUE CARGAR LAS FECHAS DE LAS VENTAS QUE TUVO EL USUARIO PARA LISTARLAS
        $id_carrito= buscaIdCarritoPorIdUsuario($idUsuario);
        $ventas=recuperarTodasLasVentas($id_carrito['id_carrito']);
        if(count($ventas) > 0){
            if ($ventas != "error"){
                $arregloVentas= array();
                $i=0;
                $fecha=0;
                foreach ($ventas as $key) {
                    if($fecha != $key['fecha']){
                        $arregloVentas[$i]= array('fecha'=>$key['fecha'], 'estado'=>$key['estado'], 'id_venta'=>$key['id_venta'],
                                                'nombre_estado'=>$key['nombre_estado'], 'precio_total'=> $key['precio_total']);
                    }
                    $fecha = $key['fecha'];
                    $i++;
                }
            }
        }
        require_once "../vistaCarritoLibro.php";
    }

    
    
    



    function bajaLibroCarrito(){
        $per=$_SESSION['permiso'];
        if($per==2){
            $id_libro=$_POST['id_libro'];
            $id_carrito=$_POST['id_carrito'];
            $idUsuario=$_POST['id_usuario'];
            $borrar=eliminarUnLibroDeCarrito($id_carrito, $id_libro);
            $libros=recuperarLibroCarrito($idUsuario);
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                    $arrayNa[$i]=array('nombre' => $key[29] , 'isbn' => $key['isbn'], 
                        'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'],
                        'id_carrito'=>$key['id_carrito'], 'cantidad_pedida'=>$key['cantidad_pedida'] );
                    $i++;
                }
            }
            $id_carrito= buscaIdCarritoPorIdUsuario($idUsuario);
            $ventas=recuperarTodasLasVentas($id_carrito['id_carrito']);
            if(count($ventas) > 0){
                if ($ventas != "error"){
                    $arregloVentas= array();
                    $i=0;
                    foreach ($ventas as $key) {
                        $arregloVentas[$i]= array('fecha'=>$key['fecha'], 'estado'=>$key['estado'], 'id_venta'=>$key['id_venta'],
                                                'nombre_estado'=>$key['nombre_estado'], 'precio_total'=> $key['precio_total']);
                        $i++;
                    }
                }
            }
            $sePudoBaja=true;
            require_once("../vistaCarritoLibro.php");
        }

    }


    function solicitarCompraLibro(){
        $id_carrito=$_POST['id_carrito'];
        $idUsuario=$_POST['id_usuario'];
        $precioTotal=$_POST['precioTotal'];
        $stringCantidades= $_POST['stringCantidades'];
        $stringPrecios= $_POST['stringPrecios'];
        $codigo_postal=recuperaCodigoPostal($idUsuario);

        //$arreglo_cantidades= explode(" ", $stringCantidades, -1);
        //$arreglo_precios = explode(" ", $stringPrecios, -1);
        require_once("../vistaDatosTarjeta.php");
    }

    function comprarLibro(){
        //este modulo debe obtener toda la informacion del carrito del usuario
        // dar de alta una unica venta correspondiente al carrito del usuario
        //  dar de alta una tupla por libro en tabla "libroventa" con el id de la venta respectiva y el del libro en cuestion
        //   eliminar la informacion correspondiente a la tabla "carrito_libro" del usuario en cuestion
        // 
        //  DEBERIA CONSIDERAR A QUE VISTA DEVUELVO AL USUARIO Y QUE INFORMACION VOY A CARGAR EN LA MISMA
        $per=$_SESSION['permiso'];
        if($per==2){
            $id_carrito=$_POST['id_carrito'];
            $idUsuario=$_POST['idUsuario'];  
            $stringCantidades= $_POST['stringCantidades'];
            $stringPrecios= $_POST['stringPrecios'];
            $arreglo_cantidades= explode(" ", $stringCantidades, -1);
            $arreglo_precios = explode(" ", $stringPrecios, -1);        
            $precioTotal = $_POST['precioTotal'];

            $libros= obtenerLibrosEnCarrito($id_carrito); //obtiene un arreglo que contiene un arreglo por libro
            altaVenta($id_carrito, $precioTotal); //efectua el alta en la tabla venta correspondiente al id del carrito del usuario
            $id_venta=recuperarUltimaVenta($id_carrito); //recupera el id de la venta dada de alta recientemente para el alta en la tabla libroventa
            altaVentaLibro($id_venta, $libros, $arreglo_cantidades, $arreglo_precios); //efectua el alta en la tabla libroventa por cada uno de los libros comprados
            eliminarLibroCarrito($id_carrito); //realiza la limpieza del carrito completo

         /*   echo "Libros en carrito: ";
            var_dump($libros);
            echo " Identificador de la venta: ";
            var_dump($id_venta);
            echo " Arreglo de cantidades: ";
            var_dump($arreglo_cantidades);
            echo " Arreglo de precios: ";
            var_dump($arreglo_precios);*/

            $id_carrito= buscaIdCarritoPorIdUsuario($idUsuario);
            $ventas=recuperarTodasLasVentas($id_carrito['id_carrito']);
            if(count($ventas) > 0){
                if ($ventas != "error"){
                    $arregloVentas= array();
                    $i=0;
                    $fecha=0;
                    foreach ($ventas as $key) {
                        if($fecha != $key['fecha']){
                            $arregloVentas[$i]= array('fecha'=>$key['fecha'], 'estado'=>$key['estado'], 'id_venta'=>$key['id_venta'],
                                                    'nombre_estado'=>$key['nombre_estado'], 'precio_total'=> $key['precio_total']);                            
                        }
                        $fecha = $key['fecha'];
                        $i++;
                    }
                }
            }
            require_once("../vistaCarritoLibro.php");
        }
    }

    function verDetalleVenta(){
        $per=$_SESSION['permiso'];
        if($per==2){
            $id_venta=$_POST['id_venta'];
            $arregloVentas= recuperarVentaPorId($id_venta);
            $enDetalle=true;
            /*$total=0;
            foreach($arregloVentas as $key){
                $total = $total + ($key['cantidad_comprada']*$key['precio']);
            }*/
            //var_dump($libros_vendidos);
            require_once("../vistaHistorialDeVentasUsuario.php");
        }
    }

    function verTodasLasVentas(){
        $per=$_SESSION['permiso'];
        if($per==2){
            $id_usuario=$_SESSION['id_usuario'];
            $id_carrito= buscaIdCarritoPorIdUsuario($id_usuario);
            $arregloVentas = recuperarTodasLasVentas($id_carrito['id_carrito']);
            //var_dump($arregloVentas);
            require_once("../vistaHistorialDeVentasUsuario.php");
            /*foreach ($arregloVentas as $key ) {
            if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                $marca=true;
            }else{ 
                $marca=false;
            }
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[19] ,
                'etiqueta' => $key[12] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                'id_libro'=>$key['id_libro'], 'marca'=>$marca);
            $i++;
            }*/   
        }
    }

    function actualizaCantidadDeLibros(){
        $cantidad = $_POST['cantidad_libros'];
        $id_carrito=$_POST['id_carrito'];
        $id_libro=$_POST['id_libro'];
        actualizaLibroCarrito($id_carrito, $id_libro , $cantidad);
      
    }

    function agregarLibroCarrito(){
        //agrega el libro seleccionado al carrito del usuario
        //luego carga un vector con los libros de su carrito para poder marcarlos en la vista
        //y finalmente carga todo lo necesario para visualizar los libros en su inicio
        $id_libro=$_POST['id_libro'];
        $id_usuario=$_SESSION['id_usuario'];
        $id_carrito= buscaIdCarritoPorIdUsuario($id_usuario);
        agregarLibroCarrito($id_carrito['id_carrito'],$id_libro);

        $carrito= obtenerLibrosEnCarrito($id_carrito['id_carrito']); //esto obtiene todo lo del carrito
        $arregloDeClaves= array();
        $i=0;
        foreach ($carrito as $key) {    //esto pone todas los id de los libros en un solo arreglo
            $arregloDeClaves[$i]= $key['id_libro'];
            $i++;
        }

        $resultadoEtiqueta=obtenerEtiquetas();
        $resultadoEditorial=obtenerEditoriales();
        $resultadoAutor= obtenerAutores();
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
            if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                $marca=true;
            }else{ 
                $marca=false;
            }
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
            $i++;
            
        }        
        require_once("../cookbooksUsuario.php");
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
            $codigo_postal= $_POST['codigo_postal'];
            $intento= altaCliente($nombreUsuario, $nombre, $apellido, $dni,  $email, $telefono,$contrasena, $permiso, $codigo_postal);
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
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
        $nombreUsuario= $_POST['nombreUsuario'];
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
            $codigo_postal=$_POST['codigo_postal'];
            $intento= altaCliente($nombreUsuario, $nombre, $apellido, $dni,  $email, $telefono,$contrasena, $permiso, $codigo_postal);
            if ($intento){
                if($permiso==2){
                    $res = recuperarCliente($nombreUsuario);
                    altaCarrito($res[0]['id_usuario']);
                }
                $sePudoAlta = true;
                $usuarios=obtenerUsuarios();
                if ( $usuarios!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($usuarios as $key ) {
                        $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                            'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                                'id_usuario' => $key['id_usuario'], 'permiso'=> $key['id_permiso'] );
                        $i++;
                    }
                     require_once("../vistaUsuarios.php");
                }                   
            }
        }else{
            $i=0;
            foreach ($buscaNomUsuarioYDNI as $key){
                if ($key['nombreUsuario']==$nombreUsuario ){
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
            $codigo_postal=0;
            $cliente=modificarDatosCliente($nombre,$apellido, $email,$telefono, $dni, $nombreUsuario, $contrasena, $id_usuario,$codigo_postal);
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
        $codigo_postal=$_POST['codigo_postal'];
        $id_usuario=$_POST ['id_usuario'];
        $buscaNomUsuarioYDNI = validarUsuarioYDni($nombreUsuario, $dni);
        if( (sizeof($buscaNomUsuarioYDNI) < 2 && $buscaNomUsuarioYDNI[0]['id_usuario']==$id_usuario)
            ||  (sizeof($buscaNomUsuarioYDNI)==1) ){            
            $cliente=modificarDatosCliente($nombre,$apellido, $email,$telefono, $dni, $nombreUsuario, $contrasena, $id_usuario,$codigo_postal);
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

            $id_carrito= buscaIdCarritoPorIdUsuario($id_usuario);
            $carrito= obtenerLibrosEnCarrito($id_carrito['id_carrito']); //esto obtiene todo lo del carrito
            $arregloDeClaves= array();
            $r=0;
            foreach ($carrito as $key) {    //esto pone todas los id de los libros en un solo arreglo
                $arregloDeClaves[$r]= $key['id_libro'];
                $r++;
            }

            $todo=filtrarTodosLosLibros();
            $arrayNa = array();
            $i=0;
            foreach ($todo as $key ) {
                if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                    $marca=true;
                }else{ 
                    $marca=false;
                }
                $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                    'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                    'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
                            'id_usuario' => $key['id_usuario'], 'permiso'=>$key['id_permiso'] );
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
            if($id == $_SESSION['id_usuario']){
                $noBajaASiMismo=true;
                $usuarios=obtenerUsuarios();
                if($usuarios!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($usuarios as $key){
                        $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                            'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                                'id_usuario' => $key['id_usuario'], 'permiso'=>$key['id_permiso'] );
                        $i++;
                    }
                }
                require_once("../vistaUsuarios.php");
            }else{ 
                $permiso=$_POST['permiso'];
                if($permiso==1){
                    $res = eliminarAdmin($id);
                }
                if($permiso==2){
                    $res = eliminarUsuario($id);
                }                
                $usuarios=obtenerUsuarios();
                if($usuarios!="error"){
                    $arrayNa = array();
                    $i=0;
                    foreach ($usuarios as $key){
                        $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                            'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                                'id_usuario' => $key['id_usuario'], 'permiso'=>$key['id_permiso'] );
                        $i++;
                    }
                }
                $bajaOk=true;
                require_once("../vistaUsuarios.php");
            }
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
                        'id_usuario' => $key['id_usuario'], 'permiso'=>$key['id_permiso'] );
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
            $permiso=$_POST['permiso'];
            $borrar=agregarBorradoUsuario($id);
            if($permiso==2){
                actualizaCarrito($id);
            }
            $usuarios=obtenerUsuarios();
            if ( $usuarios!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($usuarios as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                        'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'nombreUsuario'=>$key['nombreUsuario'] , 'contrasena'=>$key['contrasena'] ,   
                            'id_usuario' => $key['id_usuario'], 'permiso'=>$key['id_permiso'], 'detalle_libro'=>$key['detalle_libro'] );
                    $i++;
                }
            }
            $reAltaOk=true;
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                            'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                            'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                            'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                            'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 
                            'referencia_foto'=>$key['referencia_foto'], 'detalle_libro'=>$key['detalle_libro']);
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'], 
                            'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
                        $i++;
                    }
                   
                    require_once("../cookbooks.php");
                    break;
        }
    }

function buscarUsuarioCarrito(){

    $valor=obtenerUsuariosConCarrito();
    if (($valor != "error") && (count($valor) > 0)){
        $arrayNa = array();
        $i=0;
        foreach ($valor as $key ) {
            $arrayNa[$i]=array('nombreUsuario' => $key['nombreUsuario'], 'idUsuario' => $key['id_usuario']);
            $i++;
        }
        require_once("../vistaCarritosAdmin.php");
    }
}

function cargarCarritosAdmin () {

    $valor=obtenerUsuariosConCarrito();
    if (($valor != "error") && (count($valor) > 0)){
        $arrayNu = array();
        $i=0;
        foreach ($valor as $key ) {
            $arrayNu[$i]=array('nombreUsuario' => $key['nombreUsuario'], 'idUsuario' => $key['id_usuario']);
            $i++;
        }
    }
    if(count($valor)==0){
        $noHayCarritos=true;
    }
    if (isset($_POST['idUsuario'])) {
        $usuario=$_POST['idUsuario'];
        $libros=recuperarLibroCarrito($usuario);
        if (count($libros) > 0){
            if ( $libros!="error"){
                $arrayNa = array();
                $i=0;
                foreach ($libros as $key ) {
                  $arrayNa[$i]=array('nombre' => $key[29] , 'isbn' => $key['isbn'], 
                       'cantPag' =>$key['cantPag'], 'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'],
                        'id_carrito'=>$key['id_carrito'], 'cantidad_pedida'=>$key['cantidad_pedida'], 'idUsuario'=>$key['nombreUsuario'] );
                   $i++;
                } 
            } 

       }
    }
    require_once "../vistaCarritosAdmin.php";
}

function buscar() {
        
        $valorEditorial=$_POST['busquedaEditorial'];
        $valorEtiqueta=$_POST['busquedaEtiqueta'];
        $valorAutor=$_POST['busquedaAutor'];

    $todosLosLibros= filtrarTodosLosLibros();
    if($valorEditorial != "no_editorial"){
        $editorial= recuperarEditorialPorNombre($valorEditorial);
        $resultado= array();
        $i=0;
        foreach ($todosLosLibros as $key) {
            if($key['id_editorial']==$editorial['id_editorial']){
                $resultado[$i]= $key;
            }
            $i++;            
        }
    }else{
        $resultado=$todosLosLibros;
    }
    if($valorEtiqueta != "no_etiqueta"){
        $etiqueta= recuperarEtiquetaPorNombre($valorEtiqueta);
        $resultado0= array();
        $i=0;
        foreach ($resultado as $key) {
            if($key['id_etiqueta']==$etiqueta['id_etiqueta']){
                $resultado0[$i]= $key;
            }
            $i++;            
        }
        $resultado=$resultado0;
    }
    if($valorAutor != "no_autor"){
        $autor= recuperarAutorPorNombre($valorAutor);
        $resultado0= array();
        $i=0;
        foreach ($resultado as $key) {
            if($key['id_autor']==$autor['id_autor']){
                $resultado0[$i]= $key;
            }
            $i++;            
        }
        $resultado=$resultado0;          
    }
    $todo=$resultado;


        //$resultado=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor); $resultado ahora es $todo
        //$todo=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor);
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
                $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 
                        'referencia_foto'=>$key['referencia_foto'], 'detalle_libro'=>$key['detalle_libro']);
                    $i++;
        }
        require_once("../cookbooks.php");
       /* $valorEditorial=$_POST['busquedaEditorial'];
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
                $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 
                        'referencia_foto'=>$key['referencia_foto'], 'detalle_libro'=>$key['detalle_libro']);
                    $i++;
        }
            require_once("../cookbooks.php");*/
        
           
}

function buscarRegistrado() {
        
        $valorEditorial=$_POST['busquedaEditorial'];
        $valorEtiqueta=$_POST['busquedaEtiqueta'];
        $valorAutor=$_POST['busquedaAutor'];

    //no cantes victoria
    $todosLosLibros= filtrarTodosLosLibros();
    if($valorEditorial != "no_editorial"){
        $editorial= recuperarEditorialPorNombre($valorEditorial);
        $resultado= array();
        $i=0;
        foreach ($todosLosLibros as $key) {
            if($key['id_editorial']==$editorial['id_editorial']){
                $resultado[$i]= $key;
            }
            $i++;            
        }
    }else{
        $resultado=$todosLosLibros;
    }
    if($valorEtiqueta != "no_etiqueta"){
        $etiqueta= recuperarEtiquetaPorNombre($valorEtiqueta);
        $resultado0= array();
        $i=0;
        foreach ($resultado as $key) {
            if($key['id_etiqueta']==$etiqueta['id_etiqueta']){
                $resultado0[$i]= $key;
            }
            $i++;            
        }
        $resultado=$resultado0;
    }
    if($valorAutor != "no_autor"){
        $autor= recuperarAutorPorNombre($valorAutor);
        $resultado0= array();
        $i=0;
        foreach ($resultado as $key) {
            if($key['id_autor']==$autor['id_autor']){
                $resultado0[$i]= $key;
            }
            $i++;            
        }
        $resultado=$resultado0;          
    }
    $todo=$resultado;

        //$todo=buscarTodo($valorEditorial,$valorEtiqueta,$valorAutor);
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

        $id_carrito= buscaIdCarritoPorIdUsuario($_SESSION['id_usuario']);
        $carrito= obtenerLibrosEnCarrito($id_carrito['id_carrito']); //esto obtiene todo lo del carrito
        $arregloDeClaves= array();
        $r=0;
        foreach ($carrito as $key) {    //esto pone todas los id de los libros en un solo arreglo
            $arregloDeClaves[$r]= $key['id_libro'];
            $r++;
        }

        $arrayNa = array();
        $i=0;
        foreach ($todo as $key ) {
            if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                $marca=true;
            }else{ 
                $marca=false;
            }
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                    'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                    'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
        
        $id_carrito= buscaIdCarritoPorIdUsuario($_SESSION['id_usuario']);
        $carrito= obtenerLibrosEnCarrito($id_carrito['id_carrito']); //esto obtiene todo lo del carrito
        $arregloDeClaves= array();
        $r=0;
        foreach ($carrito as $key) {    //esto pone todas los id de los libros en un solo arreglo
            $arregloDeClaves[$r]= $key['id_libro'];
            $r++;
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
            if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                $marca=true;
            }else{ 
                $marca=false;
            }
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
                    if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                        $marca=true;
                    }else{ 
                        $marca=false;
                    }
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
                    if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                        $marca=true;
                    }else{ 
                        $marca=false;
                    }
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
                    if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                        $marca=true;
                    }else{ 
                        $marca=false;
                    }
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
            if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                $marca=true;
            }else{ 
                $marca=false;
            }
            $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
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
                    if(in_array($key['id_libro'], $arregloDeClaves)){ //esto corrobora si existe o no para la marca respectiva
                        $marca=true;
                    }else{ 
                        $marca=false;
                    }
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[20] ,
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'marca'=>$marca, 'detalle_libro'=>$key['detalle_libro'], 'detalle_autor'=>$key['detalle']);
                    $i++;
                }
        require_once("../cookbooksUsuario.php");
                break;
        }
    }

    function bajaUsuarioRegistrado() {
            //if(isset($confirmar)){
            /*$id=$_SESSION['id_usuario'];
            eliminarUsuario($id);
            require_once("../index.php");
            */
        $per=$_SESSION['permiso'];
        if($per==2){
            $id=$_SESSION['id_usuario'];                 
            $res = eliminarUsuario($id);
            $usuarios=obtenerUsuarios();
            if($res!="error"){
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
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
                    $i++;
                }
                $bajaOk=true;
                require_once ("../cookbooks.php");    
            }else{
                echo "hubo error en la baja del usuario";
            }
        }    
    }

    function bajaAdminRegistrado() {         
        $per=$_SESSION['permiso'];
        if($per==1){
            $id=$_SESSION['id_usuario'];
            $admins=obtenerUsuariosAdmin();
            if(count($admins) <= 1){
                $noBajaUltimoAdmin=true;
                require_once("../ADMIN/cookBooksAdmin.php");
            }else{                
                $res = eliminarAdmin($id);
                $usuarios=obtenerUsuarios();
                if($res!="error"){
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
                            'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                            'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
                        $i++;
                    }
                    $bajaOk=true;
                    require_once ("../cookbooks.php");
                }
                echo "hubo error en la baja";
            }
        }    

    }
    function olvideMiContrasena(){
        require_once('../vistaRecuperarContrasena.php');
    }

    function recuperarContrasena(){
        $email=$_POST['email'];
        $nombreUsuario=$_POST['nombre_usuario'];
        $usuario= recuperarCliente($nombreUsuario);
        if(count($usuario) == 0){
            $noExisteUsuario=true;
            require_once("../vistaRecuperarContrasena.php");
        }else{
            if($usuario[0]['email'] != $email){
                $noEstaBienEmail=true;
                require_once("../vistaRecuperarContrasena.php");
            }else{
                if($usuario[0]['baja']==1){
                    $dadoDeBaja=true;
                }else{
                    $nuevaContra="";
                    for ($i=0; $i < 8 ; $i++) { 
                        $digito = rand(0,9);
                        $nuevaContra= $nuevaContra.$digito;
                    }
                    modificaContraCliente($nombreUsuario, $nuevaContra);
                    $seEnvioCorreo=true;
                }
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
                        'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                        'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
                    $i++;
                }
                require_once("../cookbooks.php");
            }
        }
    }

    function publicoInicio(){
        if(isset($_GET['olvideMiContrasena'])){
            $olvideMiContrasena=true;
        }
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
                'etiqueta' => $key[13] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto'],
                'id_libro'=>$key['id_libro'], 'detalle_libro'=>$key['detalle_libro']);
            $i++;
        }

        require_once("../cookbooks.php");
    }

    function busquedaLibros(){
        require_once("../vistaBusquedaLibros.php");
    }

    function verVentasGenerales(){

        $ventas=recuperarTodasLasVentasGenerales();
        if(count($ventas) > 0){
            if ($ventas != "error"){
                $arregloVentas= array();
                $i=0;
                $fecha=0;
                foreach ($ventas as $key) {
                    if($fecha != $key['fecha']){
                        $arregloVentas[$i]= array('fecha'=>$key['fecha'], 'estado'=>$key['estado_venta'], 'id_venta'=>$key['id_venta'],
                                                'nombre_estado'=>$key['nombre_estado'], 'precio_total'=> $key['precio_total'],
                                                'nombre_usuario'=>$key['nombreUsuario']);
                    }
                    $fecha = $key['fecha'];
                    $i++;
                }
            }
        }
        require_once("../vistaVentasGenerales.php");
    }
    function verDetalleVentaDeUsuario(){
        $per=$_SESSION['permiso'];
        if($per==1){
            $id_venta=$_POST['id_venta'];
            $arregloVentas= recuperarVentaPorId($id_venta);
            //var_dump($arregloVentas);
            $enDetalle=true;
            /*$total=0;
            foreach($arregloVentas as $key){
                $total = $total + ($key['cantidad_comprada']*$key['precio']);
            }*/
            //var_dump($libros_vendidos);
            require_once("../vistaDetalleVentaUsuario.php");
        }
    }

    function modificarVenta(){
        $id_venta=$_POST['id_venta'];
        $id_estado=$_POST['id_estado'];
        modificarEstadoVenta($id_venta,$id_estado);
        $ventas=recuperarTodasLasVentasGenerales();
        if(count($ventas) > 0){
            if ($ventas != "error"){
                $arregloVentas= array();
                $i=0;
                $fecha=0;
                foreach ($ventas as $key) {
                    if($fecha != $key['fecha']){
                        $arregloVentas[$i]= array('fecha'=>$key['fecha'], 'estado'=>$key['estado_venta'], 'id_venta'=>$key['id_venta'],
                                                'nombre_estado'=>$key['nombre_estado'], 'precio_total'=> $key['precio_total'],
                                                'nombre_usuario'=>$key['nombreUsuario']);
                    }
                    $fecha = $key['fecha'];
                    $i++;
                }
            }
        }
        require_once("../vistaVentasGenerales.php");
    }

    function efectuarBusqueda(){
        //ESTE MODULO DEBE: obtener las dos fechas por post
        //                  llamar a la funcion que se encargue de la busqueda de los libros
        //                      dicha funcion debera realizar un macheo con las tablas ventas, libros, y libroventa
        //                      tengo que pensar que informacion recupero
        //                  posteriormente cargar los libros en un arreglo y cargar la vista que los muestre
        $fecha_inicial= $_POST['fecha_inicial'];
        $fecha_final= $_POST['fecha_final'];
        $libros_vendidos = buscaVentasEntreDosFechas($fecha_inicial, $fecha_final);
        $arrayNa = array();
        $i=0;
        foreach ($libros_vendidos as $key ) {
            $arrayNa[$i]=array('titulo' => $key[36] , 'usuario' => $key['nombreUsuario'] , 'precio_unidad'=>$key['precio_unidad'] ,
                'fecha' => $key['fecha'] , 'isbn' =>$key['isbn'], 'cantidad_comprada'=>$key['cantidad_comprada']);
            $i++;
        }
        require_once("../vistaBusquedaLibros.php");
    }

    function busquedaUsuarios(){
        require_once("../vistaBusquedaUsuarios.php");
    }
    
    function efectuarBusquedaUsuarios(){
        $fecha_inicial= $_POST['fecha_inicial'];
        $fecha_final= $_POST['fecha_final'];
        $usuarios = buscaUsuariosEntreDosFechas($fecha_inicial, $fecha_final);
        $arrayNa = array();
        $i=0;
        foreach ($usuarios as $key ) {
            if($key['baja']==1){
                $estado="Inactiva";
            }else{
                $estado="Activa";
            }
            if($key['id_permiso']==1){
                $permiso="Administrador";
            }else{
                $permiso="Usuario";
            }
            $arrayNa[$i]=array('nombre' => $key['nombre'] , 'apellido' => $key['apellido'] , 'email' =>$key['email'] ,
                'telefono' => $key['telefono'] , 'dni' =>$key['dni'] ,'usuario'=>$key['nombreUsuario'] , 
                'contrasena'=>$key['contrasena'], 'id_usuario' => $key['id_usuario'], 'tipo_usuario'=>$permiso, 
                'estado'=>$estado, 'fecha'=>$key['fecha_alta'] );
            $i++;
        }
        require_once("../vistaBusquedaUsuarios.php");
    }

}
?>