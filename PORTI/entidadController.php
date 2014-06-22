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
                foreach ($editoriales as $key ) {
                    $arrayNa[$i]=array('nombre' => $key['nombre'] ,
                            'id_us' => $key['id_editorial'] );
                    $i++;
                }
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
        //echo $n;
        if($per==1){
            $id=$_POST['id_libro'];
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
            $arreglo= validarAltaLibro($nom, $isbn);   
            if((!empty($arreglo))){
                $existe = 'existe';
                require_once("../vistaAltaLibro.php");
            }else{
                $intento=insertarLibro($nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor);
                if ($intento){
                    $libros=obtenerLibros();
                    if ( $libros!="error"){
                       $arrayNa = array();
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
            if((!empty($arreglo))){
                if ($arreglo[0]['nombre'] == $nom){
                $existe = 'existe';
                require_once("../vistaModificarLibro.php");
               }
            }else{
                $intento=modificarLibro($id_libro, $nom, $isbn, $cantHojas, $cantLibros, $precio, $id_editorial, $id_etiqueta, $id_autor);
                if ($intento){
                    $libros=obtenerLibros();
                    if ( $libros!="error"){
                        $arrayNa = array();
                        $i=0;
                        foreach ($libros as $key ) {
                            $arrayNa[$i]=array('nombre' => $key['nombre'] ,'isbn' => $key['isbn'],'cantPag' =>$key['cantPag'], 
                                'stock' =>$key['stock'],'precio'=>$key['precio'], 'id_libro' => $key['id_libro'] );
                            $i++;
                        }
                    require_once("../vistaLibros.php");
                    }
                }  
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
            require_once "../cookbooks.php";
        }
    }
}


 /* switch ($nombre) {
    case 'altaEtiqueta':
        require_once("../vistaAltaEtiqueta.php");
        break;
    case 'agregarBorradaEtiqueta':   
    	$per=$_SESSION['permiso'];
    	if($per==1){
    		$id=$_POST['id_etiqueta'];
    		$borrar=agregarBorradaEtiqueta($id);
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
    break;
    case 'bajaEtiqueta':
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
        break;
    case 'modificarEtiqueta':
    	$per=$_SESSION['permiso'];
    	$n=$_GET['nombre'];
    	//echo $n;
    	if($per==1){
    	$id=$_POST['id_etiqueta'];
        require_once("../vistaModificarEtiqueta.php");}
        break;
    case 'borradosEtiqueta':
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
    break;    
    case 'confirmarAltaEtiqueta':
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
        break;
    case 'confirmarModificacionEtiqueta':
    	$per=$_SESSION['permiso'];
    	if($per==1){
        $nom=$_POST['nom_etiqueta'];
        $id=$_POST['id_etiqueta'];
        $intento=modificarEtiqueta($nom,$id);
        if ($intento){
            $etiquetas=obtenerEtiquetas();
            if ( $etiquetas!="error"){
            $arrayNa = array();
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
        break;
    case 'cargarEtiqueta':
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
	break;

    case 'altaEditorial':
        require_once("../vistaAltaEditorial.php");
        break;
    case 'agregarBorradaEditorial':   
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
            }
        
            require_once("../vistaEditorial.php");
        }
    break;
    case 'bajaEditorial':
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
        break;
    case 'modificarEditorial':
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
        $id=$_POST['id_editorial'];
        require_once("../vistaModificarEditorial.php");}
        break;
    case 'borradosEditorial':
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
    break;    
    case 'confirmarAltaEditorial':
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
                    require_once("../vistaEditorial.php");
                }
            }
        }
    }
        break;
    case 'confirmarModificacionEditorial':
        $per=$_SESSION['permiso'];
        if($per==1){
        $nom=$_POST['nom_editorial'];
        $id=$_POST['id_editorial'];
        $intento=modificarEditorial($nom,$id);
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
            require_once("../vistaEditorial.php");
        }
            
            
        }   
        }
        break;
    case 'cargarEditorial':
        
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
    break;
    case 'altaAutor':
        require_once("../vistaAltaAutor.php");
        break;
    case 'agregarBorradaAutor':   
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
                            'id_us' => $key['id_autor'] );
                    $i++;
                }
            }
        
            require_once("../vistaAutores.php");
        }
    break;
    case 'bajaAutor':
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
        break;
    case 'modificarAutor':
        $per=$_SESSION['permiso'];
        $n=$_GET['nombre'];
        //echo $n;
        if($per==1){
        $id=$_POST['id_autor'];
        require_once("../vistaModificarAutor.php");}
        break;
    case 'borradosAutores':
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
    break;    
    case 'confirmarAltaAutor':
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
        break;
    case 'confirmarModificacionAutor':
        $per=$_SESSION['permiso'];
        if($per==1){
        $nom=$_POST['nom_autor'];
        $id=$_POST['id_autor'];
        $intento=modificarAutor($nom,$id);
        if ($intento){
            $autores=obtenerAutores();
            if ( $autores!="error"){
            $arrayNa = array();
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
        break;
    case 'cargarAutor':
        
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
    break;

}
*/
?>