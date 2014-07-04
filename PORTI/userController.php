<?php
require_once("../Modelo/modelo.php");
require_once("entidadController.php");
$nombre=$_GET["action"];
class user {
    function  volverInicio () {
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
                    $arrayNa[$i]=array('titulo' => $key[7] , 'editorial' => $key['nombre'] , 'autor'=>$key[21] ,
                        'etiqueta' => $key[14] , 'precio' =>$key['precio'], 'referencia_foto'=>$key['referencia_foto']);
                    $i++;
                }
							require_once("../cookbooksUsuario.php");
        //require_once("../cookBooksUsuario.php");
        
	}
}
?>
